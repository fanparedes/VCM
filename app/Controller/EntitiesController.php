<?php
App::uses('AppController', 'Controller');
/**
 * Entities Controller
 *
 * @property Entity $Entity
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class EntitiesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');
	public $layout = "vcm";

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Entity->recursive = 0;
		$entities = $this->Entity->find('all', array(
				'order' => 'Entity.entidades'
			));
		$this->set('entities', $entities);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Entity->exists($id)) {
			throw new NotFoundException(__('Invalid entity'));
		}
		$options = array('conditions' => array('Entity.' . $this->Entity->primaryKey => $id));
		$this->set('entity', $this->Entity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout="vcm";
		if ($this->request->is('post')) {
			$this->Entity->create();
			if ($this->Entity->save($this->request->data)) {
				$this->Flash->success(__('The entity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The entity could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Entity->exists($id)) {
			throw new NotFoundException(__('Invalid entity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Entity->save($this->request->data)) {
				$this->Flash->success(__('The entity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The entity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Entity.' . $this->Entity->primaryKey => $id));
			$this->request->data = $this->Entity->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Entity->id = $id;
		if (!$this->Entity->exists()) {
			throw new NotFoundException(__('Invalid entity'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Entity->delete()) {
			$this->Flash->success(__('The entity has been deleted.'));
		} else {
			$this->Flash->error(__('The entity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
