<style type="text/css">
label {margin-left: 25%;}
a {text-decoration: none;}
</style>


<center><img src="<?php echo $html->url('/',true)?>/img/edit_user.png" height="80" /><br/></center>

<div align="center">
	<div class="capa">
			<div class="titulo_barra"><h1>Edicion de Usuarios</h1></div>
		<div align="left">
		    <h3 id="usu"><?php echo $html->link('Volver a la vista de consulta',array('action' => 'index1'));?></h3>
		</div>
		<div align="center">
		<?php
		     echo $form->create('User', array('action' => 'edit'));
		     echo $form->input('groups_idgrupos', array('options'=>array($groups),'label'=>'Perfil','empty'=>'Elegir opción'));
		     echo $form->input('username',array('label'=>'Nombre de Usuario'));
		     echo $form->input('email_usuario',array('label' => 'Correo'));
		     echo $form->input('id_usuario', array('type'=>'hidden'))."<br/>";
			 echo '<center>'.$form->end('Guardar Cambios').'</center><br/>'; 
		?>
		</div>


	</div>
</div>