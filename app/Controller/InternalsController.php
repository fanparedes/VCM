<?php
App::uses('AppController', 'Controller');
/**
 * Internals Controller
 *
 * @property Internal $Internal
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class InternalsController extends AppController {

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
		$this->Internal->recursive = 0;
		$internals = $this->Internal->find('all', array(
				'order' => 'Internal.publico'
			));
		$this->set('internals', $internals);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Internal->exists($id)) {
			throw new NotFoundException(__('Invalid internal'));
		}
		$options = array('conditions' => array('Internal.' . $this->Internal->primaryKey => $id));
		$this->set('internal', $this->Internal->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Internal->create();
			if ($this->Internal->save($this->request->data)) {
				$this->Flash->success(__('The internal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The internal could not be saved. Please, try again.'));
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
		if (!$this->Internal->exists($id)) {
			throw new NotFoundException(__('Invalid internal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Internal->save($this->request->data)) {
				$this->Flash->success(__('The internal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The internal could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Internal.' . $this->Internal->primaryKey => $id));
			$this->request->data = $this->Internal->find('first', $options);
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
		$this->Internal->id = $id;
		if (!$this->Internal->exists()) {
			throw new NotFoundException(__('Invalid internal'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Internal->delete()) {
			$this->Flash->success(__('The internal has been deleted.'));
		} else {
			$this->Flash->error(__('The internal could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
