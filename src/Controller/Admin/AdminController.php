<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

class AdminController extends AppController 
{
	//public $layout = 'admin';

	public function initialize()
	{
		parent::initialize();
	}

	public function beforeRender(Event $event)
    {
    	$this->viewBuilder()->layout('admin');
    }
}
