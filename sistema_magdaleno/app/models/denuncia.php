<?php
class Denuncia extends AppModel {
	var $name = 'Denuncia';
	var $primaryKey = 'id_denuncia';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Locale' => array(
			'className' => 'Locale',
			'foreignKey' => 'locale_id_local',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Register' => array(
			'className' => 'Register',
			'foreignKey' => 'register_idregistro',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Gallery' => array(
			'className' => 'Gallery',
			'foreignKey' => 'galeria_id_galeria',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Promo' => array(
			'className' => 'Promo',
			'foreignKey' => 'promocion_id_promo',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>