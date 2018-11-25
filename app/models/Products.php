<?php
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\Timestampable;
use Phalcon\Mvc\Model\Behavior\SoftDelete;
use Phalcon\Validation;
use Phalcon\Validation\Validator\StringLength; 
use Phalcon\Validation\Validator\Uniqueness;

class Products extends Model {

	public function initialize() {
		$this->addBehavior(
			new Timestampable( // Timezone UTC ...?
				[
					'beforeCreate'=>['field'=>'created_at','format'=>'Y-m-d H:i:s'], 
					// collision with softdelete
					// 'beforeSave'=>['field'=>'updated_at','format'=>'Y-m-d H:i:s'] 
				]
			)
		);

		$this->addBehavior(
			new SoftDelete(
				[
					'field' => 'deleted_at',
					'value' => date('Y-m-d H:i:s')
				]
			)
		);

	}
	
	public function validation() {
		$validator = new Validation();

		$validator->add(
			'name',
			new StringLength(
				[
					"max" => 100,
					"messageMaximum" => "Maximum is 100 characters"
				]
			)
		);

		$validator->add(
			'detail',
			new StringLength(
				[
					"max" => 500,
					"messageMaximum" => "Maximum is 500 characters"
				]
			)
		);

		$validator->add(
			'name',
			new Uniqueness(
				[
					'message' => 'name must be unique',
				]
			)
		);

		return $this->validate($validator);
	}
	
}
