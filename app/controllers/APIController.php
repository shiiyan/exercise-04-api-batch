<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use \Firebase\JWT\JWT;

require __DIR__.'/../config/auth.php';
require __DIR__ . '/../../vendor/autoload.php';

class ApiController extends Controller
{
    private function _validateJWT()
    {
        try { //check later!!
            $authorization = getallheaders()['Authorization'];
            $jwt = explode(' ', $authorization)[1];
            // var_dump($jwt);
            $key = JWT_SECRET;
            $decoded = JWT::decode($jwt, $key, array('HS256'));
            // var_dump($decoded);
        } catch (Exception $e) {
            $message = $e->getMessage();
            echo json_encode(array('ERROR' => $message));
            exit;
        }

    }

    private function getResponses($success, $product) 
    {
        // Create a response
        $response = new Response();

        // Check if the insertion was successful
        if ($success) {
            // Change the HTTP status
            $response->setStatusCode(201, 'Created');

            //$product->id= $status->getModel()->id;

            
            $response->setJsonContent(
                [
                    'status' => 'OK',
                    'data' => $product

                ], JSON_UNESCAPED_SLASHES
            );
        } else {
            // Change the HTTP status
            $response->setStatusCode(409, 'Conflict');

            // Send errors to the client
            $errors = [];

            foreach($product->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $response->setJsonContent(
                [
                    'status' => 'ERROR',
                    'messages' => $errors
                ]
            );
        }
        return $response;
    }

    public function indexAction()
    {
        echo '<h1>Hello!</h1>';
    }

    public function getallAction()
    {
        // $this->_validateJWT();
        $products = Products::find(["deleted_at IS NULL"]);
        echo json_encode($products, JSON_UNESCAPED_SLASHES);
        

        $this->view->disable();

		
    }

    public function getbynameAction()
    {
    	// $this->_validateJWT();
        $name = $this->dispatcher->getParam("name");
    	$products = Products::find(
    		[
    			'conditions' => "name LIKE ?1 AND deleted_at IS NULL",
    			'bind' => [
    				1 => "%$name%"
    			]
    		]
    	);
    	if ($products->valid() === false) {
			echo json_encode(['status' => 'NOT-FOUND']);
		} else {
			echo json_encode($products, JSON_UNESCAPED_SLASHES);
		}
        $this->view->disable();

    }

    public function getbyidAction()
    {
        // $this->_validateJWT();
    	$id = $this->dispatcher->getParam("id");
		$product = Products::findFirst(           [
                'conditions' => "id = ?1 AND deleted_at IS NULL",
                'bind' => [
                    1 => "$id"
                ]
            ]);
		if ($product === false) {
			echo json_encode(['status' => 'NOT-FOUND']);
		} else {
			echo json_encode($product, JSON_UNESCAPED_SLASHES);
		}
        $this->view->disable();
    }



    public function addAction()
    {
    	// $this->_validateJWT();
        $product = new Products();

		if ($this->request->hasFiles()) {
			$file = $this->request->getUploadedFiles()[0];
			$file_name = $file->getName();
			$file->moveTo(BASE_PATH.'/public/uploads/'.$file_name);
            $product->image_url = '/public/uploads/'.$file_name;
		} // else {
		  //	return json_encode(['status' => 'NO-FILE']);
		// }

		$success = $product->save(
    		$this->request->getPost()
    	);
		
        return $this->getResponses($success, $product);
    }

    public function updatebyidAction()
    {
    	// $this->_validateJWT();
        
    	$id = $this->dispatcher->getParam("id");
    	$product = Products::findFirst(['id = "$id" AND deleted_at IS NULL']);

        if ($product === false) {
            echo json_encode(['status' => 'NOT-FOUND']);
        } else {
            $success = $product->save(
            $this->request->getJsonRawBody($associative=true)
            +['updated_at'=>date('Y-m-d H:i:s')]
            );

            return $this->getResponses($success, $product);
        }
    }

       public function deletebyidAction()
    {
    	// $this->_validateJWT();

		$id = $this->dispatcher->getParam("id");
        $product = Products::findFirst(['id = "$id" AND deleted_at IS NULL']);

		if ($product === false) {
			echo json_encode(['status' => 'NOT-FOUND']);
		} elseif ($product->delete()) {
			echo json_encode(['status' => 'DELETED']);
        } else {
            $message = $product->getMessages();
            echo json_encode(array('ERROR' => $message));
        }
		
        $this->view->disable();
    }

}
