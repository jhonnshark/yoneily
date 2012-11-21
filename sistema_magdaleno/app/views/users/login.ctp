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
                 var d = $('#dialog-modal').html('<iframe width="465" height="435" id="ifrm"></iframe>');
				 //alert(d);
                $("#dialog-modal>#ifrm").attr("src", url);
                var $width = 500;
                var $height = 490;
                var horizontalPadding = 50;
                var verticalPadding = 5;
                $( "#dialog:ui-dialog2" ).dialog("destroy");
				d.dialog({
                    dialogClass: "center",
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
<center><img src="<?php echo $html->url('/',true)?>/img/userweb.png" style="height:190px;" /><br/>
</center>

<?php
    echo $this->Form->create('User', array('action'=>'login'));
    echo "<center><table><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Usuario:<b></td><td>".$this->Form->input('username', array('label' => false,'required' => 'required'))."</td></tr>";
    echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> Contrase&ntilde;a: </b></td><td>".$this->Form->input('password', array('required' => 'required','label' =>false,'type'=>'password'))."</td></tr></center>";
	echo '<tr><td colspan="2"><center>'.$form->end('Entrar').'</center></td></tr></table>';
	
?>
</center>
<div class="z0">
	<div style="margin-top:50px;" id="vende" class="T-I J-J5-Ji T-I-KE">
		<div id="registrarse"><b>Validar registro de local</b></div>
	</div>
</div>
<div id="dialog-modal" title="Bienvenido" style="display:none;">
		
</div>
<br>
