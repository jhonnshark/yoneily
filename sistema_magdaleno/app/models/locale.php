<?php
class Locale extends AppModel {
	var $name = 'Locale';
	var $primaryKey = 'id_local';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
        var $displayField = 'nombre_file';
	var $validate = array(
            'nombre_empresa'=>array(
                'rule'=>array('notEmpty'),
                'message' => 'No debes dejar vacio el campo'
            ),
			'rif' => array(
                'userrule3' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'No debes dejar vacio el campo'
                )
            ),
			'encargado_nombre'=>array(
                'rule'=>array('notEmpty'),
                'message' => 'No debes dejar vacio el campo'
            ),
			'encargado_apellido'=>array(
                'rule'=>array('notEmpty'),
                'message' => 'No debes dejar vacio el campo'
            ),
			'encargado_cedula' => array(
				'userrule1' => array(
					'rule' => array('numeric'),
					'message' => 'Ingrese solo numeros'
				),
				'userrule3' => array(
					'rule' => array('notEmpty'),
					'message' => '* Requerido'
				)
			),
			'telefono_cel' => array(
				'userrule1' => array(
					'rule' => array('numeric'),
					'message' => 'Ingrese solo numeros'
				),
				'userrule3' => array(
					'rule' => array('notEmpty'),
					'message' => '* Requerido'
				)
			),
			'n_cuenta_uno' => array(
				'userrule1' => array(
					'rule' => array('numeric'),
					'message' => 'Ingrese solo numeros'
				),
				'userrule3' => array(
					'rule' => array('notEmpty'),
					'message' => '* Requerido'
				)
			),
            'descripcion_n_cuenta_uno' => array(
                'userrule3' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'No debes dejar vacio el campo'
                )
            ),
			/*'correo' => array(
                'userrule3' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'No debes dejar vacio el campo'
                )
            ),
			'descripcion_n_cuenta_dos' => array(
                'userrule3' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'No debes dejar vacio el campo'
                )
            ),*/
			'direccion' => array(
                'userrule3' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'No debes dejar vacio el campo'
                )
            ),
			/*'password' => array(
               'rule' => array('between', 4, 10),
               'message' => 'Paswords debe estar entre 4 y 10 caracteres.'
			),
			'confpassword' => array(
				   'rule' => array('equalTo', 'password'),
				   'message' => 'Debes colocar el mismo password.'
			),
			'password'=>array(
                'userrule1' => array(
                    'rule' => array('minLength', 4),
                    'message' => 'Este campo debe tener minimo 4 caracteres'
                ),
                'userrule3' => array(
                    'rule' => array('notEmpty'),
                    'message' => '* Requerido'
                )
            ),
			'confpassword'=>array(
                    'userrule1' => array(
                    'rule' => array('minLength', 4),
                    'message' => 'Este campo debe tener minimo 4 caracteres'
                 )
             ),*/
            'newpass'=>array(
                    
                    'rule' => array('minLength', 4),
                    'message' => 'Este campo debe tener minimo 4 caracteres'
                 
             )
        );

	var $actsAs = array(
	
            'MeioUpload' => array(
                'nombre_file' => array(
                    'dir' => 'files{DS}locales/otras',
                    'create_directory' => true,
                    //'max_size' => 2097152,
                    //'max_dimension' => 'w',
                    'thumbnailQuality' => 50,
                    'useImageMagick' => true,
                    //'imageMagickPath' => 'files{DS}thumbnails',
                    'allowed_mime' => array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png','audio/mpeg','application/x-shockwave-flash','video/x-flv'),
                    'allowed_ext' => array('.jpg','.JPG', '.jpeg','.JPEG', '.png','.PNG', '.gif','.GIF','.mp3','.swf','.flv'),
                    /*'thumbsizes' => array(
                        'chiquita'  => array('width' => 150, 'height' => 150),
                        //'normal' => array('width' => 100, 'height' => 100),
                        //'grande'  => array('width' => 800, 'height' => 600)
                    ),*/
                    //'default_class' => 'Archivo',
               ),
			   'ubicacion_file' => array(
                    'dir' => 'files{DS}locales/otras',
                    'create_directory' => true,
                    //'max_size' => 2097152,
                    //'max_dimension' => 'w',
                    'thumbnailQuality' => 50,
                    'useImageMagick' => true,
                    //'imageMagickPath' => 'files{DS}thumbnails',
                    'allowed_mime' => array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png','audio/mpeg','application/x-shockwave-flash','video/x-flv'),
                    'allowed_ext' => array('.jpg','.JPG', '.jpeg','.JPEG', '.png','.PNG', '.gif','.GIF','.mp3','.swf','.flv'),
                    /*'thumbsizes' => array(
                        'chiquita'  => array('width' => 150, 'height' => 150),
                        //'normal' => array('width' => 100, 'height' => 100),
                        //'grande'  => array('width' => 800, 'height' => 600)
                    ),*/
                    //'default_class' => 'Archivo',
               )
			)
    );

        var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'usuario_id_usuario',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $hasAndBelongsToMany = array(
		'Archivo' => array(
			'className' => 'Archivo',
			'joinTable' => 'archivos_galleries',
			'foreignKey' => 'galerias_id_galeria',
			'associationForeignKey' => 'files_id_file',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'joinTable' => 'categories_galleries',
			'foreignKey' => 'galleries_id_galeria',
			'associationForeignKey' => 'categories_id_categorias',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)/*,
		'News' => array(
			'className' => 'News',
			'joinTable' => 'news_galleries',
			'foreignKey' => 'galerias_id_galeria',
			'associationForeignKey' => 'contennoticias_id_contennoticias',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)*/
	);

}
?>