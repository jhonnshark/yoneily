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
<style type="text/css">
input, select {
    background-color: #FFFFFF;
    border: 1px solid #CCCCCC;
    border-radius: 3px 3px 3px 3px;
    display: inline-block;
    margin: 0;
    outline: medium none;
    padding: 4px;
    width: 200px;
}
input:focus, textarea:focus {
    border-color: #56B4EF;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05) inset, 0 0 8px rgba(82, 168, 236, 0.6);
    color: #333333;
    outline: 0 none;
}
input[type="file"] {
    background-color: #FFFFFF;
    box-shadow: none;
}
input[type="button"], input[type="reset"], input[type="submit"] {
    height: auto;
    width: auto;
}

form input[type="submit"] {
    background: -moz-linear-gradient(center top , #79BBFF 5%, #378DE5 100%) repeat scroll 0 0 #79BBFF;
    border: 1px solid #84BBF3;
    border-radius: 6px 6px 6px 6px;
    box-shadow: 0 1px 0 0 #BBDAF7;
    color: #FFFFFF;
    display: inline-block;
    font-family: arial;
    font-size: 15px;
    font-weight: bold;
    padding: 6px 39px;
    text-decoration: none;
    text-shadow: 1px 1px 14px #528ECC;
}
a {color: #000;}
</style>
<br><br>
<div style="margin-left:180px;font-family: Arial,Helvetica,sans-serif;">
<center><img src="<?php echo $html->url('/',true)?>/images/login_icon.jpg" style="height:110px;" /><br/>
<h2>Iniciar Sesi&oacute;n</h2>
</center>
<div id="cargador" style="display:none;">
    <img src="<?php echo $html->url('/')?>img/loader.gif">
</div>
<b><font color="black"><div id="respuesta" style="background-color:#eeeeee;border:2px navy solid;border-radius:7px; width:250px;">
    
</div></font></b>
<br>
<center>
<fieldset id="sesion" style="border:0px;">
<?php
echo $form->create('Register');//, array('url' => array('controller' => 'registers', 'action' =>'acceso')
echo "<table style='margin-top:-10px;'><tr >";
echo "<td><b>Correo: </b></td><td><b><font color=navy>".$form->input('email', array('label' => false, "class" => "email"))."</font></b></td></tr>";
echo "<tr><td><b>Clave: </b></td><td><b><font color=navy>".$form->input('password', array('label' => false, "class" => "password"))."</font></b></td>";
echo "</tr></table>";
//echo $form->end('Ingresar');
?>
<?php echo "<center>".$form->submit('Aceptar',array('class' => 'botonlog', 'title' => 'Custom Title'))."</center>"; ?>
</fieldset><b>
<?php echo $html->link('<img src="'.$html->url('/',true).'procesos/add.png"><br>' . __('Registrate', true), array('plugin' => 0, 'controller' => 'registers', 'action' => 'add'), array('class' => 'separator', 'escape' => false)); ?>
</b>
</center>
</div>
