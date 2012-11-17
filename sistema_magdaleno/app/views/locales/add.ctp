<style type="text/css">
label {margin-left: 25%;}
table.index td{text-align: center; border: 0px;}
</style>
<script>
$('document').ready(function(){

   jQuery.validator.addMethod("accept", function(value, element, param) {
        return value.match(new RegExp("." + param + "$"));
    });

    $.validator.addMethod('regexp', function(value, element, param) {
        return this.optional(element) || value.match(param);
    },
    'ingresa una cuenta valida');
 

    

   $("#LocaleAddForm").validate({
		rules: {
			"data[Locale][password]": {
				required: true,
				minlength: 4,
				maxlength: 10
			},
			"data[Locale][confpassword]": {
				required: true,
				minlength: 4,
				maxlength: 10,
				equalTo: "#LocalePassword"
			},
            "data[Locale][correo]": {
				required: true,
				email: true
			}
                        

		},
		messages: {
            "data[Locale][password]": {
				required: "Ingresa tu clave",
				minlength: "Minimo 4 caracteres",
				maxlength: "Maximo 10 caracteres"
			},
			"data[Locale][confpassword]": {
				required: "Ingresa tu clave",
				minlength: "minimo 4 caracteres",
				maxlength: "Maximo 10 caracteres",
				equalTo: "Ingresa la misma clave"
			},
            "data[Locale][correo]":{
                required: "Ingresa tu correo",
                email: "ingresa un correo valido"
            }
                        
		},
                errorElement :'div'
	});
});

</script>
<center>
<center><img src="<?php echo $html->url('/',true)?>/img/local.png" height="80" /><br/></center>
<div align="center">
<?php
   echo $form->create('Locale',array('type' => 'file'));
   echo "<table class=index>";
   echo "<tr><td colspan='4'><center><div class='titulo_barra'><h1>Registrar Locales</h1></div></center></td></tr>";
   echo"<tr>";

   echo "<tr><td>".$form->input('rif', array('label' => 'Rif', 'size'=>10,'maxlength'=>10))."</td>";
   
   echo "<td>".$form->input('nombre_empresa', array('label' => 'Nombr
    e Local','maxlength'=>255))."</td>";
   echo "<td>".$form->input('encargado_nombre', array('label' => 'Nombre Encargado','maxlength'=>255))."</td></tr>";
   

   echo "<tr><td>".$form->input('encargado_apellido', array('label' => 'Apellido Encargado'))."</td>";
   echo "<td>".$form->input('encargado_cedula', array('label' => 'Cedula','maxlength'=>8))."</td>";
   echo "<td>".$form->input('telefono_cel', array('label' => 'Telefono Celular','maxlength'=>11))."</td></tr>";
   
   echo "<tr><td>".$form->input('telefono_office', array('label' => 'Telefono Local'))."</td>";
   echo "<td>".$form->input('n_cuenta_uno', array('label' => 'Numero de Cuenta 1','maxlength'=>20))."</td>";
   echo "<td>".$form->input('n_cuenta_dos', array('label' => 'Numero de Cuenta 2','maxlength'=>20))."</td></tr>";
   echo "";
   
   echo "<tr><td>".$form->input('descripcion_n_cuenta_uno', array('label' => 'Descricion Numero de Cuenta 1','type'=>'textarea'))."</td>";
   echo "<td>".$form->input('descripcion_n_cuenta_dos', array('label' => 'Descripcion Numero de Cuenta 2','maxlength'=>255,'type'=>'textarea'))."</td>";
   echo "</tr>";
   /*echo "<table><tr>";
   echo "<td>".$form->input('password', array('label' => 'Password','type'=>'password','maxlength'=>15,'size'=>'34'))."</td>";
   echo "<td>".$form->input('confpassword', array('label' => 'Confirmar Password','type'=>'password','maxlength'=>15,'size'=>'34'))."</td></tr>";
   echo "</tr></table>";*/
   
   echo "<tr><td>".$form->input('direccion', array('label' => 'Direccion','maxlength'=>300,'type'=>'text'))."</td>";
   echo "<td>".$form->input('correo', array('label' => 'Correo Electronico','maxlength'=>50,'size'=>'20'))."</td></tr>";
   echo "<tr><td colspan='4'><center><br/>";
   ?>
   <img src="<?php echo $html->url('/',true)?>/procesos/add.PNG"  /><font color='navy' size='4'><b> Medios de Pago</b></font>
   <?php
   echo "</center></td></tr>";
   echo "<tr>";
   echo "<td class=formpequeno>".$form->input('banco_cuenta_uno',array('label'=>'Banco de Cuenta Uno:','options'=>array(
      'Mercantil'=>'Banco Mercantil',
	  'Venezuela'=>'Banco de Venezuela',
	  'Banesco'=>'Banco Banesco',
	  'Bicentenario'=>'Banco Bicentenario',
	  'Caroni'=>'Banco Caroni',
	  'Caribe'=>'Banco Caribe'
	   ),'empty'=>'Seleccione'
       ))."</td>"; 
   echo "<td class=formpequeno>".$form->input('banco_cuenta_dos',array('label'=>'Banco de Cuenta Dos:','options'=>array(
      'Mercantil'=>'Banco Mercantil',
	  'Venezuela'=>'Banco de Venezuela',
	  'Banesco'=>'Banco Banesco',
	  'Bicentenario'=>'Banco Bicentenario',
	  'Caroni'=>'Banco Caroni',
	  'Caribe'=>'Banco Caribe'
	   ),'empty'=>'Seleccione'
       ))."</td>"; 
	   echo "<td class=formpequeno>".$form->input('tarjeta',array('label'=>'Punto de Venta:','options'=>array(
      '1'=>'Si',
	  '0'=>'No'
	   ),'empty'=>'Seleccione'
       ))."</td>"; 
	   echo "<td class=formpequeno>".$form->input('efectivo',array('label'=>'Pago en Efectivo:','options'=>array(
      '1'=>'Si',
	  '0'=>'No'
	   ),'empty'=>'Seleccione'
       ))."</td>"; 
   echo "</tr>";
   echo "<tr><td colspan='4'><center><br/>";
   ?>
   <img src="<?php echo $html->url('/',true)?>/procesos/add.PNG"  /><font color='navy' size='4'><b> Medios de Envio</b></font>
   <?php
   echo "</center></td></tr>";
    echo "<tr>";
    echo "<td class=formpequeno>".$form->input('envio_uno',array('label'=>'Medio Envio Uno:','options'=>array(
      'mrw'=>'MRW',
	  'zoom'=>'Zoom',
	  'domesa'=>'Domesa',
	  'cooperativa'=>'Cooperativas',
	  '0'=>'Ninguno'
	   ),'empty'=>'Seleccione Opcion'
    ))."</td>"; 
    echo "<td class=formpequeno>".$form->input('envio_dos',array('label'=>'Medio Envio Dos:','options'=>array(
      'mrw'=>'MRW',
	  'zoom'=>'Zoom',
	  'domesa'=>'Domesa',
	  'cooperativa'=>'Cooperativas',
	  '0'=>'Ninguno'
	   ),'empty'=>'Seleccione Opcion'
    ))."</td>";
	echo "<td class=formpequeno>".$form->input('envio_tres',array('label'=>'Medio Envio Tres:','options'=>array(
      'mrw'=>'MRW',
	  'zoom'=>'Zoom',
	  'domesa'=>'Domesa',
	  'cooperativa'=>'Cooperativas',
	  '0'=>'Ninguno'
	   ),'empty'=>'Seleccione Opcion'
    ))."</td>";
    echo "</tr>";
   echo "<font size='2'>";
   echo "<tr><td colspan='4'><center>".$form->input('nombre_file', array('label' => 'Logo del Local','type'=>'file'))."</center></td></tr>";
   echo "<tr><td colspan='4'><center>".$form->input('ubicacion_file', array('label' => 'Ubicacion del Local','type'=>'file'))."</center></td></tr>";
   echo "</font><tr><td colspan=4><br/>";
   echo $this->Form->input('status',array('type'=>'hidden', 'value'=>'1'));
   echo $form->input('usuario_id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
   echo '<center>'.$form->end(' Crear Local ').'</center><br/></td></tr></table>';
?>
</div>

</center>