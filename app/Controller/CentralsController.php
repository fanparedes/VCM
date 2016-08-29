<?php
App::uses('AppController', 'Controller');
/**
 * Centrals Controller
 *
 * @property Central $Central
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class CentralsController extends AppController {

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
		$this->Central->recursive = 0;
		$centrals = $this->Central->find('all', array(
				'order' => 'Central.nombre'
			));
		$this->set('centrals', $centrals);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Central->exists($id)) {
			throw new NotFoundException(__('Invalid central'));
		}
		$options = array('conditions' => array('Central.' . $this->Central->primaryKey => $id));
		$this->set('central', $this->Central->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Central->create();
			if ($this->Central->save($this->request->data)) {
				$this->Flash->success(__('The central has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The central could not be saved. Please, try again.'));
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
		if (!$this->Central->exists($id)) {
			throw new NotFoundException(__('Invalid central'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Central->save($this->request->data)) {
				$this->Flash->success(__('The central has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The central could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Central.' . $this->Central->primaryKey => $id));
			$this->request->data = $this->Central->find('first', $options);
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
		$this->Central->id = $id;
		if (!$this->Central->exists()) {
			throw new NotFoundException(__('Invalid central'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Central->delete()) {
			$this->Flash->success(__('The central has been deleted.'));
		} else {
			$this->Flash->error(__('The central could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
