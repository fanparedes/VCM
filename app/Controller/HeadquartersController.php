<?php
App::uses('AppController', 'Controller');
/**
 * Headquarters Controller
 *
 * @property Headquarters $Headquarters
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class HeadquartersController extends AppController {

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
		$this->Headquarters->recursive = 0;
		$this->set('headquarters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Headquarters->exists($id)) {
			throw new NotFoundException(__('Invalid headquarters'));
		}
		$options = array('conditions' => array('Headquarters.' . $this->Headquarters->primaryKey => $id));
		$this->set('headquarters', $this->Headquarters->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Headquarters->create();
			if ($this->Headquarters->save($this->request->data)) {
				$this->Flash->success(__('The headquarters has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The headquarters could not be saved. Please, try again.'));
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
		if (!$this->Headquarters->exists($id)) {
			throw new NotFoundException(__('Invalid headquarters'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Headquarters->save($this->request->data)) {
				$this->Flash->success(__('The headquarters has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The headquarters could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Headquarters.' . $this->Headquarters->primaryKey => $id));
			$this->request->data = $this->Headquarters->find('first', $options);
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
		$this->Headquarters->id = $id;
		if (!$this->Headquarters->exists()) {
			throw new NotFoundException(__('Invalid headquarters'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Headquarters->delete()) {
			$this->Flash->success(__('The headquarters has been deleted.'));
		} else {
			$this->Flash->error(__('The headquarters could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
