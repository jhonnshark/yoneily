<script type="text/javascript">
	$('document').ready(function(){
		$('.excel').click(function(event){
			$(".excel>a").attr('href','<?php echo $html->url('/',true)?>users/pdf_completo/');
			 return true;
	    });
	});
</script>
<center><img src="<?php echo $html->url('/',true)?>/img/personal.png" height="80" /><br/><h1>Usuario Creados</h1></center>
<h3><?php echo $html->link('Añadir Nuevo', array('action' => 'add'))?></h3>

<table class="index">
        <tr>
            <th><center><font size="2">Id</font></center></th>
            <th><center><font size="2">Usuario</font></center></th>
			<th><center><font size="2">Nombre y Apellido</font></center></th>
            <th><center><font size="2">Correo</font></center></th>
            <th><center><font size="2">Fecha de Creaci&oacute;n</font></center></th>
			<th><center><font size="2">Eliminar</font></center></th>
			<th><center><font size="2">Editar</font></center></th>
			<th><center><font size="2">Editar Contrase&ntilde;a</font></center></th>
			<th><center><font size="2">Reporte</font></center></th>
			<!--<th></th>-->
     </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($users as $user): ?>
        <tr>
        <td><?php echo $user['User']['id_usuario']; ?></td>
        <td>
             <?php
                //echo $html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id']));
             echo $user['User']['username'];
             ?>
        </td>
		<td>
            <?php echo $user['User']['perfil_usuario'];    ?>
        </td>
        <td><?php echo $user['User']['email_usuario']; ?></td>
        <td><?php echo $user['User']['fecharreg_usuario']; ?></td>
        <td>
             <center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/delete.png">', array('plugin' => 0,'action' => 'delete', $user['User']['id_usuario']), array('escape' => false), null, 'Estas seguro?' )?></center>
        </td>
        <td>
             <center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/edit.png">', array('plugin' => 0,'action' => 'edit' , $user['User']['id_usuario']), array('escape' => false))?></center>
        </td>
        <td>
             <center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/LOCK.png" style="width:16px; height:16px;">', array('plugin' => 0,'action' => 'edit_pass' , $user['User']['id_usuario']), array('escape' => false))?></center>
        </td>
        <!--<td>
             <?php //echo $html->link('Permisos de Usuario', array('action' => 'permission' , $user['User']['id_usuario']))?>
        </td>-->
		<td>
             <center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/ver.png" style="width:16px; height:16px;">', array('plugin' => 0,'action' => 'pdf' , $user['User']['id_usuario']), array('escape' => false))?></center>
        </td>
        </tr>
     <?php endforeach; ?>

 </table>
 
 <div class="excel"  align="center"><a><img src="<?php echo $html->url('/',true)?>/img/reporte_general.png"></a></div>