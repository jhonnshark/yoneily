<style type="text/css">
label {margin-left: 25%;}
table.index a{ text-decoration: none;}
</style>
<center><img src="<?php echo $html->url('/',true)?>/img/galeria.png" style="height:80px;" width="80" /><br/>

</center>
<?php if(!empty($galleries)){ ?>
     <table style="margin-left:5px; " class="index" >
     	<tr><td colspan="9" style="padding:0px; margin:0px;">
        <center>
         <div class="titulo_barra"><h2>Galerias Registradas</h2></div>
     </center>
        </td>
    </tr>
        <tr >
            <th><?php echo $this->Paginator->sort('ID', 'id_galeria'); ?></th>
            <th><?php echo $this->Paginator->sort('Nombre de la Galeria', 'texto_galeria'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha de Creación', 'fechacre_galeria'); ?></th>
			<th>Publicar</th>
            <th>Nombre de Usuario</th>
			<th>Eliminar</th>
			<th>Editar</th>
			<th>Status</th>
       </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($galleries as $gallery): ?>
        <tr>
        <td><?php echo $gallery['Gallery']['id_galeria']; ?></td>

        <td><?php echo $gallery['Gallery']['texto_galeria']; ?></td>
        <td><?php echo $gallery['Gallery']['fechacre_galeria']; ?></td>
		
		
		<td><center>
		<?php 
			
			if($gallery['Gallery']['publicar']=='1')
				{
					echo '<font color="green"><b>Activa</b></font>';
				}
				else
				{
					echo '<font color="red"><b>No Activa</b></font>';
				}
		?>
		</center></td>
		
		
         <td><center><?php echo $gallery['User']['perfil_usuario']; ?></center></td>
         <td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/delete.PNG">', array('action' => 'delete', $gallery['Gallery']['id_galeria']), array('escape' => false), 'Estas seguro?' )?></center>
        </td>
        <td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/edit.PNG">', array('plugin' => 0,'action' => 'edit' , $gallery['Gallery']['id_galeria']), array('escape' => false))?></center>
        </td>
		<td>
			<?php 

				if($gallery['Gallery']['publicar']=='1')
				{
					echo $html->link('<img src="'.$html->url('/',true).'procesos/activo.png"><font size=2> Desactivar</font>', array('plugin' => 0,'action' => 'desactiva' , $gallery['Gallery']['id_galeria']), array('escape' => false));
				}else{
					echo $html->link('<img src="'.$html->url('/',true).'procesos/desactivo.png"><font size=2> Activar', array('plugin' => 0,'action' => 'activa' , $gallery['Gallery']['id_galeria']), array('escape' => false));
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