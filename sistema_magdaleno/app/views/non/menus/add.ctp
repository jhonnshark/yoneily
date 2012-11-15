<h1>Crear Menus</h1>
<?php
    echo $form->create('Menu');
    echo $form->input('name_menus',array('label'=>'Tipo de Menu'));
    echo $form->input('usuario_id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
    echo $form->end('Guardar Cambios');
?>
