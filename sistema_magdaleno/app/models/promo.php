<?php
class Promo extends AppModel {
	var $name = 'Promo';
	var $primaryKey = 'id_promo';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
        var $displayField = 'thumbnails';

        var $validate = array(
            'texto_promo'=>array(
                'rule'=>array('notEmpty'),
                'message' => 'No debes dejar vacio el campo'
            ),
			'claves' => array(
                'userrule3' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'No debes dejar vacio el campo'
                )
            ),
            'descripcion' => array(
                'userrule3' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'No debes dejar vacio el campo'
                )
            ),
			'locale_id_local' => array(
                'userrule3' => array(
                    'rule' => array('notEmpty'),
                    'message' => '* Requerido'
                )
            )
        );

	var $actsAs = array(
            'MeioUpload' => array(
                'thumbnails' => array(
                    'dir' => 'files{DS}promos/otras',
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
        var $hasMany = array(
            'Newsgalleries' => array(
                'className'     => 'news_galleries',
                'foreignKey'    => 'galerias_id_galeria',
                'conditions'    => '',
                'order'    => ''                
            )
        );

        var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'usuario_id_usuario',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Locale' => array(
			'className' => 'Locale',
			'foreignKey' => 'locale_id_local',
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

        function beforeSave() {

        $currentUrl = Inflector::slug(strtolower($this->data[$this->name]['texto_promo']));
		$claves = Inflector::slug(strtolower($this->data[$this->name]['claves']));
        //pr($currentUrl);
        $result = $this->find('all',array(
            'conditions' => array(
            $this->name .'.url' => $currentUrl.''.$claves,
            $this->name .".".$this->primaryKey." != "=>$this->id
            ),
            'fields' => array(
            $this->name.'.*')));

        if ($result !== false && count($result) > 0) {
            $sameUrls = array();

            foreach($result as $record) {
                $sameUrls[] = $record[$this->name]['url'];
            }
        }

        if (isset($sameUrls) && count($sameUrls) > 0) {
            $currentBegginingUrl = $currentUrl.''.$claves;

            $currentIndex = 1;

            while($currentIndex > 0) {
                if (!in_array($currentBegginingUrl . '_' . $currentIndex, $sameUrls)) {
                    $currentUrl = $currentBegginingUrl . '_' . $currentIndex;

                    $currentIndex = -1;
                }

                $currentIndex++;
            }
        }

        $this->data[$this->name]['url'] = str_replace("_","-",$currentUrl.''.$claves);

        return true;
    }

}
?>