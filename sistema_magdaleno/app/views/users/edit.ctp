<center>
<fieldset class="formulario">
<center><img src="<?php echo $html->url('/',true)?>/img/edit_user.png" height="80" /><br/><h1>Edicion de Usuarios</h1></center>
<div align="left">
    <h3 id="usu"><?php echo $html->link('Volver a la vista de consulta',array('action' => '/'));?></h3>
</div>
<div align="left">
<?php
     echo $form->create('User', array('action' => 'edit'));
     echo $form->input('groups_idgrupos', array('options'=>array($groups),'label'=>'Perfil','empty'=>'Elegir opción'));
     echo $form->input('username',array('label'=>'Nombre de Usuario'));
     echo $form->input('email_usuario',array('label' => 'Correo'));
     echo $form->input('id_usuario', array('type'=>'hidden'));
	 echo '<center>'.$form->end('Guardar Cambios').'</center>';
?>
</div>
</fieldset>
</center>