<div style="margin-top:90px;margin-left:0px;background-color:#ffffff;min-height:450px;">
<center><img src="<?php echo $html->url('/',true)?>/img/folder2_grey.png" style="height:110px;" /><br/>
<h2><font color="black">Mi Bandeja de Entrada de Reclamos</font></h2>
</center>
<?php //pr($reclamos); 
if(!empty($reclamos)){ ?>
 <table style="margin-left:4px;" class="paginador">
<tr>
<td>
<!-- Shows the page numbers -->
<?php $pag=$this->Paginator->numbers();
if(!empty($pag)){
	echo "<font color='white'>P&aacute;gina</font> ".$this->Paginator->numbers(); 
}else{
	echo "<font color='white'>P&aacute;gina</font> <font color='black'>0</font>"; 
}
?>
</td>
</tr></table>
     <table style="margin-left:5px; " class="mensajes" >
        <tr  class="mensajes">
            <th  class="mensajes">ID</th>
            <th  class="mensajes"><?php echo $this->Paginator->sort('Nombre y Apellido', 'nombre'); ?></th>
            <th  class="mensajes"><?php echo $this->Paginator->sort('Fecha', 'fecha'); ?></th>
			<th  class="mensajes">Local</th>
			<th  class="mensajes"><?php echo $this->Paginator->sort('Status', 'status'); ?></th>
			<th  class="mensajes">Accion</th>
			<th  class="mensajes">Eliminar</th>
			<th  class="mensajes">Ver</th>
       </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php $i=1; foreach ($reclamos as $reclamo): ?>
        <tr  class="mensajes">
        <td  class="mensajes"><font color="navy"><?php echo $i++; ?></font></td>

        <td  class="mensajes"><font color="black"><?php echo $reclamo['Locale']['encargado_nombre'].' '.$reclamo['Locale']['encargado_apellido']; ?></font></td>
        <td  class="mensajes"><font color="black"><?php echo $reclamo['Denuncia']['fecha']; ?></font></td>
		<td  class="mensajes" ><font color="black"><?php echo $reclamo['Locale']['nombre_empresa']; ?></font></td>
		
		<td  class="mensajes"><center>
		<?php 
			
			if($reclamo['Denuncia']['status']!=0)
				{
					echo '<font color="green"><b>Leida</b></font>';
				}
				else
				{
					echo '<font color="red"><b>Sin Leer</b></font>';
				}
		?>
		</center></td>
		<?php //pr($reclamo);
		if(!empty($reclamo['Gallery']['url'])){
			$fecha=$reclamo['0']['fecha1']; 
			$url=$reclamo['Gallery']['url']; 
		?>
		<td  class="mensajes"><center><a href="<?php echo $html->url('/',true)?>pages/detallemensaje/<?php echo $fecha."/".$url."/".$reclamo['Denuncia']['id_denuncia']; ?>" target="_blank" ><img src="<?php echo $html->url('/',true)?>/img/aviso.png" style="height:20px;" /></a></center></td>
		<?php }?>
		<?php 
		
		if(!empty($reclamo['Promo']['url'])){
			$fecha=$reclamo['0']['fecha2']; 
			$url=$reclamo['Promo']['url']; 
		?>
		<td  class="mensajes"><center><a href="<?php echo $html->url('/',true)?>denuncias/detallemensajepromo/<?php echo $fecha."/".$url."/".$reclamo['Denuncia']['id_denuncia']; ?>" target="_blank" ><img src="<?php echo $html->url('/',true)?>/img/aviso.png" style="height:20px;" /></a></center></td>
		<?php }?>
		<td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/delete.png">', array('controller'=>'pages','action' => 'delete_reclamo', $reclamo['Denuncia']['id_denuncia']), array('escape' => false), 'Estas seguro?' )?></center>
        </td>
        <td  class="mensajes">
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/ver_lupa.png">', array('plugin' => 0,'controller'=>'denuncias','action' => 'responder_reclamo' , $reclamo['Denuncia']['id_denuncia']), array('escape' => false))?></center>
        </td>
		
        </tr>
     <?php endforeach; ?>

 </table>
 <?php }else{
	echo "<center><h2>No existen mensajes registrados</h2></center>";
}
?>
</div>