<script type="text/javascript">
      $('document').ready(function(){
	  
		    $('.espera1').show(function(event){
				var datos = new Object();
				datos.usuario = $(".usuario").val();
				datos.local = $(".local").val();
				datos.producto1 = $(".producto1").val();
				if(datos.producto1 !=''){
					
					//alert(datos.producto1);
					$.ajax({
						type: "POST",
						url: "<?php echo $html->url('/',true);?>ventas/consulta/"+datos.producto1+"/"+datos.usuario+"/"+datos.local,
						data: datos,
						success: function(data){
							//alert("pro1"+data);
							if(data == 2){				
								$(".comprar1").hide();
								$(".denunciar1").hide();
								$(".cantt1").hide();
								$(".no_disponible1").show();
								//location.href=datos.url;
							}
							if(data == 3){				
								$(".comprar1").show();
							}
							if(data == 4){				
								$(".comprar1").hide();
								$(".cantt1").hide();
								$(".comprar_info1").show();
							}
						}
					});
				}
			});
			$('.espera2').show(function(event){
				var datos = new Object();
				datos.usuario = $(".usuario").val();
				datos.local = $(".local").val();
				datos.producto2 = $(".producto2").val();
				if(datos.producto2 !=''){
					
					//alert(datos.producto2);
					$.ajax({
						type: "POST",
						url: "<?php echo $html->url('/',true);?>ventas/consulta/"+datos.producto2+"/"+datos.usuario+"/"+datos.local,
						data: datos,
						success: function(data){
							//alert(data);
							if(data == 2){				
								$(".comprar2").hide();
								$(".denunciar2").hide();
								$(".cantt2").hide();
								$(".no_disponible2").show();
								//location.href=datos.url;
							}
							if(data == 3){				
								$(".comprar2").show();
							}
							if(data == 4){				
								$(".comprar2").hide();
								$(".cantt2").hide();
								$(".comprar_info2").show();
							}
						}
					});
				}
			});
			$('.espera3').show(function(event){
				var datos = new Object();
				datos.usuario = $(".usuario").val();
				datos.local = $(".local").val();
				datos.producto3 = $(".producto3").val();
				if(datos.producto3 !=''){
					
					//alert(datos.producto3);
					$.ajax({
						type: "POST",
						url: "<?php echo $html->url('/',true);?>ventas/consulta/"+datos.producto3+"/"+datos.usuario+"/"+datos.local,
						data: datos,
						success: function(data){
							//alert(data);
							if(data == 2){				
								$(".comprar3").hide();
								$(".denunciar3").hide();
								$(".cantt3").hide();
								$(".no_disponible3").show();
								//location.href=datos.url;
							}
							if(data == 3){				
								$(".comprar3").show();
							}
							if(data == 4){				
								$(".comprar3").hide();
								$(".cantt3").hide();
								$(".comprar_info3").show();
							}
						}
					});
				}
			});
			$('.espera_promo').show(function(event){
				var datos = new Object();
				datos.producto = $(".producto").val();
				datos.usuario = $(".usuario").val();
				datos.local = $(".local").val();
				//alert(datos.producto);
				if(datos.usuario !=''){
					$.ajax({
						type: "POST",
						url: "<?php echo $html->url('/',true);?>ventas/consulta_promocion/"+datos.producto+"/"+datos.usuario+"/"+datos.local,
						data: datos,
						success: function(data){
							//alert(data);
							if(data == 2){				
								$(".comprar").hide();
								$(".denunciar").hide();
								$(".no_disponible").show();
								//location.href=datos.url;
							}
							if(data == 3){				
								$(".comprar").show();
							}
							if(data == 4){				
								$(".comprar").hide();
								$(".cantt_promo").hide();
								$(".comprar_info_promo").show();
							}
						}
					});
				}
			});
			/*$('#comprar').click(function(event){
				var datos = new Object();
				datos.producto = $("#producto").val();
				datos.usuario = $("#usuario").val();
				datos.local = $("#local").val();
				datos.fecha = $("#fecha").val();
				datos.url = $("#url").val();
				datos.cantidad = $("#cantidad").val();
				datos.cuantos = $("#cuantos").val();
				alert(datos.usuario);
				$.ajax({
					type: "POST",
					url: "<?php echo $html->url('/',true);?>ventas/add/"+datos.producto+"/"+datos.usuario+"/"+datos.local+"/"+datos.cantidad+"/"+datos.cuantos,
					data: datos,
					success: function(data){
						//alert(data);
						if(data == 1){				
							$("#comprar").hide();
							$("#cantt").hide();
							$("#comprar_info").show();
							location.href=datos.url;
						}
					}
				});
			});*/
			$('.comprar1').click(function(event){
			//alert('entro aqui');
				var datos = new Object();
				datos.producto1 = $(".producto1").val();
				datos.usuario = $(".usuario").val();
				datos.local = $(".local").val();
				datos.fecha = $(".fecha").val();
				datos.url = $(".url").val();
				datos.cantidad1 = $(".cantidad1").val();
				datos.cuantos1 = $(".cuantos1").val();
				$.ajax({
					type: "POST",
					url: "<?php echo $html->url('/',true);?>ventas/add/"+datos.producto1+"/"+datos.usuario+"/"+datos.local+"/"+datos.cantidad1+"/"+datos.cuantos1,
					data: datos,
					success: function(data){
						//alert(data);
						if(data == 1){				
							$(".comprar1").hide();
							$(".cantt1").hide();
							$(".comprar_info1").show();
							
							//location.href=datos.url;
						}
					}
				});
			});

			$('.comprar2').click(function(event){
			//alert('entro aqui');
				var datos = new Object();
				datos.producto2 = $(".producto2").val();
				datos.usuario = $(".usuario").val();
				datos.local = $(".local").val();
				datos.fecha = $(".fecha").val();
				datos.url = $(".url").val();
				datos.cantidad2 = $(".cantidad2").val();
				datos.cuantos2 = $(".cuantos2").val();
				$.ajax({
					type: "POST",
					url: "<?php echo $html->url('/',true);?>ventas/add/"+datos.producto2+"/"+datos.usuario+"/"+datos.local+"/"+datos.cantidad2+"/"+datos.cuantos2,
					data: datos,
					success: function(data){
						//alert(data);
						if(data == 1){				
							$(".comprar2").hide();
							$(".cantt2").hide();
							$(".comprar_info2").show();
							
							//location.href=datos.url;
						}
					}
				});
			});
			$('.comprar3').click(function(event){
			//alert('entro aqui');
				var datos = new Object();
				datos.producto3 = $(".producto3").val();
				datos.usuario = $(".usuario").val();
				datos.local = $(".local").val();
				datos.fecha = $(".fecha").val();
				datos.url = $(".url").val();
				datos.cantidad3 = $(".cantidad3").val();
				datos.cuantos3 = $(".cuantos3").val();
				$.ajax({
					type: "POST",
					url: "<?php echo $html->url('/',true);?>ventas/add/"+datos.producto3+"/"+datos.usuario+"/"+datos.local+"/"+datos.cantidad3+"/"+datos.cuantos3,
					data: datos,
					success: function(data){
						//alert(data);
						if(data == 1){				
							$(".comprar3").hide();
							$(".cantt3").hide();
							$(".comprar_info3").show();
							
							//location.href=datos.url;
						}
					}
				});
			});
			$('#comprar_promo').click(function(event){
				var datos = new Object();
				datos.producto = $(".producto").val();
				datos.usuario = $(".usuario").val();
				datos.local = $(".local").val();
				datos.fecha = $(".fecha").val();
				datos.url = $(".url").val();
				datos.cantidad = $(".cantidad").val();
				datos.cuantos = $(".cuantos").val();
				//alert(datos.cuantos);
				$.ajax({
					type: "POST",
					url: "<?php echo $html->url('/',true);?>ventas/add_promo/"+datos.producto+"/"+datos.usuario+"/"+datos.local+"/"+datos.cantidad+"/"+datos.cuantos,
					data: datos,
					success: function(data){
						//alert(data);
						if(data == 1){				
							$(".comprar").hide();
							$(".cantt_promo").hide();
							$(".comprar_info_promo").show();
							//location.href=datos.url;
						}
					}
				});
			});
			$('.excel').click(function(event){
				var datos = new Object();
				datos.codigo = $(".cuantos").val();
				$(".excel>a").attr('href','<?php echo $html->url('/',true)?>ventas/pdf_completo_venta/'+datos.codigo);
				 return true;
			});
		});
</script>

<center><h2><font color="navy">Carrito de Compras</font></h2></center>
<!--.::GALERIA DE PRODUCTOS -->
<?php if(!empty($galerias)){?>
<center><br>
<table><tr>
<td>
<font color="black" face="arial" size="4"><b> | Resultados Galerias Encontradas | </b></font>
</td>
</tr></table>
<hr />
<table style="width:700px;margin-top:15px;">
<?php for ($i=0; $i<((count($galerias))); $i++) {  ?>
<tr>
<!-- PRIMERA FOTO -->
<td>
		<?php if(($i)<count($galerias)){ 
		?>
		<div style="width:190px;">
			<center><a href="<?php echo $html->url('/',true)?>pages/detallegaleria/<?php echo $galerias[$i][0]['fecha']."/".$galerias[$i]['Gallery']['url']; ?>" ><img src="<?php echo $html->url('/')?>files/galeria/thumbnails/<?php echo $galerias[$i]['Gallery']['thumbnails'];?>" style="margin-bottom:5px;height:100px;width:100px;" ></a></center>
			<br /><center>
			<font color="red">
				<b><?php echo $galerias[$i]['Gallery']['texto_galeria'];?><br/></b>
			</font>
			<font color="black">
				<b><?php echo $galerias[$i]['Gallery']['precio']." Bs.F";?></b>
			</font><br>
				<input type="hidden" class="usuario" id="usuario" name="usuario" value="<?php echo $this->Session->read('keyus'); ?>">
				<input type="hidden" class="producto1" id="producto1" name="producto1" value="<?php echo $galerias[$i]['Gallery']['id_galeria']; ?>">
				<input type="hidden" class="local" id="local" name="local" value="<?php echo $local; ?>">
				<input type="hidden" id="cuantos1" class="cuantos1" name="cuantos1" value="<?php echo $cuantos; ?>">
				<?php $fecha=date('d-m-Y');?>
				<input type="hidden" class="fecha" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
			    <div id="cantt1" class="cantt1">
					<font color="black">Cantidad: </font><input name="cantidad1" id="cantidad1" class="cantidad1" value="1" type="text" size="1" /><br>
					<a id="comprar1" href="#" class="comprar1"><img src="<?php echo $html->url('/',true)?>img/comprar.png" style="height:20px;" onmouseover="toolTip('Haz click para comprar producto',this)" /></a><br>
					
				</div>
				<div id="no_disponible1" class="no_disponible1" style="display:none;"><font color="red"><b>No Disponible</b></font></div>
				<div id="comprar_info1" class="comprar_info1" style="display:none;"><font color="navy"><b>Compra Exitosa</b></font></div>
			</center>
			<div id="espera1" class="espera1"></div>
		</div>
		<?php }else{  } ?>
</td>		
<!-- SEGUNDA FOTO -->
<td>
		<?php if(($i+1)<count($galerias)){ ?>
		<div style="width:190px;">
			<center><a href="<?php $i++; echo $html->url('/',true)?>pages/detallegaleria/<?php echo $galerias[$i][0]['fecha']."/".$galerias[$i]['Gallery']['url']; ?>" ><img src="<?php echo $html->url('/')?>files/galeria/thumbnails/<?php echo $galerias[$i]['Gallery']['thumbnails'];?>" style="margin-bottom:5px;height:100px;width:100px;" ></a></center>
			<br /><center>
			<font color="red">
				<b><?php echo $galerias[$i]['Gallery']['texto_galeria'];?><br/></b>
			</font>
			<font color="black">
				<b><?php echo $galerias[$i]['Gallery']['precio']." Bs.F";?></b>
			</font>
				<input type="hidden" class="usuario" id="usuario" name="usuario" value="<?php echo $this->Session->read('keyus'); ?>">
				<input type="hidden" class="producto2" id="producto2" name="producto2" value="<?php echo $galerias[$i]['Gallery']['id_galeria']; ?>">
				<input type="hidden" class="local" id="local" name="local" value="<?php echo $local; ?>">
				<input type="hidden" id="cuantos2" class="cuantos2" name="cuantos2" value="<?php echo $cuantos; ?>">
				<?php $fecha=date('d-m-Y');?>
				<input type="hidden" class="fecha" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
			    <div id="cantt2" class="cantt2">
					<font color="black">Cantidad: </font><input name="cantidad2" id="cantidad2" class="cantidad2" value="1" type="text" size="1" />
					<a id="comprar2" href="#" class="comprar2"><img src="<?php echo $html->url('/',true)?>img/comprar.png" style="height:20px;" onmouseover="toolTip('Haz click para comprar producto',this)" /></a>
				</div>
				<div id="no_disponible2" class="no_disponible2" style="display:none;"><font color="red"><b>No Disponible</b></font></div>
				<div id="comprar_info2" class="comprar_info2" style="display:none;"><font color="navy"><b>Compra Exitosa</b></font></div>
			
			</center>
			<div id="espera2" class="espera2"></div>
		</div>
		<?php }else{  } ?>
</td>		
<!-- TERCERA FOTO -->
<td>
		<?php if(($i+1)<count($galerias)){ ?>
		<div style="width:190px;">
			<center><a href="<?php $i++; echo $html->url('/',true)?>pages/detallegaleria/<?php echo $galerias[$i][0]['fecha']."/".$galerias[$i]['Gallery']['url']; ?>" ><img src="<?php echo $html->url('/')?>files/galeria/thumbnails/<?php echo $galerias[$i]['Gallery']['thumbnails'];?>" style="margin-bottom:5px;height:100px;width:100px;" ></a></center>
			<br /><center>
			<font color="red">
				<b><?php echo $galerias[$i]['Gallery']['texto_galeria'];?><br/></b>
			</font>
			<font color="black">
				<b><?php echo $galerias[$i]['Gallery']['precio']." Bs.F";?></b>
			</font>
				<input type="hidden" class="usuario" id="usuario" name="usuario" value="<?php echo $this->Session->read('keyus'); ?>">
				<input type="hidden" class="producto3" id="producto3" name="producto3" value="<?php echo $galerias[$i]['Gallery']['id_galeria']; ?>">
				<input type="hidden" class="local" id="local" name="local" value="<?php echo $local; ?>">
				<input type="hidden" id="cuantos3" class="cuantos3" name="cuantos3" value="<?php echo $cuantos; ?>">
				<?php $fecha=date('d-m-Y');?>
				<input type="hidden" class="fecha" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
			    <div id="cantt3" class="cantt3">
					<font color="black">Cantidad: </font><input name="cantidad3" id="cantidad3" class="cantidad3" value="1" type="text" size="1" />
					<a id="comprar3" href="#" class="comprar3"><img src="<?php echo $html->url('/',true)?>img/comprar.png" style="height:20px;" onmouseover="toolTip('Haz click para comprar producto',this)" /></a>
				</div>
				<div id="no_disponible3" class="no_disponible3" style="display:none;"><font color="red"><b>No Disponible</b></font></div>
				<div id="comprar_info3" class="comprar_info3" style="display:none;"><font color="navy"><b>Compra Exitosa</b></font></div>
			
			</center>
			<div id="espera3" class="espera3"></div>
		</div>
		<?php }else{  } ?>
</td>
</tr>
<?php }?>
</table>
</center>
<?php }?>

<!--.::PROMOCIONES DE PRODUCTOS -->
<?php 
//pr($promociones);
if(!empty($promociones)){?>
<center><br>
<table><tr>
<td>
<font color="black" face="arial" size="4"><b> | Resultados Promociones Encontradas | </b></font>
</td>
</tr></table>
<hr />
<table style="width:650px;margin-top:15px;">
<?php for ($i=0; $i<((count($promociones))); $i++) {  ?>
<tr >
<!-- PRIMERA FOTO -->
<td>
		<?php if(($i)<count($promociones)){ ?>
		<div style="width:190px;">
			<center><a href="<?php echo $html->url('/',true)?>pages/detallepublicidad/<?php echo $promociones[$i][0]['fecha']."/".$promociones[$i]['Promo']['url']; ?>" ><img src="<?php echo $html->url('/')?>files/promos/thumbnails/<?php echo $promociones[$i]['Promo']['thumbnails'];?>" style="margin-bottom:5px;height:100px;width:200px;" ></a></center>
			<br /><center>
			<font color="red">
				<b><?php echo $promociones[$i]['Promo']['texto_promo'];?><br/></b>
			</font>
			<font color="black">
			<b><?php echo $promociones[$i]['Promo']['precio']." Bs.F";?></b>
			</font>
				<input type="hidden" class="usuario" id="usuario" name="usuario" value="<?php echo $this->Session->read('keyus'); ?>">
				<input type="hidden" class="producto" id="producto" name="producto" value="<?php echo $promociones[$i]['Promo']['id_promo']; ?>">
				<input type="hidden" class="local" id="local" name="local" value="<?php echo $local; ?>">
				<input type="hidden" id="cuantos" class="cuantos" name="cuantos" value="<?php echo $cuantos; ?>">
				<?php $fecha=date('d-m-Y');?>
				<input type="hidden" class="fecha" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
			    <div id="cantt_promo" class="cantt_promo">
					<font color="black">Cantidad: </font><input name="cantidad" id="cantidad" class="cantidad" value="1" type="text" size="1" />
					<a id="comprar_promo" class="comprar_promo" href="#"><img src="<?php echo $html->url('/',true)?>img/comprar.png" style="height:20px;" onmouseover="toolTip('Haz click para comprar producto',this)" /></a>
				</div>
				<div id="comprar_info_promo" class="comprar_info_promo" style="display:none;"><font color="navy"><b>Compra Exitosa</b></font></div>
			
			</center>
			<div id="espera_promo" class="espera_promo"></div>
		</div>
		<?php }else{  } ?>
</td>		
<!-- SEGUNDA FOTO -->
<td>
		<?php if(($i+1)<count($promociones)){ ?>
		<div style="width:190px;">
			<center><a href="<?php $i++; echo $html->url('/',true)?>pages/detallepublicidad/<?php echo $promociones[$i][0]['fecha']."/".$promociones[$i]['Promo']['url']; ?>" ><img src="<?php echo $html->url('/')?>files/promos/thumbnails/<?php echo $promociones[$i]['Promo']['thumbnails'];?>" style="margin-bottom:5px;height:100px;width:200px;" ></a></center>
			<br /><center>
			<font color="red">
				<b><?php echo $promociones[$i]['Promo']['texto_promo'];?><br/></b>
			</font>
			<font color="black">
			<b><?php echo $promociones[$i]['Promo']['precio']." Bs.F";?></b>
			</font>
				<input type="hidden" class="usuario" id="usuario" name="usuario" value="<?php echo $this->Session->read('keyus'); ?>">
				<input type="hidden" class="producto" id="producto" name="producto" value="<?php echo $promociones[$i]['Promo']['id_promo']; ?>">
				<input type="hidden" class="local" id="local" name="local" value="<?php echo $local; ?>">
				<input type="hidden" id="cuantos" class="cuantos" name="cuantos" value="<?php echo $cuantos; ?>">
				<?php $fecha=date('d-m-Y');?>
				<input type="hidden" class="fecha" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
			    <div id="cantt_promo" class="cantt_promo">
					<font color="black">Cantidad: </font><input name="cantidad" id="cantidad" class="cantidad" value="1" type="text" size="1" />
					<a id="comprar_promo" class="comprar_promo" href="#"><img src="<?php echo $html->url('/',true)?>img/comprar.png" style="height:20px;" onmouseover="toolTip('Haz click para comprar producto',this)" /></a>
				</div>
				<div id="comprar_info_promo" class="comprar_info_promo" style="display:none;"><font color="navy"><b>Compra Exitosa</b></font></div>
			
			</center>
			<div id="espera_promo" class="espera_promo"></div>
		</div>
		<?php }else{  } ?>
</td>		
</tr>
<?php }?>
</table>

<!--
<input type="hidden" id="cuantos" class="cuantos" name="cuantos" value="<?php echo $cuantos; ?>">
<div class="excel"  align="center"><a><img src="<?php echo $html->url('/',true)?>/img/reporte_general_venta.png"></a></div>
-->
</center>
<?php }?>