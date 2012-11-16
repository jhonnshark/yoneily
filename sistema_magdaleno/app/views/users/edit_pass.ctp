<style type="text/css">
label {margin-left: 25%;}
a {text-decoration: none;}
</style>
<center><img src="<?php echo $html->url('/',true)?>/img/edit_user.png" height="80" /><br/></center>
<div align="center">
	<div class="capa">
			<div class="titulo_barra"><h1>Editar Password</h1></div>
<?php
     echo $form->create('User', array('action' => 'edit_pass'));
     echo $form->input('oldpass', array('label' => 'Password Actual','type'=>'password','required' => 'required'));
     echo $form->input('newpass', array('label' => 'Nuevo Password','type'=>'password','required' => 'required'));
     echo $form->input('newpassconfirm', array('label' => 'Confirmar Password','type'=>'password','required' => 'required'));
     echo $form->input('id_usuario', array('type'=>'hidden','value'=>$user['User']['id_usuario']))."<br/>";
     echo $form->end('Guardar Cambios')."<br/>";
?>

	</div>
</div>