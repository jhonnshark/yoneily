<script type="text/javascript">
    $('document').ready(function(){
		$("#buscar_seleccion").change(function(event){
			//alert('hola');
            var a = $('#buscar_seleccion').attr("value");
			
			if(a=='1'){
				$("#vendedor").hide();
				$("#administrador").show();
			}
			if(a=='2'){
				$("#administrador").hide();
				$("#vendedor").show();
			}
			if(a==''){
				$("#vendedor").hide();
				$("#administrador").hide();
			}
		});

		$("#registrarse").click(function(){
				var datos = new Object();
                 var url = '<?php echo $html->url('/',true)?>users/add_vendedor/';
				 //alert('entro aqui');
				 //alert(url);
                 var d = $('#dialog-modal').html('<iframe width="460" height="520" id="ifrm"></iframe>');
				 //alert(d);
                $("#dialog-modal>#ifrm").attr("src", url);
                var $width = 501;
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
	});

</script>

<center>
<center><img src="<?php echo $html->url('/',true)?>/img/user.png" style="height:190px;" /><br/>
</center>

<?php
	/*echo "<table><tr><th>Tipo de Usuario:</th><td><center>".$form->input('tipo_user',array('label'=>false,'id'=>'buscar_seleccion','options'=>array(
      '1'=>'Administrador',
	  '2'=>'Vendedor'
	   ),'empty'=>'Seleccione Usuario'
       ))."</center></td></tr></table>";
	*/
	//echo "<div id='administrador' style='display:none;'>";
    echo $this->Form->create('User', array('action'=>'login'));
    echo "<center><table><tr><td><img src='". $html->url('/',true)."img/usuario.gif' ><b> Usuario: </b></td><td>".$this->Form->input('username', array('label' => false))."</td></tr>";
    echo "<tr><td><img src='". $html->url('/',true)."img/clave.gif' ><b> Contrase&ntilde;a: </b></td><td>".$this->Form->input('password', array('label' =>false,'type'=>'password'))."</td></tr></table></center>";
	echo '<center>'.$form->end('Entrar').'</center>';
	//echo "</div>";
	/*
	echo "<div id='vendedor' style='display:none;'>";
    echo $this->Form->create('Locale',array('controller'=>'locales','action'=>'acceso'));
    echo "<center><table><tr><td><img src='". $html->url('/',true)."img/usuario.gif' ><b> Usuario Vendedor: </b></td><td>".$this->Form->input('username', array('label' => false))."</td></tr>";
    echo "<tr><td><img src='". $html->url('/',true)."img/clave.gif' ><b> Contrase&ntilde;a: </b></td><td>".$this->Form->input('password', array('label' =>false,'type'=>'password'))."</td></tr></table></center>";
	echo '<center>'.$form->end('Entrar').'</center>';
	echo "</div>";
	*/
?>
</center>
<div style="margin-top:50px;" id="vende">
<a href="#" id="registrarse"><h3><font>Validar registro de local</font></h3></a>
</div>
<div id="dialog-modal" title="Bienvenido" style="display:none;">
		
</div>