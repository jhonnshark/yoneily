<div style="margin-top:90px;margin-left:0px;background-color:#ffffff;min-height:450px;">
<center><img src="<?php echo $html->url('/',true)?>/img/folder2_grey.png" style="height:110px;" /><br/>
<font color="black"><h2>Mi Bandeja de Entrada</h2></font>
</center>
<?php //pr($mensajes); 
if(!empty($mensajes)){ ?>
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
			<!--<th  class="mensajes">Ver</th>-->
       </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php $i=1; foreach ($mensajes as $mensaje): ?>
        <tr  class="mensajes">
        <td  class="mensajes"><font color="navy"><?php echo $i++; ?></font></td>

        <td  class="mensajes"><font color="black"><?php echo $mensaje['Page']['nombre']; ?></font></td>
        <td  class="mensajes"><font color="black"><?php echo $mensaje['Page']['fecha']; ?></font></td>
		<td  class="mensajes" ><font color="black"><?php echo $mensaje['Locale']['nombre_empresa']; ?></font></td>
		
		<td  class="mensajes"><center>
		<?php 
			
			if($mensaje['Page']['status']!=0)
				{
					echo '<font color="green"><b>Leida</b></font>';
				}
				else
				{
					echo '<font color="red"><b>Sin Leer</b></font>';
				}
		?>
		</center></td>
		<?php //pr($mensajes);
		if(!empty($mensaje['Gallery']['url'])){
			$fecha=$mensaje['0']['fecha1']; 
			$url=$mensaje['Gallery']['url']; 
		?>
		<td  class="mensajes"><center><a href="<?php echo $html->url('/',true)?>pages/detallemensaje/<?php echo $fecha."/".$url."/".$mensaje['Page']['id_page']; ?>" target="_blank" ><img src="<?php echo $html->url('/',true)?>/img/aviso.png" style="height:20px;" /></a></center></td>
		<?php }?>
		<?php 
		if(!empty($mensaje['Promo']['url'])){
			$fecha=$mensaje['0']['fecha2']; 
			$url=$mensaje['Promo']['url']; 
		?>
		<td  class="mensajes"><center><a href="<?php echo $html->url('/',true)?>pages/detallemensajepromo/<?php echo $fecha."/".$url."/".$mensaje['Page']['id_page']; ?>" target="_blank" ><img src="<?php echo $html->url('/',true)?>/img/aviso.png" style="height:20px;" /></a></center></td>
		<?php }?>
		<td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/delete.png">', array('controller'=>'pages','action' => 'delete_mensaje', $mensaje['Page']['id_page']), array('escape' => false), 'Estas seguro?' )?></center>
        </td>
        <!--<td  class="mensajes">
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/ver_lupa.png">', array('plugin' => 0,'action' => 'responder_pregunta' , $mensaje['Page']['id_page']), array('escape' => false))?></center>
        </td>-->
		
        </tr>
     <?php endforeach; ?>

 </table>
 <?php }else{
	echo "<center><h2>No existen mensajes registrados</h2></center>";
}
?>
</div>