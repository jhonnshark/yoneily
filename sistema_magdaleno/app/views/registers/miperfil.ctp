<?php
 //pr($even);
//print_r($mireg);
?>
<script type="text/javascript">
      $('document').ready(function(){
            $('#btnface a').tooltip({
                track: true,
                delay: 0,
                showURL: false,
                showBody: " - ",
                fade: 250
            });

            $('#btntwi a').tooltip({
                track: true,
                delay: 0,
                showURL: false,
                showBody: " - ",
                fade: 250
            });

            $('#btncorreo a').tooltip({
                track: true,
                delay: 0,
                showURL: false,
                showBody: " - ",
                fade: 250
            });

            //$('.email').colorbox({width:"80%", height:"100%", iframe:true})
            /*$("#btnface").mouseover(function(){
                alert("tooltip");
            });


            $("#btnface").mouseoout(function(){
                alert("sali");
            });*/

        $("#RegisterPais").autocomplete({
                //source: availableTags

               	source: '<?php echo $html->url('/',true)?>registers/verpais',
                minLength: 1,
                 select: function(event, ui){
                     $("#RegisterPais").attr('alt', ui.item.id);
                     cargarProvincias();
                      $(".ui-autocomplete").css({'top':'232%','left':'22%'})
                     //alert(ui.item.id);
                     //alert(ui.item.value);
                 }
	});
        $(".ui-autocomplete").css({'top':'232%','left':'22%'});

    });
 </script>
		
	<center>
	<div id="perfil">
	<div style="width: 485px; height: auto; margin-top: 20px; margin-left:70px;">
  
    <?php
        echo $this->Form->create('Register');//,array('controller'=>'registers','action'=>'actualizardatos')
	?>
    <center><img src="<?php echo $html->url('/',true)?>/images/start.png" width="60" hight="60" /></center>
     <h2>Mi Perfil</h2>
<br><br>
    <table border="0"  style="width:100%;">
           <tr>
                <td style="">Email:</td>
                <td ><?php echo $this->Form->input('correo', array("label" => false,"size"=>"25")); ?></td>
            </tr>
            <tr>
                <td class="" style="background-color: #ffffff">Nombre y apellido:</td>
                <td style=""><?php echo $this->Form->input('nombreape', array("label" => false,"size"=>"25",'maxlength'=>'50')); ?></td>
            </tr>
             <tr>
                <td >Numero de Celular:</td>
                <td ><?php echo $this->Form->input('telefono', array("label" => false,"size"=>"25","maxlength"=>11)); ?></td>
            
            </tr>
			<tr>
                <td>Pa&iacute;s:</td>
                <td style="position:relative">
                           <?php echo $this->Form->input('pais',array("type"=>"text","size"=>"25","label"=>false));?>
                    <div id="#someElem">
                    </div>
					<div id="paisloader" style="position:absolute; margin-top:-15px; margin-left:135px; display:none;">
						<img src="<?php echo $html->url('/',true)?>img/countryload.gif" />
					</div>
                </td>
            </tr>
             <tr>
                <td class="">Fecha Nacimiento:</td>
                <td>
						<?php $fecha = date('Y')?>
                        <?php echo $this->Form->input('fechanac',array('label'=>false,'minYear'=>'1940','maxYear'=>$fecha,'dateFormat'=>'DMY','monthNames'=>array('Seleccione','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'))); ?>
                        

               </td>
            </tr>
            <tr>
                <td>Sexo:</td>
                <td>
                           <?php
                            $options=array('M'=>'masculino','F'=>'femenino');
                            $attributes=array('legend'=>false,'class'=>'auto');
                            echo $form->radio('sexo',$options,$attributes);
                            ?>
                </td>
            </tr>
            <tr>
                <td>Terminos y Condiciones</td>
               <td>
                                  <?php

                                    echo $this->Form->input('tecon',array("class"=>"auto","label"=>false,"type"=>"checkbox"));
                                  ?>
               </td>
            </tr>
            <tr>
                <td>Sms y Correo</td>
               <td>
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
			<?php echo $this->Form->input('idregistro',array('type'=>'hidden'));
			//echo $this->Form->create('Register',array('controller'=>'registers','action'=>'actualizardatos'));
			?>
            <tr>

                <td colspan="2" style="text-align: center;"><?php echo $this->Form->submit('Aceptar',array('class' => 'botonreg', 'title' => 'Custom Title')); ?></td>
            </tr>

            </table>

</div></div>
</center>