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


	public function saveImageFile() {
		$options = array(
			'fields' => 'id',
			'conditions' => array('and' => array(
				'Map.title' => $this->request->data['Map']['title'],
				'Map.user_id' => $this->request->data['Map']['user_id']
			)
		));
		$newId = $this->Map->find('first', $options);
		$imageName = $newId['Map']['id'];

		$dest_fullpath = IMAGES . "maps/" . $imageName;

		$file = $this->request->data['Map']['file'];
		$res = move_uploaded_file($file['tmp_name'], $dest_fullpath);
		if ($res) {
			chmod($dest_fullpath, 0666);
		}

		$saveImage = array('Map' => array('imagename' => $imageName));
		return $this->Map->save($saveImage);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Map->create();
			if ($this->Map->save($this->request->data) && $this->saveImageFile()) {
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
				$this->deleteImage($id);
				$file = $this->request->data['Map']['file'];
				$dest_fullpath = IMAGES . "maps/" . $id;
				$res = move_uploaded_file($file['tmp_name'], $dest_fullpath);
				if ($res) {
					chmod($dest_fullpath, 0666);
				}
				$this->request->data['Map']['imagename'] = $this->request->data['Map']['id'];
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
 * delete image method
 *
 * @param string $id
 * @return void
 */
	public function deleteImage($id) {
		if (!isset($id)) {
			return;
		}
		$dest_fullpath = IMAGES . "maps/" . $id;
		if(file_exists($dest_fullpath)) {
			unlink($dest_fullpath);
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
		$this->Map->id = $id;
		if (!$this->Map->exists()) {
			throw new NotFoundException(__('Invalid map'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Map->delete()) {
			$this->Session->setFlash(__('The map has been deleted.'));
		} else {
			$this->Session->setFlash(__('The map could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
