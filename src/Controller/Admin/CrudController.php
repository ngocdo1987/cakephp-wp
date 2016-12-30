<?php
namespace App\Controller\Admin;

class CrudController extends AdminController 
{
	protected $singular = '';
	protected $plural = '';
	protected $config = [];

	public function initialize()
	{
		parent::initialize();

		if(file_exists('../config/cms/'.$this->singular.'.json'))
		{
			$config = file_get_contents('../config/cms/'.$this->singular.'.json');
			$config = json_decode($config);
		}
		else
		{
			$config = null;
		}
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
	}

	public function add()
	{
		$model = ucfirst($this->singular);
		$crud = $this->$model->newEntity();

		if ($this->request->is('post')) {
	    	$crud = $this->$model->patchEntity($crud, $this->request->data);
	    	if ($this->$model->save($crud)) {
	        	$this->Flash->success(__('Add '.$this->singular.' successfully!'));
	        	return $this->redirect(['action' => 'index']);
	      	} else {
	        	$this->Flash->error(__('Add '.$this->singular.' failed! Please try again!'));
	      	}
	    }

	    $this->set('crud', $crud);
	    $this->set('config', $this->config);
	    $this->set('singular', $this->singular);
	    $this->render('/Admin/Crud/add');
	}

	public function edit($id = null)
	{
		$model = ucfirst($this->singular);
		$crud = $this->$model->get($id);

	    if ($this->request->is(['patch', 'post', 'put'])) {
	      $crud = $this->$model->patchEntity($crud, $this->request->data);
	      if ($this->$model->save($crud)) {
	        $this->Flash->success(__('Edit '.$this->singular.' successfully!'));
	        return $this->redirect(['action' => 'index']);
	      } else {
	        $this->Flash->error(__('Edit '.$this->singular.' failed! Please try again!'));
	      }
	    }

	    $this->set('crud', $crud);
	    $this->set('config', $this->config);
	    $this->set('singular', $this->singular);
	    $this->set('_serialize', ['crud']);
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