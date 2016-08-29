<?php
App::uses('AppController', 'Controller');
/**
 * Externals Controller
 *
 * @property External $External
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ExternalsController extends AppController {

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
		$this->External->recursive = 0;
		$externals = $this->External->find('all', array(
				'order' => 'External.publicoexterno'
			));
		$this->set('externals', $externals);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->External->exists($id)) {
			throw new NotFoundException(__('Invalid external'));
		}
		$options = array('conditions' => array('External.' . $this->External->primaryKey => $id));
		$this->set('external', $this->External->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->External->create();
			if ($this->External->save($this->request->data)) {
				$this->Flash->success(__('The external has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The external could not be saved. Please, try again.'));
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
		if (!$this->External->exists($id)) {
			throw new NotFoundException(__('Invalid external'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->External->save($this->request->data)) {
				$this->Flash->success(__('The external has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The external could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('External.' . $this->External->primaryKey => $id));
			$this->request->data = $this->External->find('first', $options);
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
		$this->External->id = $id;
		if (!$this->External->exists()) {
			throw new NotFoundException(__('Invalid external'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->External->delete()) {
			$this->Flash->success(__('The external has been deleted.'));
		} else {
			$this->Flash->error(__('The external could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
