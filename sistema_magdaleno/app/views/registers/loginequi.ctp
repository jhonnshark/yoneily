<script type="text/javascript">
	function direccionar(){
     parent.window.location = "<?php echo $html->url('/');?>pages/home";
	}
	function recargar(){
     location.reload();

	}
	
    $('document').ready(function(){
	$("#respuesta").hide();
	$("#sesion").show();
		$(".botonlog").click(function(){
			$("#sesion").hide();
            $("#cargador").css('display','inline');
             var email = $('input.email').val();
             var pass = $("input.password").val();
             var dataString = '&ema=' + email + '&pass=' + pass;
			 //alert(email);
             $("#cuadroface").css('display','none');
             $("#cuadrologin").css('display','none');
              $.ajax({
               type: "POST",
               url: "<?php echo $html->url('/',true);?>registers/acceso/"+email+"/"+pass,
               data: dataString,
               dataType: "html",
               success: function(msg){
                 // alert(msg);
                 $("#cargador").css('display','none');
                 if(msg == 1){
					$("#respuesta").show();
                     $("#respuesta").html("Bienvenido a Muebleria Magdaleno");
                     direccionar();
                     //setTimeout('direccionar()',0*1000);
                 }else{
					$("#respuesta").show();
                     $("#respuesta").html("El usuario no existe en la base de datos");
                     recargar();
                     //setTimeout('recargar()',0*1000);
                 }

                 
                 //$("#respuesta").html(msg);
                 //alert("complete"+msg);
                 //parent.window.location = "<?php //echo $html->url('/');?>pages/home";
                 /**/

            }
             });
             return false;
        });
		
		
    });
</script>
<br><br>
<div style="margin-left:100px;">
<center><img src="<?php echo $html->url('/',true)?>/img/user.png" style="height:110px;" /><br/>
<h2>Iniciar Sesi&oacute;n</h2>
</center>
<div id="cargador" style="display:none;">
    <img src="<?php echo $html->url('/')?>img/loader.gif">
</div>
<b><font color="black"><div id="respuesta" style="margin-left:80px;border:1px navy solid;width:250px;">
    
</div></font></b>
<br>
<center>
<fieldset id="sesion" style="margin-left:75px;margin-top:-20px;border:0px;width:350px;">
<?php
echo $form->create('Register');//, array('url' => array('controller' => 'registers', 'action' =>'acceso')
echo "<table style='margin-top:-10px;'><tr >";
echo "<td><b>Correo: </b></td><td><b><font color=navy>".$form->input('email', array('label' => false, "class" => "email"))."</font></b></td></tr>";
echo "<tr><td><b>Clave: </b></td><td><b><font color=navy>".$form->input('password', array('label' => false, "class" => "password"))."</font></b></td>";
echo "</tr></table>";
//echo $form->end('Ingresar');
?>
<?php echo "<center>".$form->submit('Aceptar',array('class' => 'botonlog', 'title' => 'Custom Title'))."</center>"; ?>
</fieldset>
<?php echo $html->link('<img src="'.$html->url('/',true).'procesos/add.png">' . __(' Registrate', true), array('plugin' => 0, 'controller' => 'registers', 'action' => 'add'), array('class' => 'separator', 'escape' => false)); ?>
</center>
</div>
