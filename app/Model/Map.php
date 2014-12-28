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
 * save image data function
 *
 * @param array $data requested data array
 * @return mixed On success Model::$data if its not empty or true, false on failure
 *
 */
	public function saveImageFile($data) {
		$options = array(
			'fields' => 'id',
			'conditions' => array('and' => array(
				'Map.title' => $data[get_class()]['title'],
				'Map.user_id' => $data[get_class()]['user_id']
			)
		));
		$newId = $this->find('first', $options);
		$imageName = $newId[get_class()]['id'];

		$dest_fullpath = IMAGES . $this->image_folder . $imageName;

		$file = $data[get_class()]['file'];
		$res = move_uploaded_file($file['tmp_name'], $dest_fullpath);
		if ($res) {
			chmod($dest_fullpath, 0666);
		}

		$saveImage = array(get_class() => array('imagename' => $imageName));
		return $this->save($saveImage);
	}

/**
 * delete image data function
 *
 * @param string $id
 * @return void
 */
	public function deleteImageFile($id) {
		if (!isset($id)) {
			return;
		}
		$dest_fullpath = IMAGES . $this->image_folder . $id;
		if(file_exists($dest_fullpath)) {
			unlink($dest_fullpath);
		}
	}

}
