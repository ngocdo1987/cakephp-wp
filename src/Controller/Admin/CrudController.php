<?php
namespace App\Controller\Admin;

use Cake\ORM\TableRegistry;

class CrudController extends AdminController 
{
	protected $singular;
	protected $plural;
	protected $config;

	public function initialize()
	{
		parent::initialize();

		$cfg_file = '../config/cms/'.$this->singular.'.json';
		$config = file_exists($cfg_file) ? json_decode(file_get_contents($cfg_file)) : null;
		
		$this->config = $config;
	}

	public function index()
	{
		$this->paginate = [
	    	'limit' => 20,
	    	'order' => ['id' => 'DESC']
	    ];

	    $model = ucfirst($this->singular); //die($model);
	    $this->set('config', $this->config);
	    $this->set('singular', $this->singular);
	    $this->set('plural', $this->plural);
	    $this->set('cruds', $this->paginate($this->$model)); //die('lol');
	    $this->set('_serialize', ['cruds']);

	    $this->render('/Admin/Crud/index');
	}

	public function view($id = null)
	{
		$model = ucfirst($this->singular);
		$crud = $this->$model->get($id);

	    $this->set('crud', $crud);
	    $this->set('_serialize', ['crud']);

	    $this->render('/Admin/Crud/view');
	}

	public function add()
	{
		$config = $this->config;
		$model = ucfirst($this->singular);
		$crud = $this->$model->newEntity();
		//debug($config); die('');
		if ($this->request->is('post')) {
			$associated = [];
			// Check n-n
			if(isset($config->relation->nn) && count($config->relation->nn) > 0)
			{
				foreach($config->relation->nn as $k => $v)
				{
					$associated[] = ucfirst($k);
				}
			}

	    	$crud = $this->$model->patchEntity($crud, $this->request->data, [
	    		'associated' => $associated
	    	]);

	    	if ($this->$model->save($crud)) {
	        	$this->Flash->success(__('Add '.$this->singular.' successfully!'));
	        	return $this->redirect(['action' => 'index']);
	      	} else {
	      		if ($crud->errors()) {
	      			$this->set('errors', $crud->errors());
	      		}
	        	$this->Flash->error(__('Add '.$this->singular.' failed! Please try again!'));
	      	}
	    }

	    $this->set('crud', $crud);
	    $this->set('config', $config);
	    $this->set('singular', $this->singular);

	    // Check recursive
		if(isset($config->recursive) && $config->recursive == 1)
		{

		}

		// Check 1-n

		// Check n-n
		if(isset($config->relation->nn) && count($config->relation->nn) > 0)
		{
			foreach($config->relation->nn as $k => $v)
			{
				$model = ucfirst($k);
				$kk = TableRegistry::get(ucfirst($k))->find();

				$this->set($k, $kk);
			}
		}

	    $this->render('/Admin/Crud/add');
	}

	public function edit($id = null)
	{
		$config = $this->config;
		$model = ucfirst($this->singular);
		$contain = [];

		// Check n-n
		if(isset($config->relation->nn) && count($config->relation->nn) > 0)
		{
			foreach($config->relation->nn as $k => $v)
			{
				$contain[] = ucfirst($k);
			}
		}

		$crud = $this->$model->get($id, [
			'contain' => $contain
		]);

		if(!empty($contain)) {
			foreach($contain as $c) {
				$_ids = [];
				$c = strtolower($c);

				if(isset($crud->$c) && !empty($crud->$c)) {
					foreach($crud->$c as $cc) {
						$_ids[] = $cc->id;
					}
				}

				$this->set($c.'_ids', $_ids);
			} 
		}
		//debug($crud); //die('');

	    if ($this->request->is(['patch', 'post', 'put'])) {
	      	$crud = $this->$model->patchEntity($crud, $this->request->data, [
	      		'associated' => $contain
	      	]);

	      	if ($this->$model->save($crud)) {
	        	$this->Flash->success(__('Edit '.$this->singular.' successfully!'));
	        	return $this->redirect(['action' => 'index']);
	      	} else {
	      		if ($crud->errors()) {
	      			$this->set('errors', $crud->errors());
	      		}
	        	$this->Flash->error(__('Edit '.$this->singular.' failed! Please try again!'));
	      	}
	    }

	    $this->set('crud', $crud);
	    $this->set('config', $config);
	    $this->set('singular', $this->singular);
	    $this->set('_serialize', ['crud']);

	    // Check recursive
		if(isset($config->recursive) && $config->recursive == 1)
		{

		}

		// Check 1-n

		// Check n-n
		if(isset($config->relation->nn) && count($config->relation->nn) > 0)
		{
			foreach($config->relation->nn as $k => $v)
			{
				$model = ucfirst($k);
				$kk = TableRegistry::get(ucfirst($k))->find();
				
				$this->set($k, $kk);
			}
		}

	    $this->render('/Admin/Crud/edit');
	}

	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);

		$model = ucfirst($this->singular);
		$crud = $this->$model->get($id);

		if ($this->$model->delete($crud)) {
			$this->Flash->success(__('Delete '.$this->singular.' successfully!'));
	    } else {
	      	$this->Flash->error(__('Delete '.$this->singular.' failed! Please try again!'));
	    }

	    return $this->redirect(['action' => 'index']);
	}
}