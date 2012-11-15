<script type="text/javascript">
	$('document').ready(function(){
		$('.excel').click(function(event){
			$(".excel>a").attr('href','<?php echo $html->url('/',true)?>registers/pdf_completo/');
			 return true;
	    });
	});
</script>
<center><img src="<?php echo $html->url('/',true)?>/img/tarjeta.png" style="height:110px;" /><br/>
<?php if(!empty($registers)){?>
<h2>Compras Registradas</h2>
</center>
     <table style="margin-left:5px;width:690px; "  >
        <tr >
            <th><center><?php echo $this->Paginator->sort('ID', 'idregistro'); ?></center></th>
            <th><center><?php echo $this->Paginator->sort('Email', 'correo'); ?></center></th>
			<!--<th><center>Sexo</center></th>
			<th><center>Status</center></th>-->
            <th><center>Nombre Cliente</center></th>
			<th><center>Producto</center></th>
			<th><center>Confirmaci&oacute;n de Compra</center></th>
			<th><center>Reputaci&oacute;n Compras</center> </th>
			<th><center>Compras Canceladas</center></th>
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
        	
		<!--<td><center>
		<?php 
			
			if($register['Register']['sexo']=='M')
				{
					echo '<font color="green"><b>M</b></font>';
				}
				else
				{
					echo '<font color="red"><b>F</b></font>';
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
		</center></td>-->
		
         <td><center><?php echo $register['Register']['nombreape']; ?></center></td>
		 <?php if(!empty($register['Gallery']['texto_galeria']) and !empty($register['Gallery']['precio']) and !empty($register['Venta']['cantidad'])){?>
        <td><center><?php echo $register['Gallery']['texto_galeria']." <br>".$register['Gallery']['precio']." Bs.F. <br> Cantidad: ".$register['Venta']['cantidad']." <br> Total: ".$register['Venta']['cantidad'] * $register['Gallery']['precio']." Bs"; ?></center></td>
		<?php }else if(!empty($register['Promo']['texto_promo']) and !empty($register['Promo']['precio']) and !empty($register['Venta']['cantidad'])){ ?>
		<td><center><?php echo $register['Promo']['texto_promo']." <br>".$register['Promo']['precio']." Bs.F. <br> Cantidad: ".$register['Venta']['cantidad']." <br> Total: ".$register['Venta']['cantidad'] * $register['Promo']['precio']." Bs"; ?></center></td>
		<?php }?>
         <?php if(!empty($register['Venta']['forma_pago']) and !empty($register['Venta']['numero_pago'])){?>
        <td><center><?php echo "Forma de Pago: ".$register['Venta']['forma_pago']." <br>Numero de Pago: ".$register['Venta']['numero_pago']; ?></center></td>
		<?php }else{
			echo "<td><center><font color='red'>Compra en Espera</font></center></td>";
			}
		?>
		<td><center><?php echo $register['Register']['puntuacion_positiva']; ?></center></td>
		<td><center><?php echo $register['Register']['puntuacion_negativa']; ?></center></td>
		<td><center>
			<?php 

				if($register['Venta']['status']=='1'){
					echo '<font size=2 color=green><b> Exitosa</b></font>';
				}else if($register['Venta']['status']=='2'){
					echo '<font size=2 color=blue><b>Puntuaci&oacute;n Negativa a este Cliente</b></font>';
				}else{
					echo $html->link('<font size=2 color=red><b> Finalizar Compra</b>', array('plugin' => 0,'action' => 'Finalizar_compra' , $register['Venta']['id_venta']), array('escape' => false));
					echo "<br>________<br>";
					echo $html->link('<font size=2 color=green><b> Compra Cancelada</b></font>', array('plugin' => 0,'action' => 'compra_falla' , $register['Venta']['id_venta']), array('escape' => false));
				}
			?>
        </center></td>
		<td>
             <center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/ver.png" style="width:16px; height:16px;">', array('plugin' => 0,'action' => 'pdf' , $register['Venta']['id_venta']), array('escape' => false))?></center>
			 <!--<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/ver.png" style="width:16px; height:16px;">', array('plugin' => 0,'action' => 'pdf' , $register['Register']['idregistro']), array('escape' => false))?></center>-->
			 
			 
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
	echo "<center><h2>No existen compras registradas</h2></center>";
 }?>