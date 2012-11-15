<h1>Editar Password</h1>
<?php
      //pr($result);
     echo $form->create('User', array('action' => 'edit_pass'));
     echo $form->input('oldpass', array('label' => 'Password Actual','type'=>'password'));
     echo $form->input('newpass', array('label' => 'Nuevo Password','type'=>'password'));
     echo $form->input('newpassconfirm', array('label' => 'Confirmar Password','type'=>'password'));
     //echo $form->input('id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
     echo $form->input('id_usuario', array('type'=>'hidden','value'=>$user['User']['id_usuario']));
     echo $form->end('Guardar Cambios');
?>