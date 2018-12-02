<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class ProfileController extends Controller
{
    public function indexAction()
    {       

         $user = Users::findFirst([
			[
				'conditions' => 'id = ?1',
				'bind' => [1 => $this->session->get('auth')['id']],
			]

		 ]);

         $name = $this->dispatcher->getParam('name');
         if ($user->name !== $name) {
         	return $this->response->setStatusCode(404, 'Not Found');
         }

         $this->view->title = 'Profile of ' . $user->name;

         
         $this->view->name = $user->name;
         $this->view->user = $user;
    }
    public function summaryallAction()
    {
        $summaries = Summaries::find();
        $this->view->title = 'Summary of Products';
        $this->view->name = $this->session->get('auth')['name'];
        $this->view->summaries = $summaries;
    }
    public function summarybydateAction()
    {
        $this->view->name = $this->session->get('auth')['name'];
        $this->view->title = 'Summary of Products';

        if ($this->request->isPost()) {
            $date = $this->request->getPost('date');
            $summary = Summaries::findFirst(
                [
                    'conditions' => "date='{$date}'",
                ]
            );
            $this->view->date = $date;
            $this->view->summary = $summary;
        }
    }

}
