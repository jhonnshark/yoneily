<?php
class Page extends AppModel {
	var $name = 'Page';
	var $primaryKey = 'id_page';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $validate = array(
			'nombre'=>array(
                'rule' => array('notEmpty'),
                'message' => 'No debes dejar vacio el campo'
            ),
			'correo'=>array(
                'rule' => array('notEmpty'),
                'message' => 'No debes dejar vacio el campo'
            ),
			/*'correo' => array(
             'rule' => 'isUnique',
             'on' => 'create',
             'message' => 'Este correo ya se encuentra registrado'
			),*/
			'telefono'=>array(
                'rule' => array('notEmpty'),
                'message' => 'No debes dejar vacio el campo'
            ),
			'sexo'=>array(
                'rule' => array('notEmpty'),
                'message' => 'No debes dejar vacio el campo'
            ),
			'pais'=>array(
                'rule' => array('notEmpty'),
                'message' => 'Requerido'
            ),
			'tipo_mensaje'=>array(
                'rule' => array('notEmpty'),
                'message' => 'No debes dejar vacio el campo'
            ),
			'comentario'=>array(
                'rule' => array('notEmpty'),
                'message' => 'Requerido'
            )
        );
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
			'foreignKey' => 'galerias_id_galeria',
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