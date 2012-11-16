<style type="text/css">
label {margin-left: 25%;}
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
<img style="left:50px;" src="<?php echo $html->url('/',true)?>/procesos/users_add.png" height="80" /><br/>
<div align="center">
	<div class="capa">
<?php
   echo $form->create('User');
   //echo "<td>".$form->input('groups_idgrupos', array('label'=>'Perfil ','options' =>array($groups)))."</td>";
   echo "<div class='titulo_barra'><h1>Registrar Usuarios (Administador)</h1></div>";
     /* echo $form->input('groups_idgrupos',array('label'=>'Perfil:','options'=>array('1'=>'Administrador'
	   )
       ))."</td>";*/
	echo "".$form->input('groups_idgrupos', array('label' => false,'maxlength'=>30, 'type'=>'hidden', 'value'=>'1'))."";
    echo "".$form->input('username', array('label' => 'Nombre de Ususario','maxlength'=>30, 'size'=>'20','required' => 'required'))."";
    echo "".$form->input('perfil_usuario', array('label' => 'Nombre y Apellido','maxlength'=>255,'required' => 'required'))."";
    echo "".$form->input('email_usuario', array('label' => 'Correo','email' => 'email','required' => 'required'))."";
    echo "".$form->input('password', array('label' => 'Password','type'=>'password','maxlength'=>15,'size'=>'20','required' => 'required'))."";
    echo "".$form->input('confpassword', array('label' => 'Confirmar Password','type'=>'password','maxlength'=>8,'required' => 'required'))."";
    
    echo '<br/><center>'.$form->end('Crear Usuario').'</center><br/>';
?>
</div>
</center>
</div>