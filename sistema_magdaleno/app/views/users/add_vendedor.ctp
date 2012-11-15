<script>
$('document').ready(function(){

   jQuery.validator.addMethod("accept", function(value, element, param) {
        return value.match(new RegExp("." + param + "$"));
    });

    $.validator.addMethod('regexp', function(value, element, param) {
        return this.optional(element) || value.match(param);
    },
    'ingresa una cuenta valida');
 //alert('entro');
   $("#UserAddVendedorForm").validate({
   
		rules: {
			"data[User][groups_idgrupos]": {
				required: true
			},
			"data[User][username]": {
				required: true
			},
			"data[User][perfil_usuario]": {
				required: true
			},
			"data[User][pass]": {
				required: true,
				minlength: 4,
				maxlength: 10
			},
			"data[User][confpassword]": {
				required: true,
				minlength: 4,
				maxlength: 10,
				equalTo: "#UserPass"
			},
            "data[User][email_usuario]": {
				required: true,
				email: true
			}
                        

		},
		messages: {
			"data[User][groups_idgrupos]": {
				required: "* Requerido"
			},
			"data[User][username]": {
				required: "* Requerido"
			},
			"data[User][perfil_usuario]": {
				required: "* Requerido"
			},
            "data[User][pass]": {
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
            "data[User][email_usuario]":{
                required: "Ingresa tu correo",
                email: "ingresa un correo valido"
            }
                        
		},
                errorElement :'div'
	});
	$("#buscar").click(function(){
				var datos = new Object();
				datos.cod = $(".cod").val();
				//alert(datos.cod);
				if(datos.cod !=''){
					$.ajax({
						type: "POST",
						url: "<?php echo $html->url('/',true);?>users/consulta_codigo/"+datos.cod,
						data: datos,
						success: function(data){
							//alert(data);
							if(data != 0){				
								$("#consulta").hide();
								$("#info_login").hide();
								$("#registro").show();
								$("#id_local").val(data);
							}else{
								$("#info_login").show();
							}
						}
					});
				}
	});
});

</script>
<center>
<center><img src="<?php echo $html->url('/',true)?>/img/personal.png" height="80" /><br/><h1>Registrar Vendedor</h1></center>
<div align="center">
<?php
	echo "<div id='consulta'>";
	//echo $form->create('User',array('controller'=>'locales','action'=>'acceso'));
	echo "<center><table style='width:250px;'><tr><td><center>".$form->input('codigo',array('label'=>'Ingrese Codigo:','class'=>'cod'))."</center></td></tr>";
	echo '<tr><td><center><img src="'.$html->url('/',true).'/img/consultar.png" height="20" id="buscar" /></center></td></tr></table></center>';
	echo "</div>";
	
	echo "<div id='registro' style='display:none;'>";
	$cadena = "abcdefghijklmnopqrstuvwxyz";
	$cadena = md5($cadena);//md5 crea un valor aleatorio
	srand((double)microtime()*1000000);
	$inicio = rand(0,27);
	$codigo = substr($cadena,$inicio,6);
    echo $form->create('User',array('controller'=>'users','action'=>'add_vendedor'));
    echo "<table><tr>";
    echo "<td>".$form->input('groups_idgrupos', array('label'=>'Perfil ','options' =>array('2'=>'Vendedor')))."</td>";
    echo "<td>".$form->input('username', array('label' => 'Nombre de Usuario','maxlength'=>30, 'size'=>'20'))."</td>";
    echo "<td>".$form->input('perfil_usuario', array('label' => 'Nombre y Apellido','maxlength'=>255))."</td></tr>";
    echo "<tr><td>".$form->input('email_usuario', array('label' => 'Correo', 'size'=>'20'))."</td>";
    echo "<td>".$form->input('pass', array('label' => 'Password','type'=>'password','maxlength'=>15,'size'=>'15'))."</td>";
    echo "<td>".$form->input('confpassword', array('label' => 'Confirmar Password','type'=>'password','maxlength'=>8))."</td></tr>";
    echo "</table>";
	echo $form->input('locale_id_local', array('label' =>false,'type'=>'hidden','id'=>'id_local'));
	echo $form->input('codigo_uno', array('label' =>false,'type'=>'hidden','value'=>$codigo));
    echo '<center>'.$form->end('Crear Usuario').'</center>';
    echo "</div>";
?>
</div>
</center>
<center>
	<div id="info_login" style="display:none;">
		<h2><font color="navy" size="3"><b>No se encontro C&oacute;digo en la Base de Datos<br/> 
		&oacute; C&oacute;digo ya registrado</b></font></h2>
	</div>
</center>