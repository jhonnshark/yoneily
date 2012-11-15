<center><img src="<?php echo $html->url('/',true)?>/img/ayuda.png" style="height:110px;" /><br/>
<h2>Preguntas Registradas</h2>
</center>
<?php //pr($preguntas); 
if(!empty($preguntas)){ ?>
     <table style="margin-left:5px; " class="index" >
        <tr >
            <th><?php echo $this->Paginator->sort('ID', 'id_page'); ?></th>
            <th><?php echo $this->Paginator->sort('Nombre y Apellido', 'nombre'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha', 'fecha'); ?></th>
			<th>Local</th>
			<th><?php echo $this->Paginator->sort('Status', 'status'); ?></th>
			<th>Eliminar</th>
			<th>Ver Comentario</th>
       </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($preguntas as $pregunta): ?>
        <tr>
        <td><?php echo $pregunta['Page']['id_page']; ?></td>

        <td><?php echo $pregunta['Page']['nombre']; ?></td>
        <td><?php echo $pregunta['Page']['fecha']; ?></td>
		<td><?php echo $pregunta['Locale']['nombre_empresa']; ?></td>
		
		<td><center>
		<?php 
			
			if($pregunta['Page']['status']=='0')
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
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/delete.png">', array('action' => 'delete', $pregunta['Page']['id_page']), array('escape' => false), 'Estas seguro de Eliminar?' )?></center>
        </td>
        <td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/ver_lupa.png">', array('plugin' => 0,'action' => 'responder_pregunta' , $pregunta['Page']['id_page']), array('escape' => false))?></center>
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