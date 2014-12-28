<?php
App::uses('AppModel', 'Model');
/**
 * Map Model
 *
 * @property User $User
 * @property Theme $Theme
 * @property User $User
 */
class Map extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			// 'n' => array(
			// 	'rule' => array('n'),
			// 	//'message' => 'Your custom message here',
			// 	//'allowEmpty' => false,
			// 	//'required' => false,
			// 	//'last' => false, // Stop validation after this rule
			// 	//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'theme_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Theme' => array(
			'className' => 'Theme',
			'foreignKey' => 'theme_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'maps_users',
			'foreignKey' => 'map_id',
			'associationForeignKey' => 'user_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

/**
 * Image folder name
 *
 * @var string
 */
	public $image_folder = 'maps/';


/**
 * get imagename from id
 *
 * @param string $id
 * @return void
 */
	public function getImageName($id) {
		if (!isset($id)) {
			return null;
		}
		$options = array(
			'fields' => 'Map.imagename',
			'conditions' => array('Map.id' => $id)
			);
		$item = $this->find('first', $options);
		return $item[get_class()]['imagename'];
	}

/**
 * save image data function
 *
 * @param array $data requested data array
 * @return mixed On success Model::$data if its not empty or true, false on failure
 *
 */
	public function saveImageFile($data) {
		$imagename = md5(uniqid());

		$dest_fullpath = IMAGES . $this->image_folder . $imagename;

		$file = $data[get_class()]['file'];
		$res = move_uploaded_file($file['tmp_name'], $dest_fullpath);
		if ($res) {
			chmod($dest_fullpath, 0666);
		}

		$saveImage = array(get_class() => array('imagename' => $imagename));
		return $this->save($saveImage);
	}

/**
 * delete image data function
 *
 * @param string $imagename : delete image name
 * @return void
 */
	public function deleteImageFile($imagename) {
		$dest_fullpath = IMAGES . $this->image_folder . $imagename;
		if(file_exists($dest_fullpath)) {
			unlink($dest_fullpath);
		}
	}

/**
 * update image data function
 *
 * @param string $id
 * @param array $data requested data array
 * @return string $new_imagename
 */
	public function updateImageFile($id, $data) {
		$delete_imagename = $this->getImageName($id);
		$this->deleteImageFile($delete_imagename);
		$file = $data[get_class()]['file'];
		$new_imagename = md5(uniqid());
		$dest_fullpath = IMAGES . $this->image_folder . $new_imagename;
		$res = move_uploaded_file($file['tmp_name'], $dest_fullpath);
		if ($res) {
			chmod($dest_fullpath, 0666);
		}
		return $new_imagename;
	}


}
