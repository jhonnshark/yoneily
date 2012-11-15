<?php
class Video extends AppModel {
	var $name = 'Video';
	var $primaryKey = 'id_videos';
	

      /*  var $hasMany = array(
            'Newsvideos' => array(
                'className'     => 'news_videos',
                'foreignKey'    => 'videos_id_videos',
                'conditions'    => '',
                'order'    => ''                
            )
        );*/
        
        var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'usuario_id_usuario',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

                'Archivo' => array(
			'className' => 'Archivo',
			'foreignKey' => 'archivos_id_file',
			'conditions' => '',
			'fields' => 'nombre_file',
			'order' => ''
		)
	);

        
/*
	var $hasAndBelongsToMany = array(
		'Category' => array(
			'className' => 'Category',
			'joinTable' => 'categories_videos',
			'foreignKey' => 'videos_id_videos',
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
		),
                'News' => array(
			'className' => 'News',
			'joinTable' => 'news_videos',
			'foreignKey' => 'videos_id_videos',
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
		)
	);
*/
        function beforeSave() {

        $currentUrl = Inflector::slug(strtolower($this->data[$this->name]['titulo_video']));
        //pr($currentUrl);
        $result = $this->find('all',array(
            'conditions' => array(
            $this->name .'.url' => $currentUrl,
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
            $currentBegginingUrl = $currentUrl;

            $currentIndex = 1;

            while($currentIndex > 0) {
                if (!in_array($currentBegginingUrl . '_' . $currentIndex, $sameUrls)) {
                    $currentUrl = $currentBegginingUrl . '_' . $currentIndex;

                    $currentIndex = -1;
                }

                $currentIndex++;
            }
        }

        $this->data[$this->name]['url'] = str_replace("_","-",$currentUrl);

        return true;
    }

}
?>