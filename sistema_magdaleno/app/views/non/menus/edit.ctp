<h1>Edicion de Menus</h1>
<?php
     echo $form->create('Menu', array('action' => 'edit'));
     echo $form->input('name_menus',array('label'=>'Tipo de Menu'));
     echo $form->input('id_menus', array('type'=>'hidden'));
     echo $form->input('usuario_id_usuario', array('type'=>'hidden'));
     echo $form->end('Guardar Cambios');
?>
