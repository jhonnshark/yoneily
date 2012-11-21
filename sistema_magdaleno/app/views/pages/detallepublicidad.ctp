<script type="text/javascript">
      $('document').ready(function(){
	  $("#carrito").hide();
	  $(".excel").hide();
		    $('#espera').show(function(event){
				var datos = new Object();
				datos.producto = $("#producto").val();
				datos.usuario = $("#usuario").val();
				datos.local = $("#local").val();
				datos.url = $("#url").val();
				/*alert(datos.producto);
				alert(datos.usuario);
				alert(datos.local);*/
				//alert(datos.url);
				if(datos.usuario !=''){
				$.ajax({
						type: "POST",
						url :'<?php echo $html->url('/',true)?>ventas/cuantos/',
						success: function(data){
							var cuanto=data;
							//alert(cuanto);
							$("#cuantos").val(cuanto);
						}
					});
					$.ajax({
						type: "POST",
						url: "<?php echo $html->url('/',true);?>ventas/consulta_promocion/"+datos.producto+"/"+datos.usuario+"/"+datos.local,
						data: datos,
						success: function(data){
							//alert(data);
							if(data == 2){				
								$("#comprar").hide();
								$("#denunciar").hide();
								$("#cantt").hide();
								$("#no_disponible").show();
								//location.href=datos.url;
							}
							if(data == 3){				
								$("#comprar").show();
								$("#denunciar").show();
							}
							if(data == 4){				
								$("#comprar").hide();
								$("#cantt").hide();
								$("#carrito").show();
								$(".excel").show();
								$("#comprar_progreso").show();
								$("#cuantos").val(cuanto);
							}
						}
					});
				}
			});
			$("#iniciarsesion").click(function(){
                 var url = '<?php echo $html->url('/',true)?>registers/loginequi/';
				 //alert('entro aqui');
				 //alert(url);
                 var d = $('#dialog-modal').html('<iframe width="640" height="520" id="ifrm"></iframe>');
				 //alert(d);
                $("#dialog-modal>#ifrm").attr("src", url);
                var $width = 681;
                var $height = 600;
                var horizontalPadding = 50;
                var verticalPadding = 5;
                $( "#dialog:ui-dialog2" ).dialog("destroy");
				d.dialog({
                    dialogClass: "centrar",
                    autoOpen: true,
                    width: $width,
                    height: $height,
                    modal: true
                });
                $('.centrar.ui-dialog').css({
                    left:"19%",
                    top:'8%'
                });
			});
			$('#comprar').click(function(event){
				var datos = new Object();
				datos.producto = $("#producto").val();
				datos.usuario = $("#usuario").val();
				datos.local = $("#local").val();
				datos.fecha = $("#fecha").val();
				datos.url = $("#url").val();
				datos.cantidad = $("#cantidad").val();
				datos.cuantos = $("#cuantos").val();
				/*alert(datos.producto);
				alert(datos.usuario);
				alert(datos.local);*/
				$.ajax({
					type: "POST",
					url: "<?php echo $html->url('/',true);?>ventas/add_promo/"+datos.producto+"/"+datos.usuario+"/"+datos.local+"/"+datos.cantidad+"/"+datos.cuantos,
					data: datos,
					success: function(data){
						//alert(data);
						if(data == 1){				
							$("#comprar").hide();
							$("#cantt").hide();
							$("#comprar_info").show();
							$("#excel").show();
							location.href=datos.url;
						}
					}
				});
			});
			$("#denunciar").click(function(){
				var datos = new Object();
				datos.producto = $("#producto").val();
				datos.usuario = $("#usuario").val();
				datos.local = $("#local").val();
				
                 var url = '<?php echo $html->url('/',true)?>ventas/denunciar_promo/'+datos.producto+"/"+datos.usuario+"/"+datos.local;
				 //alert('entro aqui');
				 //alert(url);
                 var d = $('#dialog-modal').html('<iframe width="640" height="520" id="ifrm"></iframe>');
				 //alert(d);
                $("#dialog-modal>#ifrm").attr("src", url);
                var $width = 681;
                var $height = 500;
                var horizontalPadding = 50;
                var verticalPadding = 5;
                $( "#dialog:ui-dialog2" ).dialog("destroy");
				d.dialog({
                    dialogClass: "centrar",
                    autoOpen: true,
                    width: $width,
                    height: $height,
                    modal: true
                });
                $('.centrar.ui-dialog').css({
                    left:"19%",
                    top:'8%'
                });
			});
			$("#preguntas").show(function(){
				var datos = new Object();
				datos.producto = $("#producto").val();
				datos.usuario = $("#usuario").val();
			$.ajax({
                type: "POST",
                url: "<?php echo $html->url('/',true)?>pages/info_promo/"+datos.producto+"/"+datos.usuario,
                success: function(data){
				//alert(data);
					if(data!=0){
					
						var url = '<?php echo $html->url('/',true)?>pages/info_promo/'+datos.producto+"/"+datos.usuario;
						var d = $('#preguntas').html('<iframe width="656" height="auto" id="ifrm" ></iframe>');
						$("#preguntas>#ifrm").attr("src", url);
					}else{
						$("#preguntas").hide();
					}
                }
            });
        });
		$("#carrito").click(function(){
				/*var datos = new Object();
				datos.usuario = $("#usuario").val();
				datos.local = $("#local").val();
				datos.cuantos = $("#cuantos").val();
				//alert(datos.usuario);
                 var url = '<?php echo $html->url('/',true)?>ventas/carrito/'+datos.local+"/"+datos.usuario+"/"+datos.cuantos;
				 //alert('entro aqui');
				 //alert(url);
                 var d = $('#dialog-modal').html('<iframe width="640" height="520" id="ifrm"></iframe>');
				 //alert(d);
                $("#dialog-modal>#ifrm").attr("src", url);
                var $width = 701;
                var $height = 500;
                var horizontalPadding = 50;
                var verticalPadding = 5;
                $( "#dialog:ui-dialog2" ).dialog("destroy");
				d.dialog({
                    dialogClass: "centrar",
                    autoOpen: true,
                    width: $width,
                    height: $height,
                    modal: true
                });
                $('.centrar.ui-dialog').css({
                    left:"19%",
                    top:'8%'
                });*/
				location.href="../../productos/";
			});
			$('.excel').click(function(event){
				var datos = new Object();
				//datos.codigo = $(".cuantos").val();
				//alert(datos.codigo);
				datos.usuario = $("#usuario").val();
				$(".excel>a").attr('href','<?php echo $html->url('/',true)?>ventas/pdf_completo_venta/'+datos.usuario);//+"/"+datos.codigo);
				 return true;
			});
		});
</script>
	<?php //pr($promos);?>
	 <!-- #gallery -->
	<div style="margin-top:30%;margin-left:;background-color:#ffffff; width:96%;">
		<table align="right" style="margin-right:20px;"><tr><td><fieldset class="puntuacion" style="width:100%;" ><img src="<?php echo $html->url('/',true)?>files/locales/thumbnails/<?php echo $promos[0]['Locale']['nombre_file'];?>" style="height:30px;" /><font color="red" size="5"> <?php echo $promos[0]['Locale']['nombre_empresa'];?></font></fieldset></td>
		<td align="center"><fieldset class="puntuacion" style="width:100%;"><font color="navy" size="5">Cant. Disponible:</font> <font color="black" size="5"><?php echo $promos[0]['Promo']['cantidad_existente'];?></font></fieldset></td>
		</tr></table>
		<br /><br /><br /><br /><center><h2><font color="black"><?php echo $promos[0]['Promo']['texto_promo'];?></font></h2>
		<img style="border:4px solid grey;width:742px;height:280px;" src="<?php echo $html->url('/',true)?>files/promos/slider/<?php echo $promos[0]['Promo']['thumbnails'];?>"  /></center>
		<br>
		<center>
			<fieldset class="puntuacion">
			<table><tr>
				<td align="center"><font color="red" size="5"> <?php echo $promos[0]['Promo']['precio'].'</font><font color="black" size="5"> BsF.';?></font></td>
				<!--INICIO DE REPUTACION -->
				<?php if($promos[0]['Promo']['prod_vendidos'] <=5){;?>
				<td align="center" style="border-left: 1px solid grey;"><font color="navy" size="5"> Reputaci&oacute;n: <img src="<?php echo $html->url('/',true)?>puntuacion/SIGNAL0.png" style="height:30px;" /></font></td>
				<?php }?>
				<?php if($promos[0]['Promo']['prod_vendidos'] >5 and $promos[0]['Promo']['prod_vendidos'] <=10){;?>
				<td align="center" style="border-left: 1px solid grey;"><font color="navy" size="5"> Reputaci&oacute;n: <img src="<?php echo $html->url('/',true)?>puntuacion/SIGNAL1.png" style="height:30px;" /></font></td>
				<?php }?>
				<?php if($promos[0]['Promo']['prod_vendidos'] >10 and $promos[0]['Promo']['prod_vendidos'] <=15){;?>
				<td align="center" style="border-left: 1px solid grey;"><font color="navy" size="5"> Reputaci&oacute;n: <img src="<?php echo $html->url('/',true)?>puntuacion/SIGNAL2.png" style="height:30px;" /></font></td>
				<?php }?>
				<?php if($promos[0]['Promo']['prod_vendidos'] >15 and $promos[0]['Promo']['prod_vendidos'] <=25){;?>
				<td align="center" style="border-left: 1px solid grey;"><font color="navy" size="5"> Reputaci&oacute;n: <img src="<?php echo $html->url('/',true)?>puntuacion/SIGNAL3.png" style="height:30px;" /></font></td>
				<?php }?>
				<?php if($promos[0]['Promo']['prod_vendidos'] >25 and $promos[0]['Promo']['prod_vendidos'] <=45){;?>
				<td align="center" style="border-left: 1px solid grey;"><font color="navy" size="5"> Reputaci&oacute;n: <img src="<?php echo $html->url('/',true)?>puntuacion/SIGNAL4.png" style="height:30px;" /></font></td>
				<?php }?>
				<?php if($promos[0]['Promo']['prod_vendidos'] >45){;?>
				<td align="center" style="border-left: 1px solid grey;"><font color="navy" size="5"> Reputaci&oacute;n: <img src="<?php echo $html->url('/',true)?>puntuacion/SIGNAL5.png" style="height:30px;" /></font></td>
				<?php }?>
				<!--FIN DE REPUTACION -->
				<td align="center" style="border-left: 1px solid grey;"><font color="navy" size="5"> Vendidos:</font> <font color="black" size="5"><?php echo $promos[0]['Promo']['prod_vendidos'];?></font></td>
			</tr></table>
		</fieldset>
			<span id="toolTipBox"> </span>
			<center><br>
			<?php if($this->Session->check('nombreusuario') && $this->Session->check('keyus')){?>
				<input type="hidden" id="usuario" name="usuario" value="<?php echo $this->Session->read('keyus'); ?>">
				<input type="hidden" id="producto" name="producto" value="<?php echo $promos[0]['Promo']['id_promo']; ?>">
				<input type="hidden" id="local" name="local" value="<?php echo $promos[0]['Locale']['id_local']; ?>">
				<input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
				<input type="hidden" id="url" name="url" value="<?php echo $url; ?>">
				<input type="hidden" id="cuantos" class="cuantos" name="cuantos" >
			<table><tr>
				<td id="cantt">
					<font color="black">Cantidad: </font><input name="cantidad" id="cantidad" type="text" size="3" />
				</td>
				<td>
					<a id="comprar" href="#" style="display:none;"><img src="<?php echo $html->url('/',true)?>img/comprar.png" style="height:40px;" onmouseover="toolTip('Haz click para comprar producto',this)" /></a>
					<div id="comprar_info" style="display:none;"><font color="navy"><b>Compra Exitosa</b></font></div>
				</td>
				<!--<td>
					<a id="denunciar" href="#"><img src="<?php echo $html->url('/',true)?>img/denunciar.png" style="height:40px;" onmouseover="toolTip('Haz click para denunciar venta',this)" /></a>
				</td>-->
				<td style="padding-right:10px;">
					<a id="carrito" class="carrito" href="#"><img src="<?php echo $html->url('/',true)?>img/carrito.png" style="height:40px;" onmouseover="toolTip('Haz click para denunciar venta',this)" /></a>
				</td>
				<td>
					<div class="excel"  align="center" ><a><img src="<?php echo $html->url('/',true)?>/img/reporte_general_venta.png" style="height:40px;" onmouseover="toolTip('Reporte de Compra',this)"></a></div><br/>
				</td>
			</tr></table>
			
			<?php }else{?>
				<a id="iniciarsesion" href="#"><img src="<?php echo $html->url('/',true)?>img/comprar.png" style="height:40px;" onmouseover="toolTip('Debes iniciar sesion para realizar compra',this)" /></a>
			<?php }?>
			<input type="hidden" id="usuario" name="usuario" value="<?php echo $this->Session->read('keyus'); ?>">
			<div id="no_disponible" style="display:none;"><font color="navy"><b><h2>Producto no disponible. Fuera de Existencia</h2></b></font></div>
			<div id="comprar_progreso" style="display:none;"><font color="red"><b><h3>Comprar en Progreso Debes Contactar al Vendedor.  Para Finalizar esta compra
			haz click en <a href="<?php echo $html->url('/',true)?>ventas/miscompras">aqu&iacute;</a> o ingresando a Mis Compras. Para ver medios de pago, debes verificar en la pesta&ntilde;a inferior. </h3></b></font></div>
			<div id="espera"></div>
			</center>
		</center><br>
	</div>
  <?php //pr($promos);?>
<div class="demo" style="width:770px;">

<div id="accordion">
	<h3><a href="#section1">Descripci&oacute;n Producto Publicitario</a></h3>
	<div>
		<p><?php echo $promos[0]['Promo']['descripcion'];?>.</p>
	</div>
	<h3><a href="#section1">Medios de Pago</a></h3>
	<div>
	<table><tr>
	<td>
		<p><font color="navy"><b>Rif:</b></font> <?php echo $promos[0]['Locale']['rif'];?>.</p>
		<p><font color="navy"><b>Nombre del Local:</b></font> <?php echo $promos[0]['Locale']['nombre_empresa'];?>.</p>
		<p><font color="navy"><b>Tel&eacute;fonos:</b></font> <?php echo $promos[0]['Locale']['telefono_cel'].' / '.$promos[0]['Locale']['telefono_office'];?>.</p>
		<p><font color="navy"><b>Email:</b></font> <?php echo $promos[0]['Locale']['correo'];?>.</p>
	</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>
		<p><font color="navy"><b>Primer N&uacute;mero de Cuenta:</b></font> <b><?php echo $promos[0]['Locale']['n_cuenta_uno'].'</b> '.$promos[0]['Locale']['descripcion_n_cuenta_uno'];?>.</p>
		<p><font color="navy"><b>Segundo N&uacute;mero de Cuenta:</b></font> <b><?php echo $promos[0]['Locale']['n_cuenta_dos'].'</b> '.$promos[0]['Locale']['descripcion_n_cuenta_dos'];?>.</p>
		<p><font color="navy"><b>Encargado:</b></font> <?php echo $promos[0]['Locale']['encargado_nombre'].' '.$promos[0]['Locale']['encargado_apellido'];?>.</p>
	</td>
	</tr></table>
		<center>
			<table><tr>
				<?php if($promos[0]['Locale']['banco_cuenta_uno'] =='Mercantil' or $promos[0]['Locale']['banco_cuenta_dos'] =='Mercantil'){?>
				<td><img src="<?php echo $html->url('/',true)?>img/mercantil.png" style="height:50px;width:200px;border:1px solid red;" /></td>
				<?php }?>
				<?php if($promos[0]['Locale']['banco_cuenta_uno'] =='Venezuela' or $promos[0]['Locale']['banco_cuenta_dos'] =='Venezuela'){?>
				<td><img src="<?php echo $html->url('/',true)?>img/b_venezuela.png" style="height:50px;width:200px;border:1px solid blue;" /></td>
				<?php }?>
				<?php if($promos[0]['Locale']['banco_cuenta_uno'] =='Banesco' or $promos[0]['Locale']['banco_cuenta_dos'] =='Banesco'){?>
				<td><img src="<?php echo $html->url('/',true)?>img/banesco.png" style="height:50px;width:200px;border:1px solid green;" /></td>
				<?php }?>
				
				<?php if($promos[0]['Locale']['banco_cuenta_uno'] =='Bicentenario' or $promos[0]['Locale']['banco_cuenta_dos'] =='Bicentenario'){?>
				<td><img src="<?php echo $html->url('/',true)?>img/bicentenario.png" style="height:50px;width:200px;border:1px solid red;" /></td>
				<?php }?>
				<?php if($promos[0]['Locale']['banco_cuenta_uno'] =='Caroni' or $promos[0]['Locale']['banco_cuenta_dos'] =='Caroni'){?>
				<td><img src="<?php echo $html->url('/',true)?>img/caroni.png" style="height:50px;width:200px;border:1px solid blue;" /></td>
				<?php }?>
				<?php if($promos[0]['Locale']['banco_cuenta_uno'] =='Caribe' or $promos[0]['Locale']['banco_cuenta_dos'] =='Caribe'){?>
				<td><img src="<?php echo $html->url('/',true)?>img/caribe.png" style="height:50px;width:200px;border:1px solid green;" /></td>
				<?php }?>
				<?php if($promos[0]['Locale']['efectivo'] ==1){?>
					<td><img src="<?php echo $html->url('/',true)?>img/efectivo.png" style="height:50px;width:150px;border:1px solid pink;" /></td>
				<?php }?>
			</tr></table>
			<?php if($promos[0]['Locale']['tarjeta'] ==1){?>
				<center><img src="<?php echo $html->url('/',true)?>img/tarjeta.png" style="height:150px;width:200px;border:0px solid green;" /><br> <b> Tenemos Punto de Venta</b></center>
			<?php }?>
						
		</center>
	</div>
	
	<h3><a href="#section1">Ubicaci&oacute;n Geogr&aacute;fica</a></h3>
	<div>
		<p><?php echo $promos[0]['Locale']['direccion'];?>.</p>
		<center>
			<?php if(!empty($promos[0]['Locale']['ubicacion_file'])){?>
				<img src="<?php echo $html->url('/',true)?>files/locales/slider/<?php echo $promos[0]['Locale']['ubicacion_file'];?>" style="height:400px;width:400px;border:3px solid black;" />
			<?php }else{?>
				<img src="<?php echo $html->url('/',true)?>images/sin_mapa.png" style="height:400px;width:400px;border:3px solid black;" />
			<?php }?>
		</center>
	</div>
	<h3><a href="#section1">Medios de Envio</a></h3>
	<div>
		<center>
			<table ><tr>
				<?php if($promos[0]['Locale']['envio_uno'] =='mrw' or $promos[0]['Locale']['envio_dos'] =='mrw' or $promos[0]['Locale']['envio_tres'] =='mrw'){?>
				<td><img src="<?php echo $html->url('/',true)?>img/mrw.png" style="height:50px;width:200px;border:1px solid red;" /></td>
				<?php }?>
				<?php if($promos[0]['Locale']['envio_uno'] =='zoom' or $promos[0]['Locale']['envio_dos'] =='zoom' or $promos[0]['Locale']['envio_tres'] =='zoom'){?>
				<td><img src="<?php echo $html->url('/',true)?>img/zoom.png" style="height:50px;width:130px;border:1px solid blue;" /></td>
				<?php }?>
				<?php if($promos[0]['Locale']['envio_uno'] =='domesa' or $promos[0]['Locale']['envio_dos'] =='domesa' or $promos[0]['Locale']['envio_tres'] =='domesa'){?>
				<td><img src="<?php echo $html->url('/',true)?>img/domesa.png" style="height:50px;width:200px;border:1px solid pink;" /></td>
				<?php }?>
				<?php if($promos[0]['Locale']['envio_uno'] =='cooperativa' or $promos[0]['Locale']['envio_dos'] =='cooperativa' or $promos[0]['Locale']['envio_tres'] =='cooperativa'){?>
				<td><img src="<?php echo $html->url('/',true)?>img/cooperativa.png" style="height:50px;width:200px;border:1px solid pink;" /></td>
				<?php }?>
				<?php if($promos[0]['Locale']['envio_uno'] =='0' and $promos[0]['Locale']['envio_dos'] =='0' and $promos[0]['Locale']['envio_tres'] =='0'){?>
				<td><img src="<?php echo $html->url('/',true)?>img/ninguno.png" style="height:50px;width:400px;border:1px solid pink;" /></td>
				<?php }?>
			</tr></table>
		</center>
	</div>
	<h3><a href="#section1">Responsabilidad</a></h3>
	<div>
		<p align="justify"><b>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Muebleria de Magdaleno no asume ninguna responsabilidad 
		por la informaci&oacute;n contenida en este anuncio publicitario, ya que ha sido suministrada en 
		su totalidad por el usuario aqu&iacute; identificado. Muebleria de Magdaleno no es el propietario 
		ni vende los art&iacute;culos aqu&iacute; ofrecidos y no participa en ninguna negociaci&oacute;n, 
		venta o perfeccionamiento de operaciones, sino que s&oacute;lo se limita a la publicaci&oacute;n 
		y/o alojamiento de anuncios de sus usuarios. Muebleria de Magdaleno no asume responsabilidad 
		por da&ntilde;os o perjuicios que pudiere sufrir el usuario o visitante por operaciones 
		sobre anuncios publicados en el sitio.
		</b></p>
	</div>
	<?php 
	$usuario=$this->Session->read('keyus');
	if(!empty($usuario)){ ?>
	<h3><a href="#section1">Preguntas</a></h3>
	<div>
		<center><div id="preguntas" style="display:none;margin-top:10px;"></div></center>
		<fieldset class="contactos" style="margin-left:0px;width:700px;">
		<?php echo $form->create('Page',array('controller'=>'pages','action'=>'registro_pregunta'));?>

		<?php
			echo $this->Form->input('usuario',array("label"=>false, "value"=>$this->Session->read('keyus'), "type"=>"hidden"));
			echo $this->Form->input('producto',array("label"=>false, "value"=>$promos[0]['Promo']['id_promo'], "type"=>"hidden"));
			echo $this->Form->input('local',array("label"=>false, "value"=>$promos[0]['Locale']['id_local'], "type"=>"hidden"));
			echo $this->Form->input('fecha1',array("label"=>false, "value"=>"$fecha", "type"=>"hidden"));
			echo $this->Form->input('url',array("label"=>false, "value"=>"$url", "type"=>"hidden"));
		?>
		<table>
           <tr>
                <td ><font color="navy" size="3"><b>Pregunta:</b></font></td>
                <td><font color="red"><?php echo $this->Form->input('comentario', array("label" => false, "size" => "80")); ?></font></td>
			<?php $fecha1= date("d-m-Y H:i:s");
			echo $this->Form->input('fecha',array("label"=>false, "value"=>"$fecha1", "type"=>"hidden"));
			?>
                <td><?php echo $this->Form->submit('Registrar'); ?></td>
            </tr>

            </table>
			</fieldset>
	</div>
	<?php }?>
</div><br>

</div><!-- End demo -->
  <!-- /#gallery -->
