<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//pr($pais);
//pr($datos);
?>
<script>
function cargarProvincias(){
 	var idPais= $("#RegisterPais").attr('alt');
         //alert(idPais);
        if(idPais == 'Venezuela'){
			$('#stado').show();
			$('#ciudad').show();
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
			$('#stado').hide();
			$('#ciudad').hide();
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
                                maxlength: 50,
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
                            maxlength: "máximo 50 caracteres",
                            minlength: "minimo 3 caracteres",
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
		$("#RegisterPais").keyup(function(){
			$("#paisloader").show();	
		});
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
                 },
				 open: function(event, ui){
					$("#paisloader").hide();
				 }
	});
        $(".ui-autocomplete").css({'top':'58%','left':'20%'});

});



</script>
<style type="text/css">
input {
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
<center>
<div style="background-color: #ececec; width: 600px; height: auto; float: left; border-radius: 7px; ">
  
    <?php
        echo $this->Form->create('Register', array('type'=>'file'));
	?>
	
			<?php
				//echo $this->Form->input('password',array('type'=>'hidden'));
				//echo $this->Form->input('rpass',array('type'=>'hidden'));
				echo $this->Form->input('fbookid',array('type'=>'hidden','value'=>''));
				echo $this->Form->input('fblinkperfil',array('type'=>'hidden','value'=>''));
			?>
	

    <h3 class="titulo">Nueva Cuenta de Cliente</h3>
    <table border="0"  style="background-color: #ececec;width:100%;">
           <tr>
                <td class="capti">Email:</td>
                <td ><font color="red"><?php echo $this->Form->input('correo', array("label" => false, "class" => "email","error" => false, "size"=>"20")); ?></font></td>
            </tr>
            <tr id="qtclave">
                <td class="capti par" style="background-color: #ececec">Clave:</td>
                <td style="background-color: #ececec"><font color="red"><?php echo $this->Form->input('password', array("label" => false,"type"=>"password", "class" => "pass", "error" => false)); ?></font></td>
            </tr>
            <tr id="repclave">
                <td class="capti">Repetir Clave:</td>
                <td><font color="red"><?php echo $this->Form->input('rpass', array("label" => false,"type"=>"password", "class" => "rpass","error" => false)); ?></font></td>
            </tr>
            <tr>
                <td class="capti par" style="background-color: #ececec">Nombre y apellido:</td>
                <td style="background-color: #ececec"><font color="red"><?php echo $this->Form->input('nombreape', array("label" => false, "class" => "nomape","error" => false,'maxlength'=>'50')); ?></font></td>
            
             <tr>
                <td class="capti par" style="background-color: #ececec">Numero de Celular:</td>
                <td style="background-color: #ececec"><font color="red"><?php echo $this->Form->input('codi',array("class"=>"codigo","label"=>false,"div"=>false,"options" => array($cod),"empty"=>"----"));?><?php echo $this->Form->input('telefono', array("label" => false, "class" => "telefono","div"=>false,"error" => false,"maxlength"=>7)); ?></font></td>
            
            </tr>
             <tr>
                <td class="capti">Fecha Nacimiento:</td>
                <td><font color="red">
						<?php $fecha = date('Y')?>
                        <?php echo $this->Form->input('fechanac',array('label'=>false,'minYear'=>'1940','maxYear'=>$fecha,'dateFormat'=>'DMY','monthNames'=>array('Seleccione','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'))); ?>
                        
				</font>
               </td>


            </tr>
            <tr>
                <td style="background-color: #ececec" class="capti">Sexo:</td>
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
          
            <tr>
                <td class="capti">Pa&iacute;s</td>
                <td style="background-color: #ececec; position:relative">
                           <?php
                                  /*for($j=1;$j<count($pais);$j++)
                                  {
                                      $nompais['pais'] = 'pais';
                                      $nompais[$j] = $pais[$j]['Paise']['nombre'];
                                  }*/
                                  echo $this->Form->input('pais',array("type"=>"text","class"=>"pais","id"=>"RegisterPais","label"=>false));
                           ?>
                    <div id="#someElem">
                    </div>
					<div id="paisloader" style="position:absolute; margin-top:-15px; margin-left:135px; display:none;">
						<img src="<?php echo $html->url('/',true)?>img/countryload.gif" />
					</div>
                </td>
            </tr>
            
            <tr id="stado" style="display:none">
                <td style="background-color: #ececec" class="capti">Estado</td>
               <td style="background-color: #ececec">
                                  <?php

                                    echo $this->Form->input('estado',array("class"=>"estado","id"=>"RegisterEstado","label"=>false,"options" => array('')));
                                  ?>
               </td>
            </tr>
            <tr id="ciudad" style="display:none">
                <td style="background-color: #ececec" class="capti">Ciudades</td>
               <td style="background-color: #ececec">
                                  <?php

                                    echo $this->Form->input('ciudad',array("class"=>"ciudad","id"=>"RegisterCiudad","label"=>false,"options" => array('')));
                                  ?>
               </td>
            </tr>

            <tr>
                <td style="background-color: #ececec" class="capti"><a href="<?php echo $html->url('/')?>files/terminos/terminos.pdf" target="_blank">T&eacute;rminos y Condiciones</a></td>
               <td style="background-color: #ececec"> 
			   <?php echo $this->Form->input('tecon',array("class"=>"auto","label"=>false,"type"=>"checkbox"));?>
   
			   </td>
            </tr>
            <tr>
                <td style="background-color: #ececec" class="capti">Acepta Recibir mensajes<br> de Correo Electr&oacute;nico</td>
               <td style="background-color: #ececec">
                                  <?php

                                    echo $this->Form->input('scor',array("class"=>"auto","label"=>false,"type"=>"checkbox"));
                                  ?>
               </td>
            </tr>
			<!--
            <tr>
                <td class="capti">Cuenta de Twitter</td>
                <td><?php //echo $this->Form->input('cuentatwitter', array("label" => false, "class" => "twitter","error" => false)); ?></td>
            </tr>
             <tr>
                <td class="capti"><h6>Foto perfil</h6></td>
                <td><?php //echo $this->Form->input('foto', array("type"=>"file","label" => false, "class" => "foto", "div" => false, "error" => false)); ?></td>
            </tr>-->

            <tr>

                <td colspan="2" style="background-color: #ececec; text-align: center;"><?php echo $this->Form->submit('Aceptar',array('class' => 'botonreg', 'title' => 'Custom Title')); ?></td>
            </tr>

            </table>

</div>
</center>
