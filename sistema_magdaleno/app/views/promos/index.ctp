<style type="text/css">
label {margin-left: 25%;}
a {text-decoration: none; color: blue;}
</style>


<center><img src="<?php echo $html->url('/',true)?>/img/galeria.png" style="height:80px;" width='80' /><br/>

</center>
<?php if(!empty($promociones)){ 
	$user=$session->read('Auth.User.locale_id_local');
?>
     <table style="margin-left:5px; " class="index" >
     	<tr><td colspan="10" style="padding:0px; margin:0px;">
        <center>
         <div class="titulo_barra"><h2>Promociones Registradas</h2></div>
     </center>
        </td>
    </tr>
        <tr >
            <th><?php echo $this->Paginator->sort('ID', 'id_promo'); ?></th>
            <th><?php echo $this->Paginator->sort('Nombre de la Galeria', 'texto_promo'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha de Creación', 'fechacre_promo'); ?></th>
			<th>Publicar</th>
            <th>Nombre de Usuario</th>
			<th>Eliminar</th>
			<th>Editar</th>
			<th>Status</th>
       </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($promociones as $gallery): ?>
        <tr>
        <td><?php echo $gallery['Promo']['id_promo']; ?></td>

        <td><?php echo $gallery['Promo']['texto_promo']; ?></td>
        <td><?php echo $gallery['Promo']['fechacre_promo']; ?></td>
		
		
		<td><center>
		<?php 
			
			if($gallery['Promo']['publicar']=='1')
				{
					echo '<font color="green"><b>Activa</b></font>';
				}
				else
				{
					echo '<font color="red"><b>No Activa</b></font>';
				}
		?>
		</center></td>
		
		
         <td><?php echo $gallery['User']['perfil_usuario']; ?></td>
         <td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/delete.PNG">', array('action' => 'delete', $gallery['Promo']['id_promo']), array('escape' => false), 'Estas seguro?' )?></center>
        </td>
        <td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/edit.PNG">', array('plugin' => 0,'action' => 'edit' , $gallery['Promo']['id_promo']), array('escape' => false))?></center>
        </td>
		<td>
			<?php 

				if($gallery['Promo']['publicar']=='1')
				{
					echo $html->link('<img src="'.$html->url('/',true).'procesos/activo.png"><font size=2> Desactivar</font>', array('plugin' => 0,'action' => 'desactiva' , $gallery['Promo']['id_promo'],$user), array('escape' => false));
				}else{
					echo $html->link('<img src="'.$html->url('/',true).'procesos/desactivo.png"><font size=2> Activar', array('plugin' => 0,'action' => 'activa' , $gallery['Promo']['id_promo'],$user), array('escape' => false));
				}
			?>
        </td>


        </tr>
     <?php endforeach; ?>
     
        <!-- Shows the page numbers -->
<?php echo $this->Paginator->numbers(); ?>
<!-- Shows the next and previous links -->
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>
<!-- prints X of Y, where X is current page and Y is number of pages -->
<?php echo $this->Paginator->counter(); ?>
 </table>
 <?php }else{
	echo "<center><h2>No existen datos registrados</h2></center>";
}
?>