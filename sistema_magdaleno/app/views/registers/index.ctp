<script type="text/javascript">
	$('document').ready(function(){
		$('.excel').click(function(event){
			$(".excel>a").attr('href','<?php echo $html->url('/',true)?>registers/pdf_completo_cliente/');
			 return true;
	    });
	});
</script>
<center><img src="<?php echo $html->url('/',true)?>/img/clientes.png" style="height:110px;" /><br/>
<?php //pr($registers);
if(!empty($registers)){?>
<h2>Clientes Registrados</h2>
</center>
     <table style="margin-left:5px; " class="index" >
        <tr >
            <th><?php echo $this->Paginator->sort('ID', 'idregistro'); ?></th>
            <th><?php echo $this->Paginator->sort('Email', 'correo'); ?></th>
            <th><?php echo $this->Paginator->sort('Pais', 'pais'); ?></th>
			<th>Sexo</th>
			<th>Status</th>
            <th>Nombre de Cliente</th>
			<th>Eliminar</th>
			<th>Editar</th>
			<th><center>Accion</center></th>
			<th><center>Reporte</center></th>
       </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php 
	 //pr($registers);
	 foreach ($registers as $register): ?>
        <tr>
        <td><?php echo $register['Register']['idregistro']; ?></td>

        <td><?php echo $register['Register']['correo']; ?></td>
        <td><?php echo $register['Register']['pais']; ?></td>
		
		
		<td><center>
		<?php 
			
			if($register['Register']['sexo']=='M')
				{
					echo '<font color="green"><b>Masculino</b></font>';
				}
				else
				{
					echo '<font color="red"><b>Femenino</b></font>';
				}
		?>
		</center></td>
		<td><center>
		<?php 
			
			if($register['Register']['status']=='1')
				{
					echo '<font color="green"><b>Activo</b></font>';
				}
				else
				{
					echo '<font color="red"><b>Inactivo</b></font>';
				}
		?>
		</center></td>
		
         <td><?php echo $register['Register']['nombreape']; ?></td>
         <td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/delete.png">', array('action' => 'delete', $register['Register']['idregistro']), array('escape' => false), 'Estas seguro?' )?></center>
        </td>
        <td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/edit.png">', array('plugin' => 0,'action' => 'edit' , $register['Register']['idregistro']), array('escape' => false))?></center>
        </td>
		<td>
			<?php 

				if($register['Register']['status']=='1')
				{
					echo $html->link('<img src="'.$html->url('/',true).'procesos/activo.png"><font size=2> Desactivar</font>', array('plugin' => 0,'action' => 'desactiva' , $register['Register']['idregistro']), array('escape' => false));
				}else{
					echo $html->link('<img src="'.$html->url('/',true).'procesos/desactivo.png"><font size=2> Activar', array('plugin' => 0,'action' => 'activa' , $register['Register']['idregistro']), array('escape' => false));
				}
			?>
        </td>
		<td>
             <center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/ver.png" style="width:16px; height:16px;">', array('plugin' => 0,'action' => 'pdf_cliente' , $register['Register']['idregistro']), array('escape' => false))?></center>
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
	echo "<center><h2>No existen clientes registrados</h2></center>";
 }?>