<h1>Modificar link</h1>
<?php
   //pr($menus);
   echo $form->create('Category');
   //echo $form->input('name_menus', array('options' =>array($menus),'label'=>'Perfil'));
   //echo $form->input('Menu', array('options' =>array($menus),'label'=>'Menu'));
   echo $form->input('Menu',array('type'=>'select','multiple' => true));
   echo $form->input('categorias_id_categorias',array('options'=>$parent,'label'=>'Categoria Padre'));
   //echo $this->Form->input('Menu');
   echo $form->input('nombre_categorias', array('label' => 'Titulo del Link'));
   echo $form->input('link_categorias', array('label' => 'Link'));
   echo $form->input('usuario_id_usuario', array('type'=>'hidden'));
   echo $form->input('id_categorias', array('type'=>'hidden'));
   //echo $form->input('categorias_id_categorias', array('type'=>'hidden'));
   echo $form->end('Modificar Link');
?>

