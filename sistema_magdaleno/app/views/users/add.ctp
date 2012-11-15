<script>
$('document').ready(function(){

   jQuery.validator.addMethod("accept", function(value, element, param) {
        return value.match(new RegExp("." + param + "$"));
    });

    $.validator.addMethod('regexp', function(value, element, param) {
        return this.optional(element) || value.match(param);
    },
    'ingresa una cuenta valida');
 

    

   $("#UserAddForm").validate({
		rules: {
			"data[User][password]": {
				required: true,
				minlength: 4,
				maxlength: 10
			},
			"data[User][confpassword]": {
				required: true,
				minlength: 4,
				maxlength: 10,
				equalTo: "#UserPassword"
			},
            "data[User][correo]": {
				required: true,
				email: true
			}
                        

		},
		messages: {
            "data[User][password]": {
				required: "Ingresa tu clave",
				minlength: "Minimo 4 caracteres",
				maxlength: "Maximo 10 caracteres"
			},
			"data[User][confpassword]": {
				required: "Ingresa tu clave",
				minlength: "minimo 4 caracteres",
				maxlength: "Maximo 10 caracteres",
				equalTo: "Ingresa la misma clave"
			},
            "data[User][correo]":{
                required: "Ingresa tu correo",
                email: "ingresa un correo valido"
            }
                        
		},
                errorElement :'div'
	});
});

</script>
<center>
<center><img src="<?php echo $html->url('/',true)?>/img/personal.png" height="80" /><br/><h1>Registrar Usuarios</h1></center>
<div align="center">
<?php
   echo $form->create('User');
   echo "<table><tr>";
   //echo "<td>".$form->input('groups_idgrupos', array('label'=>'Perfil ','options' =>array($groups)))."</td>";
   echo "<td>Administrador</td>";
  /* echo $form->input('groups_idgrupos',array('label'=>'Perfil:','options'=>array('1'=>'Administrador'
	   )
       ))."</td>";*/
	   echo $form->input('groups_idgrupos', array('label' => false,'maxlength'=>30, 'type'=>'hidden', 'value'=>'1'));
   echo "<td>".$form->input('username', array('label' => 'Nombre de Usuario','maxlength'=>30, 'size'=>'15'))."</td>";
   echo "<td>".$form->input('perfil_usuario', array('label' => 'Nombre y Apellido','maxlength'=>255))."</td></tr>";
   echo "<tr><td>".$form->input('email_usuario', array('label' => 'Correo'))."</td>";
   echo "<td>".$form->input('password', array('label' => 'Password','type'=>'password','maxlength'=>15,'size'=>'15'))."</td>";
   echo "<td>".$form->input('confpassword', array('label' => 'Confirmar Password','type'=>'password','maxlength'=>8))."</td></tr>";
   echo "</table>";
   echo '<center>'.$form->end('Crear Usuario').'</center>';
?>
</div>
</center>