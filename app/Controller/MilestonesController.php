<?php
App::uses('AppController', 'Controller');
/**
 * Milestones Controller
 *
 * @property Milestone $Milestone
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class MilestonesController extends AppController {

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
		$this->Milestone->recursive = 0;
		$this->set('milestones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Milestone->exists($id)) {
			throw new NotFoundException(__('Invalid milestone'));
		}
		$options = array('conditions' => array('Milestone.' . $this->Milestone->primaryKey => $id));
		$this->set('milestone', $this->Milestone->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Milestone->create();
			if ($this->Milestone->save($this->request->data)) {
				$this->Flash->success(__('The milestone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The milestone could not be saved. Please, try again.'));
			}
		}
		$activities = $this->Milestone->Activity->find('list');
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
		if (!$this->Milestone->exists($id)) {
			throw new NotFoundException(__('Invalid milestone'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Milestone->save($this->request->data)) {
				$this->Flash->success(__('The milestone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The milestone could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Milestone.' . $this->Milestone->primaryKey => $id));
			$this->request->data = $this->Milestone->find('first', $options);
		}
		$activities = $this->Milestone->Activity->find('list');
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
		$this->Milestone->id = $id;
		if (!$this->Milestone->exists()) {
			throw new NotFoundException(__('Invalid milestone'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Milestone->delete()) {
			$this->Flash->success(__('The milestone has been deleted.'));
		} else {
			$this->Flash->error(__('The milestone could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function delete_ajax() {

		$this->layout = "ajax";
		$id = $this->data['id_activity'];

		$this->Milestone->id = $this->data['id_hito'];;
		$this->request->allowMethod('post', 'delete');
		$this->Milestone->delete();
		$milestones = $this->Milestone->find('list', array(
				'order' => 'Milestone.id ASC',
				'conditions' => array(
						'Milestone.activity_id' => $this->data['id_activity']
					)
			));
		$this->set('milestones', $milestones);
	}	
}
