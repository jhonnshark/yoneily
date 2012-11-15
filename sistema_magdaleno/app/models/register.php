<?php
class Register extends AppModel {
	var $name = 'Register';
	var $primaryKey = 'idregistro';
	var $displayField = 'foto';
        var $validate = array(
           'correo' => array(
             'rule' => 'isUnique',
             'on' => 'create',
             'message' => 'Este correo ya se encuentra registrado'
         )
   );
	/*var $actsAs = array(
            'MeioUpload' => array(
                'foto' => array(
                    'dir' => 'files{DS}usuarios/otras',
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
                    ),
                    //'default_class' => 'Archivo',
               )
        )
    );*/


     /*var $validate = array(
           'usuario' => array(
               'rule' => 'alphaNumeric',
               'message' => 'Usuario solo debe tener letras y numeros.'
           ),
         'password' => array(
               'rule' => array('between', 4, 6),
               'message' => 'Paswords debe estar entre 4 y 6 caracteres.'
           ),
         'rpass' => array(
               'rule' => array('equalTo', 'password'),
               'message' => 'Debes colocar el mismo password.'
           )

    );*/

}
?>