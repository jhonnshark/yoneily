<?php
class Category extends AppModel {
	var $name = 'Category';
	var $primaryKey = 'id_categorias';
        var $displayField = 'nombre_categorias';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

        var $validate = array(
            'nombre_categorias'=>array(
                'rule'=>'notEmpty',
                'message' => 'Debes colocar una opcion como link'
            )
          );
	var $belongsTo = array(
		'ParentCategory' => array(
			'className' => 'Category',
			'foreignKey' => 'categorias_id_categorias',
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
		),
		/*'CategoriasCategorias' => array(
			'className' => 'CategoriasCategorias',
			'foreignKey' => 'categorias_id_categorias',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)*/
	);

	var $hasMany = array(
		'ChildCategory' => array(
			'className' => 'Category',
			'foreignKey' => 'categorias_id_categorias',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


	var $hasAndBelongsToMany = array(
		/*'Video' => array(
			'className' => 'Video',
			'joinTable' => 'categories_videos',
			'foreignKey' => 'categories_id_categorias',
			'associationForeignKey' => 'videos_id_videos',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),*/
               
		'Gallery' => array(
			'className' => 'Gallery',
			'joinTable' => 'categories_galleries',
			'foreignKey' => 'categories_id_categorias',
			'associationForeignKey' => 'galleries_id_galeria',
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