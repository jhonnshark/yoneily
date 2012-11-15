<script type="text/javascript">
	$('document').ready(function(){
		
		
		$('.registrar').click(function(event){
			var datos = new Object();
			datos.forma_pago = $("#forma_pago").val();
			datos.numero_pago = $("#numero_pago").val();
			datos.id_promo = $(".id_promo1").val();
			//alert(datos.id_promo);
			if(datos.forma_pago == "")	{ alert("Debes ingresar la forma de pago");}else
			if(datos.numero_pago == "")	{ alert("Debes ingresar el numero de depostio o transferencia");}else{
				$.ajax({
					type: "POST",
					url: "<?php echo $html->url('/',true);?>ventas/finalizar_compra/"+datos.forma_pago+"/"+datos.numero_pago+"/"+datos.id_promo,
					data: datos,
					success: function(data){
						//alert(data);
						if(data != ''){
							// Recargo la página
							location.reload();
							$("#finalizar").hide(2000);
							$("#resultados_venta").show(2000);
							$("#excel").show(2000);
						}
					}
				});
			}
		});
	
		$('.excel').click(function(event){
			var id_promo = $(".id_promo").val();
			//alert(id_promo);
			$(".excel>a").attr('href','<?php echo $html->url('/',true)?>ventas/pdf_compra/'+id_promo);
			 return true;
	    });
	});
</script>

<?php if(!empty($clientes)){ ?>
<div style="margin-top:90px;margin-left:0px;background-color:#ffffff;">
<table style="margin-left:4px;" class="paginador">
<tr>
<td>
<!-- Shows the page numbers -->
<?php echo "<font color='white'>P&aacute;gina</font> ".$this->Paginator->numbers(); ?>
<!-- Shows the next and previous links -->
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>
<!-- prints X of Y, where X is current page and Y is number of pages -->
<?php //echo $this->Paginator->counter(); ?>
</td>
</tr></table>
<center>
<table align="center" class="compras">
<tr>
<td><center><font color="black" size="6">| </font> <font color="navy" size="4"><b>Descripci&oacute;n Local </b></font> <font color="black" size="6">| </font></center></td>
<td><center><font color="navy" size="4"><b> Descripci&oacute;n Producto </b></font> <font color="black" size="6">| </font> </center></td>
<td><center><font color="navy" size="4"><b>Fecha Compra</b></font> <font color="black" size="6">| </font> </center></td>
<td><center><font color="navy" size="4"><b>Status Compra</b></font> <font color="black" size="6">| </font> </center></td>
</tr>
<?php 
//pr($clientes);
foreach ($clientes as $cliente): ?>
<tr>
<td><center>
	<img src="<?php echo $html->url('/',true)?>files/locales/thumbnails/<?php echo $cliente['Locale']['nombre_file'];?>" style="height:40px;width:90px;" />
	<br /><font color="black" size="3"> <b>
		<?php echo $cliente['Locale']['nombre_empresa'];?>
		<br><?php echo $cliente['Locale']['telefono_cel'];?>
	</b></font>
	<font color="navy" size="2">
		<br><?php echo $cliente['Locale']['correo'];?>
	</font>
</center></td>
<?php if(!empty($cliente['Gallery']['thumbnails'])){?>
<td><center>
	<img src="<?php echo $html->url('/',true)?>files/galeria/thumbnails/<?php echo $cliente['Gallery']['thumbnails'];?>" style="height:150px;width:150px;" />
	<br /><font color="navy" size="5"> 
		<?php echo $cliente['Gallery']['precio']." BsF.";?><br/>
		<?php echo $cliente['Gallery']['texto_galeria'];?>
	</font>
</center></td>
<?php }?>
<?php if(!empty($cliente['Promo']['thumbnails'])){?>
<td><center>
	<img src="<?php echo $html->url('/',true)?>files/promos/thumbnails/<?php echo $cliente['Promo']['thumbnails'];?>" style="height:100px;width:200px;" />
	<br /><font color="navy" size="5"> 
		<?php echo $cliente['Promo']['precio']." BsF.";?><br/>
		<?php echo $cliente['Promo']['texto_promo'];?>
	</font>
</center></td>
<?php }?>
<?php //if(!empty($cliente['Venta']['fecha'])){?>
<td><center>
<font color="navy" size="4"> 
		<?php echo $cliente['Venta']['fecha'];?>
	</font>
</center></td>
<?php //}?>
<?php $status=$cliente['Venta']['status']?>
<td style="width:150px;"><center>

<?php if($status==0){ ?>
<div id="finalizar">
<font color="red" size="4">Venta en Espera</font>
<font color="red">Solo resta llenar el siguiente formulario para finalizar su compra</font><br>
<font color="black">
Cantidad: <?php echo $cliente['Venta']['cantidad'];?><br>
Total a Pagar: <?php echo $cliente['Venta']['cantidad'] * $cliente['Promo']['precio'].' Bs.F';?><br>
<hr/>
	<?php
	echo $form->input('forma_pago',array('label'=>'Forma de Pago:','class'=>'forma_pago','id'=>'forma_pago','options'=>array(
      'Transferencia'=>'Transferencia',
	  'Deposito'=>'Deposito'
	   ),'empty'=>'Seleccione'
       ));
	echo $form->input('numero_pago',array('label'=>'Numero de Deposito o Transferencia', 'maxlength'=>15, 'size'=>12,'class'=>'numero_pago','id'=>'numero_pago'));
	//echo $form->input('id_promo',array('label'=>false, 'size'=>12,'class'=>'id_promo1','id'=>'id_promo1','type'=>'hidden','value'=>$cliente['Venta']['id_venta']));
	?>
	<input name="id_promo" type="hidden" class="id_promo1" id="id_promo1" value="<?php echo $cliente['Venta']['id_venta']?>"/>
<div class="registrar"  align="center"><a><img src="<?php echo $html->url('/',true)?>/procesos/procesar.png"></a></div>
</div>
<br><hr/>
<?php }?>
<?php if($status==1){ ?>
<font color="green" size="4">Compra Finalizada con &eacute;xito por el Vendedor. Gracias por su compra </font>
<?php }?>
<?php if($status==2){ ?>
<font color="blue" size="4"> Compra Cancelada</font>
<?php }?>
<?php if($status==3){ ?>

<font color="red">Felicidades, Gracias por su compra</font><br>
<font color="black">
Cantidad: <?php echo $cliente['Venta']['cantidad'];?><br>
Total Cancelado: <?php echo $cliente['Venta']['cantidad'] * $cliente['Promo']['precio'].' Bs.F';?><br>
<font color="green" size="4">Compra en espera por Confirmaci&oacute;n</font>
<?php
//echo $form->input('id_promo',array('label'=>false, 'size'=>12,'class'=>'id_promo1','id'=>'id_promo1','type'=>'hidden','value'=>$cliente['Venta']['id_venta']));
?>
<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/imprimir.png" >', array('plugin' => 0,'action' => 'pdf_compra' , $cliente['Venta']['id_venta']), array('escape' => false))?></center>
<?php }?>
<br><hr/>
</center></td>

</tr>

<?php endforeach; ?>
</table>
</center>
</div>

<?php }else{
$fecha=date('d-m-Y');
?>

<center>
<div style="margin-top:90px;margin-left:0px;background-color:#ffffff;min-height:500px;">
<br/>
<br/><br/><br/>
<img src="<?php echo $html->url('/',true)?>img/papelera_vacia.png" /><br />
<font color="black" size="6">| </font> <font color="navy" size="6"><b>No posee ninguna compra <br>a la fecha <?php echo $fecha;?> </b></font> <font color="black" size="6">| </font></center>
</div>
<?php }?>