<h1>Crear Categorias</h1>
<?php
   echo $form->create('Category');
   echo $form->input('Menu.name_menus',array('options'=>array($menus),'label'=>'Menus'));
   echo $form->input('nombre_categorias', array('label' => 'Titulo del Link'));
   echo $form->input('usuario_id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
   echo $form->input('id_categorias', array('type'=>'hidden'));
   echo $form->input('categorias_id_categorias', array('type'=>'hidden','value'=>1));
   echo $form->end('Crear Link');
?>


