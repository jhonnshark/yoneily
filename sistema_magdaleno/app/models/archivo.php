<?php
 class Archivo extends AppModel {
	var $name = 'Archivo';
	var $primaryKey = 'id_file';
        var $uses = array('Archivo','Path');
        var $displayField = 'nombre_file';
       	//The Associations below have been created with all possible keys, those that are not needed can be removed
       
        var $actsAs = array(
            'MeioUpload' => array(
			   'nombre_file' => array(
                    'dir' => 'files{DS}videothumbnail',
                    'create_directory' => true,
                    'thumbnailQuality' => 50,
                    'useImageMagick' => true,
                    'allowed_mime' => array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png'),
                    'allowed_ext' => array('.jpg', '.jpeg', '.png', '.gif'),
               ),
               'vidthumbnail' => array(
                    'dir' => 'files{DS}videothumbnail',
                    'create_directory' => true,
                    'thumbnailQuality' => 50,
                    'useImageMagick' => true,
                    'allowed_mime' => array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png'),
                    'allowed_ext' => array('.jpg', '.jpeg', '.png', '.gif'),
               )

        )
    );

        /*var $hasMany = array(
            'Video' => array(
                'className'     => 'Video',
                'foreignKey'    => 'id_videos',
                'conditions'    => '',
                'order'    => ''
            )
        );*/
       

	var $belongsTo = array(
		'Path' => array(
			'className' => 'Path',
			'foreignKey' => 'path_id_path',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'usuario_id_usuario',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		
	);

	var $hasAndBelongsToMany = array(
		'Gallery' => array(
			'className' => 'Gallery',
			'joinTable' => 'archivos_galleries',
			'foreignKey' => 'files_id_file',
			'associationForeignKey' => 'galerias_id_galeria',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>