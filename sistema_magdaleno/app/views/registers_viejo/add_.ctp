<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//pr($pais);
?>
<script>
function cargarProvincias(){
 	var idPais= $("#RegisterPais").attr('alt');

         //alert(idPais);
        if(idPais == 'Venezuela'){
            $('#RegisterEstado').html('<option selected>Cargando</option>');
            $('#RegisterEstado').attr("disabled",'');
             $('#RegisterCiudad').attr("disabled",'');
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
            $('#RegisterCiudad').attr("disabled",'disabled');
            $('#RegisterEstado').html('<option selected></option>');
            $('#RegisterCiudad').html('<option selected></option>');
            //alert("desabilitar boton");
        }

}

function cargarCiudades(id){
        //alert(id);
        if(id != null)
        {
            $('#RegisterCiudad').html('<option selected>Cargando</option>');
            $('#RegisterCiudad').attr("disabled",'');
            $.ajax({
               type: "POST",
               url: "<?php echo $html->url('/');?>pages/verciudad/"+id,
               dataType: "html",
               success: function(msg){
                   //$('#hola').text("hola");
                   $('#RegisterCiudad').html(msg);
                   //alert ("completado" + msg);
               }
               /*error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus + ": " + XMLHttpRequest.responseText);
                    $('#RegisterEstado').html('<option value='+XMLHttpRequest.responseText+'selected>'+XMLHttpRequest.responseText.estado+'</option>');
               }*/
             });
           }else{
                 $('#RegisterCiudad').attr("disabled",'disabled');
           }
        
}

$('document').ready(function(){
  
  $("select#RegisterPais").change(function(){
        cargarProvincias();

   });

    $("select#RegisterEstado").change(function(){
        var valor = $("#RegisterEstado").val();
        cargarCiudades(valor);

   });

   /*jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Letters only please");*/

   jQuery.validator.addMethod("accept", function(value, element, param) {
        return value.match(new RegExp("." + param + "$"));
    });

    $.validator.addMethod('regexp', function(value, element, param) {
        return this.optional(element) || value.match(param);
    },
    'ingresa una cuenta valida');
 

    

   $("#RegisterAddForm").validate({
		rules: {
			"data[Register][usuario]": {
				required: true,
				minlength: 2
			},
                        "data[Register][password]": {
				required: true,
				minlength: 5
			},
			"data[Register][rpass]": {
				required: true,
				minlength: 5,
				equalTo: "#RegisterPassword"
			},
                        "data[Register][nombreape]": {
				required: true,
				minlength: 3,
                                maxlength: 20,
                                accept: "[a-zA-ZáéíóúñÑ]+"

			},
                        "data[Register][correo]": {
				required: true,
				email: true
			},
                         "data[Register][telefono]": {
				required: true,
                                maxlength: 7,
				accept: "[0-9]+"
			},
                        "data[Register][fechanac]": {
				required: true
				
			},
                        "#RegisterSexoM": {
				required: true
			},
                        "data[Register][foto]": {
				required: true
			},
                        "data[Register][cuentatwitter]":{
                            //required
                            regexp:/[@]+([A-Za-z0-9-_]+)/
                        }
                        

		},
		messages: {
                        "data[Register][usuario]": {
				required: "Ingresa tu usuario",
				minlength: "Tu nombre debe tener mas de 2 caracteres"
			},
                        "data[Register][password]": {
				required: "Ingresa tu clave",
				minlength: "minimo 5 caracteres"
			},
			"data[Register][rpass]": {
				required: "Ingresa tu clave",
				minlength: "minimo 5 caracteres",
				equalTo: "Ingresa la misma clave"
			},
                        "data[Register][nombreape]":{
                            required: "Ingresa tu nombre",
                            minlength: "máximo 30 caracteres",
                            accept: "solo debes colocar letras"
                        },
                        "data[Register][correo]":{
                            required: "Ingresa tu correo",
                            email: "ingresa un correo valido"
                        },
                        "data[Register][telefono]":{
                            required: "Ingresa tu telefono",
                            maxlength: "máximo 7 caracteres",
                            accept: "debes colocar solo numeros"
                        },
                        "#RegisterSexoM":{
                            required: "Elige tu sexo"
                        },
                        "data[Register][foto]":{
                            required:"coloca tu foto"
                        }
                        
		},
                errorElement :'div'
	});

       var availableTags = [
			"ActionScript",
			"AppleScript",
			"Asp",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"Scheme"
		];
               
        /*$(".ui-autocomplete").position({
            my: "center",
            at: "center",
             offset: "3 -3"
        });*/
        $("#RegisterPais").autocomplete({
                //source: availableTags
               
               	source: '<?php echo $html->url('/',true)?>registers/verpais',
                minLength: 1,
                 select: function(event, ui){
                     $("#RegisterPais").attr('alt', ui.item.id);
                     cargarProvincias();
                      $(".ui-autocomplete").css({'top':'58%','left':'20%'})
                     //alert(ui.item.id);
                     //alert(ui.item.value);
                 }
	});
        $(".ui-autocomplete").css({'top':'58%','left':'20%'});

});



</script>
<div style="background-color: #ececec; width: 395px; height: auto; float: left; margin-top: 20px;">
  
    <?php echo $this->Form->create('Register', array('type'=>'file')); ?>
    <h3 class="titulo">Nueva Cuenta</h3>
    <table border="0" class="regtable" style="background-color: #ececec;">
           <tr>
                <td class="capti">Email</td>
                <td><?php echo $this->Form->input('correo', array("label" => false, "class" => "email","error" => false)); ?></td>
            </tr>
            <tr>
                <td class="capti par" style="background-color: #ececec">Clave</td>
                <td style="background-color: #ececec"><?php echo $this->Form->input('password', array("label" => false,"type"=>"password", "class" => "pass", "error" => false)); ?></td>
            </tr>
            <tr>
                <td class="capti">Repetir Clave</td>
                <td><?php echo $this->Form->input('rpass', array("label" => false,"type"=>"password", "class" => "rpass","error" => false)); ?></td>
            </tr>
            <tr>
                <td class="capti par" style="background-color: #ececec">Nombre y apellido</td>
                <td style="background-color: #ececec"><?php echo $this->Form->input('nombreape', array("label" => false, "class" => "nomape","error" => false)); ?></td>
            
             <tr>
                <td class="capti par" style="background-color: #ececec">Numero de Celular</td>
                <td style="background-color: #ececec"><?php echo $this->Form->input('codi',array("class"=>"codigo","label"=>false,"div"=>false,"options" => array($cod),"empty"=>"----"));?><?php echo $this->Form->input('telefono', array("label" => false, "class" => "telefono","div"=>false,"error" => false,"maxlength"=>7)); ?></td>
            
            </tr>
             <tr>
                <td class="capti">Fecha Nacimiento</td>
                <td>
                        <?php echo $this->Form->input('fechanac',array('label'=>false,'minYear'=>'1940','maxYear'=>'2030','dateFormat'=>'DMY','monthNames'=>array('Seleccione','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'))); ?>
                        

               </td>


            </tr>
            <tr>
                <td style="background-color: #ececec" class="capti">Sexo</td>
                <td style="background-color: #ececec">
                           <?php
                                /*echo $form->radio('sexo', array(
                                         'type' => 'radio',
                                         'id' => 'sdfsd',
                                         'name' => 'asdas',
                                         'options' => array(2=>'Tire Manufacturer', 7=>'Rim Manufacturer '),
                                 ));*/
                            $options=array('M'=>'masculino','F'=>'femenino');
                            $attributes=array('legend'=>false,'class'=>'auto');
                           echo $form->radio('sexo',$options,$attributes);

                            ?>
                           <?php //echo $this->Form->radio('femenino', array()); ?>
                </td>
            </tr>
            <!--<tr>
                <td class="capti"><h6>Pa&iacute;s</h6></td>
                <td style="background-color: #ececec">
                           <?php
                                  /*for($j=1;$j<count($pais);$j++)
                                  {
                                      $nompais['pais'] = 'pais';
                                      $nompais[$j] = $pais[$j]['Paise']['nombre'];
                                  }*/
                                  //echo $this->Form->input('pais',array("class"=>"pais","label"=>false,"options" => array($pais)));
                           ?>
                </td>
            </tr>-->

            <tr>
                <td class="capti">Pa&iacute;s</td>
                <td style="background-color: #ececec">
                           <?php
                                  /*for($j=1;$j<count($pais);$j++)
                                  {
                                      $nompais['pais'] = 'pais';
                                      $nompais[$j] = $pais[$j]['Paise']['nombre'];
                                  }*/
                                  echo $this->Form->input('pais',array("type"=>"text","class"=>"pais","label"=>false));
                           ?>
                    <div id="#someElem">
                    </div>
                </td>
            </tr>
            
            <tr>
                <td style="background-color: #ececec" class="capti">Estado</td>
               <td style="background-color: #ececec">
                                  <?php

                                    echo $this->Form->input('estado',array("class"=>"estado","label"=>false,"options" => array('')));
                                  ?>
               </td>
            </tr>
            <tr>
                <td style="background-color: #ececec" class="capti">Ciudades</td>
               <td style="background-color: #ececec">
                                  <?php

                                    echo $this->Form->input('ciudad',array("class"=>"ciudad","label"=>false,"options" => array('')));
                                  ?>
               </td>
            </tr>

            <tr>
                <td style="background-color: #ececec" class="capti">Terminos y Condiciones</td>
               <td style="background-color: #ececec">
                                  <?php

                                    echo $this->Form->input('tecon',array("class"=>"auto","label"=>false,"type"=>"checkbox"));
                                  ?>
               </td>
            </tr>
            <tr>
                <td style="background-color: #ececec" class="capti">Sms y Correo</td>
               <td style="background-color: #ececec">
                                  <?php

                                    echo $this->Form->input('scor',array("class"=>"auto","label"=>false,"type"=>"checkbox"));
                                  ?>
               </td>
            </tr>

            <tr>
                <td class="capti">Cuenta de Twitter</td>
                <td><?php echo $this->Form->input('cuentatwitter', array("label" => false, "class" => "twitter","error" => false)); ?></td>
            </tr>
             <!--<tr>
                <td class="capti"><h6>Foto perfil</h6></td>
                <td><?php //echo $this->Form->input('foto', array("type"=>"text","label" => false, "class" => "email", "div" => false, "error" => false)); ?></td>
            </tr>-->

            <tr>

                <td colspan="2" style="background-color: #ececec; text-align: center;"><?php echo $this->Form->submit('aceptar',array('class' => 'botonreg', 'title' => 'Custom Title')); ?></td>
            </tr>

            </table>

</div>

<div id="cuadroface" style="float: right; width:396px; height: 201px; background-color:#ececec; margin-left: 25px; margin-top: 20px; ">
    <h3 class="titulofacebook">Facebook</h3>
    <p>Usa tu cuenta de facebook para conectarte con Equilibrio.net. De
esta manera podras compartir con tus amigos los contenidos del
sitio facilmente.</p>

    <!--<input id="fb-auth" type="image" value="Login" src="<?php //echo $html->url('/', true); ?>img/icono-facebook.gif" alt="Facebook"  style="width:22px; height:23px; margin-left:10px"/>-->
    <div style="width:22px; height:23px; margin-left:10px"><img id="fb-auth" src="<?php echo $html->url('/', true); ?>img/icono-facebook.gif" /></div>
    <div id="fb-root"></div>

    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <script>
      // initialize the library with the API key

	  var connect = false;
	  FB.init({ apiKey:'121382464605639', status: true, cookie: true, xfbml: false});

	  var button = $('#fb-auth');
				$(button).click (
                                        
					function() {
                                            //alert("click");
						FB.getLoginStatus(updateButton,true);
					}
				);

	  function updateButton(response) {

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

				if (response.session ) {
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

							var	id_redsocial = response.id;
							var	red_social = response.red;
							var	nombres = response.first_name;
							var	apellidos = response.last_name;
							var	correos = response.email;
							var	perfil = response.link;

                                                        $("#RegisterCorreo").attr('value',response.email);
                                                        location.reload();
							alert("mis datos de facebook"+dataFacebook);

						}
					});

            }

            //var evento = FB.Event.subscribe('auth.statusChange', updateConnect);
            //alert(evento);

      // fetch the status on load
      /*FB.getLoginStatus(handleSessionResponse);

      $('#fb-auth').bind('click', function() {
        FB.login(handleSessionResponse);
      });

      $('#logout').bind('click', function() {
        FB.logout(handleSessionResponse);
      });

      $('#disconnect').bind('click', function() {
        FB.api({ method: 'Auth.revokeAuthorization' }, function(response) {
          clearDisplay();
        });
      });

      // no user, clear display
      function clearDisplay() {
        $('#user-info').hide('fast');
      }

      // handle a session response from any of the auth related calls
      function handleSessionResponse(response) {
        // if we dont have a session, just hide the user info
        if (!response.session) {
          clearDisplay();
          return;
        }

        // if we have a session, query for the user's profile picture and name
        FB.api(
          {
            method: 'fql.query',
            query: 'SELECT name, pic FROM profile WHERE id=' + FB.getSession().uid
          },
          function(response) {
            var user = response[0];
            $('#user-info').html('<img src="' + user.pic + '">' + user.name).show('fast');
          }
        );*/

    </script>

</div>