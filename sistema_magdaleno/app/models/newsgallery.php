<?php
class Newsgalleries extends AppModel {
	var $name = 'Newsgalleries';
	var $primaryKey = 'id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
      

	var $belongsTo = array(
		'News' => array(
			'className' => 'News',
			'foreignKey' => 'id_contennoticias',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Gallery' => array(
			'className' => 'Gallery',
			'foreignKey' => 'id_galeria',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>