<?php
App::uses('AppController', 'Controller');
/**
 * Objetives Controller
 *
 * @property Objetive $Objetive
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ObjetivesController extends AppController {

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
		$this->Objetive->recursive = 0;
		$this->set('objetives', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Objetive->exists($id)) {
			throw new NotFoundException(__('Invalid objetive'));
		}
		$options = array('conditions' => array('Objetive.' . $this->Objetive->primaryKey => $id));
		$this->set('objetive', $this->Objetive->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Objetive->create();
			if ($this->Objetive->save($this->request->data)) {
				$this->Flash->success(__('The objetive has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The objetive could not be saved. Please, try again.'));
			}
		}
		$activities = $this->Objetive->Activity->find('list');
		$this->set(compact('activities'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Objetive->exists($id)) {
			throw new NotFoundException(__('Invalid objetive'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Objetive->save($this->request->data)) {
				$this->Flash->success(__('The objetive has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The objetive could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Objetive.' . $this->Objetive->primaryKey => $id));
			$this->request->data = $this->Objetive->find('first', $options);
		}
		$activities = $this->Objetive->Activity->find('list');
		$this->set(compact('activities'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Objetive->id = $id;
		if (!$this->Objetive->exists()) {
			throw new NotFoundException(__('Invalid objetive'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Objetive->delete()) {
			$this->Flash->success(__('The objetive has been deleted.'));
		} else {
			$this->Flash->error(__('The objetive could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function delete_ajax() {

		$this->layout = "ajax";
		$id = $this->data['id_activity'];

		$this->Objetive->id = $this->data['id_objetivo'];;
		$this->request->allowMethod('post', 'delete');
		$this->Objetive->delete();
		$objetives = $this->Objetive->find('list', array(
				'order' => 'Objetive.id ASC',
				'conditions' => array(
						'Objetive.activity_id' => $this->data['id_activity']
					)
			));
		$this->set('objetives', $objetives);

	}
}
