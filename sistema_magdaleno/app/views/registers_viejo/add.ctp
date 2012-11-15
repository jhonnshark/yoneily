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
<?php if(!empty($campanas)){?>
<div style="background-color: #ececec; width: 385px; height: auto; float: left; margin-top: 20px; margin-left:10px;">
  
    <?php
        echo $this->Form->create('Register', array('type'=>'file'));
	?>
	
			<?php
				//echo $this->Form->input('password',array('type'=>'hidden'));
				//echo $this->Form->input('rpass',array('type'=>'hidden'));
				echo $this->Form->input('fbookid',array('type'=>'hidden','value'=>''));
				echo $this->Form->input('fblinkperfil',array('type'=>'hidden','value'=>''));
			?>
	

    <h3 class="titulo">Nueva Cuenta</h3>
    <table border="0" class="regtable" style="background-color: #ececec;">
           <tr>
                <td class="capti">Email</td>
                <td><?php echo $this->Form->input('correo', array("label" => false, "class" => "email","error" => false)); ?></td>
            </tr>
            <tr id="qtclave">
                <td class="capti par" style="background-color: #ececec">Clave</td>
                <td style="background-color: #ececec"><?php echo $this->Form->input('password', array("label" => false,"type"=>"password", "class" => "pass", "error" => false)); ?></td>
            </tr>
            <tr id="repclave">
                <td class="capti">Repetir Clave</td>
                <td><?php echo $this->Form->input('rpass', array("label" => false,"type"=>"password", "class" => "rpass","error" => false)); ?></td>
            </tr>
            <tr>
                <td class="capti par" style="background-color: #ececec">Nombre y apellido</td>
                <td style="background-color: #ececec"><?php echo $this->Form->input('nombreape', array("label" => false, "class" => "nomape","error" => false,'maxlength'=>'50')); ?></td>
            
             <tr>
                <td class="capti par" style="background-color: #ececec">Numero de Celular</td>
                <td style="background-color: #ececec"><?php echo $this->Form->input('codi',array("class"=>"codigo","label"=>false,"div"=>false,"options" => array($cod),"empty"=>"----"));?><?php echo $this->Form->input('telefono', array("label" => false, "class" => "telefono","div"=>false,"error" => false,"maxlength"=>7)); ?></td>
            
            </tr>
             <tr>
                <td class="capti">Fecha Nacimiento</td>
                <td>
						<?php $fecha = date('Y')?>
                        <?php echo $this->Form->input('fechanac',array('label'=>false,'minYear'=>'1940','maxYear'=>$fecha,'dateFormat'=>'DMY','monthNames'=>array('Seleccione','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'))); ?>
                        

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
					<div>
                </td>
            </tr>
            
            <tr id="stado" style="display:none">
                <td style="background-color: #ececec" class="capti">Estado</td>
               <td style="background-color: #ececec">
                                  <?php

                                    echo $this->Form->input('estado',array("class"=>"estado","label"=>false,"options" => array('')));
                                  ?>
               </td>
            </tr>
            <tr id="ciudad" style="display:none">
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
			<tr>
                <td class="capti">Campa&ntilde;a Pais</td>
                <td><?php echo $this->Form->input('pais_campana', array("label" => false, "value" => $campanas[0]['Campana']['pais_campana'],"error" => false)); ?></td>
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

<div id="cuadroface" style="float: right; width:356px; height: 201px; background-color:#ececec; margin-right:25px; margin-top: 20px; ">
    <h3 class="titulofacebook" style="margin-top:10px;"><font color="navy"><?php echo $campanas[0]['Campana']['pais_campana']; ?></font></h3>
    <p style="margin-left:5px;margin-right:5px;" align="justify"><?php echo "<b>Misi&oacute;n:</b> ".$campanas[0]['Campana']['descripcion']; ?></p><br>
	<h3><?php echo "<font color=red><b>Fecha Salida:</b> ".$campanas[0]['Campana']['fecha']."</font>"; ?></h3>

</div>
<?php }else{?>
<center>
<div id="cuadroface" style="float: center; width:356px; height: 101px; background-color:#ececec; margin-right:25px; margin-top: 160px; ">
<h1>No existe Campa&ntilde;a para este pais</h1>
</div>
</center>
<?php }?>