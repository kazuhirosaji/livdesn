<?php
App::uses('AppController', 'Controller');
/**
 * Maps Controller
 *
 * @property Map $Map
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MapsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Map->recursive = 0;
		$this->set('maps', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Map->exists($id)) {
			throw new NotFoundException(__('Invalid map'));
		}
		$options = array('conditions' => array('Map.' . $this->Map->primaryKey => $id));
		$this->set('map', $this->Map->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Map->create();
			if ($this->Map->save($this->request->data) && $this->Map->saveImageFile($this->request->data)) {
				$this->Session->setFlash(__('The map has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The map could not be saved. Please, try again.'));
			}
		}
		$users = $this->Map->User->find('list');
		$themes = $this->Map->Theme->find('list');
		$users = $this->Map->User->find('list');
		$this->set(compact('users', 'themes', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Map->exists($id)) {
			throw new NotFoundException(__('Invalid map'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Map']['file']) && $this->request->data['Map']['file']['size'] > 0) {
				$new_imagename = $this->Map->updateImageFile($id, $this->request->data);
				$this->request->data['Map']['imagename'] = $new_imagename;
			}
			if ($this->Map->save($this->request->data)) {
				$this->Session->setFlash(__('The map has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The map could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Map.' . $this->Map->primaryKey => $id));
			$this->request->data = $this->Map->find('first', $options);
		}
		$users = $this->Map->User->find('list');
		$themes = $this->Map->Theme->find('list');
		$users = $this->Map->User->find('list');
		$this->set(compact('users', 'themes', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Map->id = $id;
		if (!$this->Map->exists()) {
			throw new NotFoundException(__('Invalid map'));
		}
		$this->request->allowMethod('post', 'delete');
		$imagename = $this->Map->getImageName($id);
		if ($this->Map->delete()) {
			$this->Session->setFlash(__('The map has been deleted.'));
			$this->Map->deleteImageFile($imagename);
		} else {
			$this->Session->setFlash(__('The map could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
