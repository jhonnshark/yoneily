<center><img src="<?php echo $html->url('/',true)?>/img/reclamos.png" style="height:110px;" /><br/>
<h2>Reclamos Registrados</h2>
</center>
<?php //pr($reclamos); 
if(!empty($reclamos)){ ?>
     <table style="margin-left:5px; " class="index" >
        <tr >
            <th><?php echo $this->Paginator->sort('ID', 'id_denuncia'); ?></th>
            <th><?php echo $this->Paginator->sort('Nombre y Apellido', 'nombre'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha', 'fecha'); ?></th>
			<th>Local</th>
			<th><?php echo $this->Paginator->sort('Status', 'status'); ?></th>
			<th>Eliminar</th>
			<th>Ver Comentario</th>
       </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($reclamos as $reclamo): ?>
        <tr>
        <td><?php echo $reclamo['Denuncia']['id_denuncia']; ?></td>

        <td><?php echo $reclamo['Register']['nombreape']; ?></td>

        <td><?php echo $reclamo['Denuncia']['fecha']; ?></td>
		<td><?php echo $reclamo['Locale']['nombre_empresa']; ?></td>
		
		<td><center>
		<?php 
			
			if($reclamo['Denuncia']['status']=='1')
				{
					echo '<font color="green"><b>Respondida</b></font>';
				}
				else
				{
					echo '<font color="red"><b>Sin Leer</b></font>';
				}
		?>
		</center></td>

         <td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/delete.png">', array('action' => 'delete', $reclamo['Denuncia']['id_denuncia']), array('escape' => false), 'Estas seguro de Eliminar?' )?></center>
        </td>
        <td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/ver_lupa.png">', array('plugin' => 0,'action' => 'responder_denuncia' , $reclamo['Denuncia']['id_denuncia']), array('escape' => false))?></center>
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