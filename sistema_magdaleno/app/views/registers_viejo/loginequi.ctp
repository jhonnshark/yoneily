<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//pr($pais);
?>
<script>
function cargarProvincias(){
 	var idPais= $('#RegisterPais').val();
	//alert(idPais);
        if(idPais == 'Venezuela'){
            $('#RegisterEstado').html('<option selected>Cargando</option>');
            $('#RegisterEstado').attr("disabled",'');
            //alert("estados de venezuela");
            $.ajax({
               type: "POST",
               url: "<?php echo $html->url('/');?>pages/verestados",
               dataType: "html",
               success: function(msg){
                   //$('#hola').text("hola");
                   $('#RegisterEstado').html(msg);
                   //alert ("completado" + msg);
               }
               /*error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus + ": " + XMLHttpRequest.responseText);
                    $('#RegisterEstado').html('<option value='+XMLHttpRequest.responseText+'selected>'+XMLHttpRequest.responseText.estado+'</option>');
               }*/
             });
        }else{
            $('#RegisterEstado').attr("disabled",'disabled');
            $('#RegisterEstado').html('<option selected></option>');
            //alert("desabilitar boton");
        }


}

function recargar(){
     location.reload();

 }

 function direccionar(){
     parent.window.location = "<?php echo $html->url('/');?>home";
 }

$('document').ready(function(){
  $("select#RegisterPais").change(function(){
        cargarProvincias();

   });

   /*jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Letters only please");*/

   jQuery.validator.addMethod("accept", function(value, element, param) {
        return value.match(new RegExp("." + param + "$"));
    });


   $("#RegisterLoginequiForm").validate({
		rules: {
			"data[Register][correo]": {
				required: true,
				email: true
			},
            "data[Register][password]": {
				required: true				
			}			

		},
		messages: {
            "data[Register][correo]":{
                required: "Ingresa tu correo",
                email: "ingresa un correo valido"
            },
            "data[Register][password]": {
				required: "Ingresa tu clave"
			}
			
		},
               errorElement :'div'
		
	});

        $(".botonlog").click(function(){
            $("#cargador").css('display','inline');
             var email = $('input.email').val();
             var pass = $("input.pass").val();
             var dataString = '&ema=' + email + '&pass=' + pass;
             $("#cuadroface").css('display','none');
             $("#cuadrologin").css('display','none');
              $.ajax({
               type: "POST",
               url: "<?php echo $html->url('/',true);?>registers/acceso/",
               data: dataString,
               dataType: "html",
               success: function(msg){
                  //alert(msg);
                 $("#cargador").css('display','none');
                 if(msg == 1){
                     $("#respuesta").html("Bienvenido a equilibrio");
                     direccionar();
                     //setTimeout('direccionar()',0*1000);
                 }else{
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
<div id="cuadrologin" style="background-color: #ececec; width: 395px; height: auto; float: left; margin-top: 20px;">

    <?php 
    echo $this->Form->create('Register');
    ?>
    <h3 class="titulo">Ingreso</h3>
    <table border="0" class="regtable" style="background-color: #ececec;">
            <tr>
                <td class="capti">Email</td>
                <td><?php echo $this->Form->input('correo', array("label" => false, "class" => "email","error" => false)); ?></td>
            </tr>
   
            <tr>
                <td class="capti par" style="background-color: #ececec">Clave</td>
                <td style="background-color: #ececec"><?php echo $this->Form->input('password', array("label" => false,"type"=>"password", "class" => "pass", "div" => false, "error" => false)); ?></td>
            </tr>
                       
            <tr>

                <td style="background-color: #ececec; text-align: center;"></td>
                <td style="background-color: #ececec; text-align: left;">Olvidaste tu <a href="<?php echo $html->url('/'); ?>registers/recordar">usuario</a> | <a href="<?php echo $html->url('/'); ?>registers/recordar">clave</a></td>
            </tr>
            <tr>

                <td colspan="2" style="background-color: #ececec; text-align: center;"><?php echo $this->Form->submit('aceptar',array('class' => 'botonlog', 'title' => 'Custom Title')); ?></td>
            </tr>

            </table>

</div>
<div id="cargador" style="display:none;">
    <img src="<?php echo $html->url('/')?>img/loader.gif">
</div>
<div id="respuesta">
    
</div>

<div id="cuadroface" style="float: right; width:396px; height: 230px; background-color:#ececec; margin-left: 25px; margin-top: 20px; ">
    <h3 class="primera">¿Primera Vez?</h3>
    <div>
        <div class="linkreg">
            <p> Registrate aqu&iacute;</p>
        </div>
        <div style="float: left; margin-top: 20px;">
            <a href="<?php echo $html->url('/')?>registers/add"><img src="<?php echo $html->url('/')?>img/btnreg2.png"/></a>
        </div>
    </div><br/>
    <div style="margin-top: 50px;"></div>
    <h3 class="titulofacebook">Facebook</h3>
   
    <p style="margin-top: 5px;"> o usa tu cuenta de facebook para conectarte con Equilibrio.net.
De esta manera podras compartir con tus amigos los contenidos
del sitio facilmente..</p>

    <div style="width:22px; height:23px; margin-left:10px"><img id="fb-auth" src="<?php echo $html->url('/', true); ?>img/icono-facebook.gif" /></div>
    <div id="fb-root"></div>

    <script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
    <script type="text/javascript">
      // initialize the library with the API key

	  var connect = false;



	  var button = $('#fb-auth');

				$(button).click (

					function() {
                                            //alert("click");
                                        //alert(print_r(FB.getLoginStatus));
                                        FB.init({
                                         appId  : '121382464605639',
                                         status : true, // check login status
                                         cookie : true, // enable cookies to allow the server to access the session
                                         xfbml  : true  // parse XFBML
                                        });
					FB.getLoginStatus(updateButton,true);
					}
				);

	  function updateButton(response) {
          //alert(print_r(response));
				if (response.session && !connect) {
					connect = true;
					consultarUser();
				}else{
					connect = false;
					FB.login(function(response) {
						if (response.session && response.perms) {
							connect = true;
							consultarUser();
						}
					},{perms:'publish_stream,email'});
				}
        }

	function updateConnect(response)
		{
                    //alert(print_r(response));

				if (response.session) {
					connect = true;
				}else{
					connect = false;
				}
		}

		function consultarUser() {
					//$(".loader").css("display","inline");
					if(!connect)
					{
						FB.getLoginStatus(updateButton);
						return;
					}
					FB.api('/me', function(response) {
						var dataFacebook="";
						if(response.error)
						{
							for (var key in response.error) {
								if(dataFacebook != "")
								{
									dataFacebook += "&";
								}
								dataFacebook += key +" = "+ response[key];
							}
							alert("error en facebook"+dataFacebook);
							//$("#salida").text("Ha ocurrido un error. Estamos trabajando en solucionarlo.");
							//$("#salida").attr("class","span-6 error");
							//$(".loader").css("display","none");
							return;
						}else{

							for (var key in response) {
								if(dataFacebook != "")
								{
									dataFacebook += "&";
								}
								dataFacebook += key +" = "+ response[key];
							}

							var id_redsocial = response.id;
							//var dataString = '&idfb=' + id_redsocial;
                                                        $("#cargador").css('display','inline');
                                                        $("#cuadroface").css('display','none');
                                                        $("#cuadrologin").css('display','none');
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?php echo $html->url('/',true);?>registers/loginfacebook/"+id_redsocial,
                                                           dataType: "html",
                                                           success: function(msg){
                                                              //alert(msg);
                                                             $("#cargador").css('display','none');
                                                             if(msg == 1){
                                                                 $("#respuesta").html("Bienvenido a equilibrio");
                                                                 direccionar();
                                                                 //setTimeout('direccionar()',0*1000);
                                                             }else{
                                                                 $("#respuesta").html("El usuario no existe en la base de datos");
                                                                 recargar();
                                                                 //setTimeout('recargar()',0*1000);
                                                             }




                                                             }
                                                        });
							//alert("mis datos de facebook"+dataFacebook);

						}
					});

            }

    </script>

</div>