<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table 
{
	public function validationDefault(Validator $validator) 
	{
		$validator->notEmpty('username', 'Please enter username!');
		$validator->notEmpty('password', 'Please enter password!');
		$validator->notEmpty('role', 'Please assign role for user!');
		$validator->add('role', 'inList', [
			'rule' => ['inList', ['admin', 'editor']],
        	'message' => 'Please enter a valid role!'
		]);

		return $validator;
	}
}