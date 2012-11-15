<script type="text/javascript">
	$('document').ready(function(){
		$('.excel').click(function(event){
			$(".excel>a").attr('href','<?php echo $html->url('/',true)?>locales/pdf_completo/');
			 return true;
	    });
	});
</script>
<center><img src="<?php echo $html->url('/',true)?>/img/local.png" style="height:110px;" /><br/>
<h2>Locales Registradas</h2>
</center>
<?php if(!empty($locales)){ ?>
     <table style="margin-left:5px; " class="index" >
        <tr >
            <th><center><?php echo $this->Paginator->sort('ID', 'id_local'); ?></center></th>
            <th><center><?php echo $this->Paginator->sort('Nombre Local', 'nombre_empresa'); ?></center></th>
            <th><center><?php echo $this->Paginator->sort('Status', 'status'); ?></center></th>
			<th><center>Tel&eacute;fono</center></th>
            <th><center>Nombre de Encargado</center></th>
			<th><center>Eliminar</center></th>
			<th><center>Editar</center></th>
			<th><center>Status</center></th>
			<th><center>Reporte</center></th>
       </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($locales as $locale): ?>
        <tr>
        <td><?php echo $locale['Locale']['id_local']; ?></td>

        <td><?php echo $locale['Locale']['nombre_empresa']; ?></td>
        
		
		
		<td><center>
		<?php 
			
			if($locale['Locale']['status']=='1')
				{
					echo '<font color="green"><b>Activa</b></font>';
				}
				else
				{
					echo '<font color="red"><b>No Activa</b></font>';
				}
		?>
		</center></td>
		<td><?php echo $locale['Locale']['telefono_cel']; ?></td>
		
         <td><?php echo $locale['Locale']['encargado_nombre'].' '.$locale['Locale']['encargado_apellido']; ?></td>
         <td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/delete.png">', array('action' => 'delete', $locale['Locale']['id_local']), array('escape' => false), 'Estas seguro?' )?></center>
        </td>
        <td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/edit.png">', array('plugin' => 0,'action' => 'edit' , $locale['Locale']['id_local']), array('escape' => false))?></center>
        </td>
		<td>
			<?php 

				if($locale['Locale']['status']=='1')
				{
					echo $html->link('<img src="'.$html->url('/',true).'procesos/activo.png"><font size=2> Desactivar</font>', array('plugin' => 0,'action' => 'desactiva' , $locale['Locale']['id_local']), array('escape' => false));
				}else{
					echo $html->link('<img src="'.$html->url('/',true).'procesos/desactivo.png"><font size=2> Activar', array('plugin' => 0,'action' => 'activa' , $locale['Locale']['id_local']), array('escape' => false));
				}
			?>
        </td>
		<td>
             <center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/ver.png" style="width:16px; height:16px;">', array('plugin' => 0,'action' => 'pdf' , $locale['Locale']['id_local']), array('escape' => false))?></center>
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
<div class="excel"  align="center"><a><img src="<?php echo $html->url('/',true)?>/img/reporte_general.png"></a></div>
<?php }else{
	echo "<center><h2>No existen datos registrados</h2></center>";
}
?>
