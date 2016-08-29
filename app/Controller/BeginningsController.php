<?php
App::uses('AppController', 'Controller');
/**
 * Beginnings Controller
 *
 * @property Beginning $Beginning
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class BeginningsController extends AppController {

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
		$this->Beginning->recursive = 0;
		$beginnings = $this->Beginning->find('all', array(
				'order' => 'Beginning.principio'
			));
		$this->set('beginnings', $beginnings);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Beginning->exists($id)) {
			throw new NotFoundException(__('Invalid beginning'));
		}
		$options = array('conditions' => array('Beginning.' . $this->Beginning->primaryKey => $id));
		$this->set('beginning', $this->Beginning->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Beginning->create();
			if ($this->Beginning->save($this->request->data)) {
				$this->Flash->success(__('The beginning has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The beginning could not be saved. Please, try again.'));
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
		if (!$this->Beginning->exists($id)) {
			throw new NotFoundException(__('Invalid beginning'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Beginning->save($this->request->data)) {
				$this->Flash->success(__('The beginning has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The beginning could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Beginning.' . $this->Beginning->primaryKey => $id));
			$this->request->data = $this->Beginning->find('first', $options);
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
		$this->Beginning->id = $id;
		if (!$this->Beginning->exists()) {
			throw new NotFoundException(__('Invalid beginning'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Beginning->delete()) {
			$this->Flash->success(__('The beginning has been deleted.'));
		} else {
			$this->Flash->error(__('The beginning could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
