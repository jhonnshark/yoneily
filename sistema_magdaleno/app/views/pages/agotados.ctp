<center><img src="<?php echo $html->url('/',true)?>/img/folder2_grey.png" style="height:80px;" width='80'/><br/></center>

<?php //pr($galerias); 
if(!empty($galerias)){ ?>

     <table style="margin-left:5px; text-align:center;" class="index" >
     	<tr><td colspan="10" style="padding:0px; margin:0px;">
        <center>
         <div class="titulo_barra"><h2>Productos Agotados</h2></div>
     </center>
        </td>
    </tr>
        <tr >
            <th><center><?php echo $this->Paginator->sort('ID', 'id_galeria'); ?></center></th>
            <th><center><?php echo $this->Paginator->sort('Producto', 'texto_galeria'); ?></center></th>
            <th><center><?php echo $this->Paginator->sort('Fecha', 'fechacre_galeria'); ?></center></th>
			<th><center>Local</center></th>
			<th><center><?php echo $this->Paginator->sort('Cantidad Inicial', 'cantidad'); ?></center></th>
			<th><center>Cantidad Existente</center></th>
			<th><center>Cantidad Vendidos</center></th>
			<th><center>Precio</center></th>
			<th><center>Alerta</center></th>
       </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($galerias as $galeria): ?>
        <tr>
        <td><?php echo $galeria['Gallery']['id_galeria']; ?></td>

        <td><?php echo $galeria['Gallery']['texto_galeria']; ?></td>
        <td><?php echo $galeria['Gallery']['fechacre_galeria']; ?></td>
		<td><?php echo $galeria['Locale']['nombre_empresa']; ?></td>
		<td><?php echo $galeria['Gallery']['cantidad']; ?></td>
		<td><?php echo $galeria['Gallery']['cantidad_existente']; ?></td>
		<td><?php echo $galeria['Gallery']['prod_vendidos']; ?></td>
		<td><?php echo $galeria['Gallery']['precio']." BsF."; ?></td>
		<?php $existencia=$galeria['Gallery']['cantidad_existente'];
		if($existencia >=10){
		?>
		<td><img src="<?php echo $html->url('/',true)?>/img/Green_tick.png" style="height:20px;" /></td>
		<?php }else{?>
		<td><img src="<?php echo $html->url('/',true)?>/procesos/alerta.PNG" style="height:20px;" /></td>
		<?php }?>
        </tr>
     <?php endforeach; ?>
     
        <!-- Shows the page numbers -->
<?php echo $this->Paginator->numbers(); ?>
<!-- Shows the next and previous links -->
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->next('Next » ', null, null, array('class' => 'disabled')); ?>
<!-- prints X of Y, where X is current page and Y is number of pages -->
<?php echo $this->Paginator->counter(); ?>
 </table>
 <?php }else{
	echo "<center><h2 style='color: black;'>No existen productos agotados</h2></center>";
}
?>

<!--PROMOCIONES -->
<br/>
<?php //pr($promociones); 
if(!empty($promociones)){ ?>

     <table style="margin-left:5px; text-align:center;" class="index" >
     	<tr><td colspan="10" style="padding:0px; margin:0px;">
        <center>
         <div class="titulo_barra"><h2>Promociones Agotadas</h2></div>
     </center>
        </td>
    </tr>
        <tr >
            <th><center><?php echo $this->Paginator->sort('ID', 'id_promo'); ?></center></th>
            <th><center><?php echo $this->Paginator->sort('Producto', 'texto_promo'); ?></center></th>
            <th><center><?php echo $this->Paginator->sort('Fecha', 'fechacre_promo'); ?></center></th>
			<th><center>Local</center></th>
			<th><center><?php echo $this->Paginator->sort('Cantidad Inicial', 'cantidad'); ?></center></th>
			<th><center>Cantidad Existente</center></th>
			<th><center>Cantidad Vendidos</center></th>
			<th><center>Precio</center></th>
			<th><center>Alerta</center></th>
       </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($promociones as $promocion): ?>
        <tr>
        <td><?php echo $promocion['Promo']['id_promo']; ?></td>

        <td><?php echo $promocion['Promo']['texto_promo']; ?></td>
        <td><?php echo $promocion['Promo']['fechacre_promo']; ?></td>
		<td><?php echo $promocion['Locale']['nombre_empresa']; ?></td>
		<td><?php echo $promocion['Promo']['cantidad']; ?></td>
		<td><?php echo $promocion['Promo']['cantidad_existente']; ?></td>
		<td><?php echo $promocion['Promo']['prod_vendidos']; ?></td>
		<td><?php echo $promocion['Promo']['precio']." BsF."; ?></td>
		<?php $existencia=$promocion['Promo']['cantidad_existente'];
		if($existencia >=10){
		?>
		<td><img src="<?php echo $html->url('/',true)?>/img/Green_tick.png" style="height:20px;" /></td>
		<?php }else{?>
		<td><img src="<?php echo $html->url('/',true)?>/procesos/alerta.PNG" style="height:20px;" /></td>
		<?php }?>
        </tr>
     <?php endforeach; ?>
     
        <!-- Shows the page numbers -->
<?php echo $this->Paginator->numbers(); ?>
<!-- Shows the next and previous links -->
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->next('Next » ', null, null, array('class' => 'disabled')); ?>
<!-- prints X of Y, where X is current page and Y is number of pages -->
<?php echo $this->Paginator->counter(); ?>
 </table>
 <?php }else{
	echo "<center><h2 style='color:black;'>No existen promociones agotadas</h2></center>";
}
?>