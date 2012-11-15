<script type="text/javascript">
       $('document').ready(function(){
		 $("#videoembed").show();
       });
</script>
<fieldset>
    <?php
		echo $form->create('Page');
        
	?>
    <table border="0" class="regtable" style="margin-left:20px;">
			<tr>
                <td class="capti"><font color="navy" size="3"><b>Dispositivo:</b></font></td>
                <td><font color="red"><?php echo $form->input('tipodispositivo_file',array('options'=>array('web','Movil'),'label'=>false)); ?></font></td>
            </tr>  
			<tr>
                <td class="capti"><font color="navy" size="3"><b>Titulo del Video:</b></font></td>
                <td><font color="red"><?php echo $form->input('titulo_video',array('type'=>'text','label'=>false)); ?></font></td>
            </tr> 			
            <tr>
                <td class="capti par" style="background-color: #ececec;"><font color="navy" size="3"><b>Embeber Video:</b></font></td>
                <td><font color="red"><?php echo $form->input('videoembed',array('type'=>'quote','label'=>false)); ?></font></td>
            
            <tr>
                <td class="capti par" ><font color="navy" size="3"><b>Subir Imagen Video:</b></font></td>
                <td><font color="red"><?php echo $form->input('vidthumbnail',array('type'=>'file','label'=>false)); ?></font></td>
            </tr>
            <tr>
                <td class="capti par" ><font color="navy" size="3"><b>Subir Imagen Thumbnail:</b></font></td>
                <td><font color="red"><?php echo $form->input('nombre_file',array('type'=>'file','label'=>false)); ?></font></td>
            </tr>
            <tr>
                <td style="background-color: #ececec" class="capti"><font color="navy" size="3"><b>Sexo:</b></font></td>
                <td><b>
                           <?php
                            $options=array('M'=>'Masculino','F'=>'Femenino');
                            $attributes=array('legend'=>false,'class'=>'auto');
                           echo $form->radio('sexo',$options,$attributes);
							?>
                </b></td>
            </tr>
            <tr>
                <td class="capti"><font color="navy" size="3"><b>Pa&iacute;s:</b></font></td>
                <td><font color="red">
                           <?php
                                  echo $this->Form->input('pais',array("type"=>"text", "class" => "otro_input","id"=>"RegisterPais","label"=>false));
                           ?>
                </font></td>
            </tr>
            <tr>
                <td style="background-color: #ececec" class="capti"><font color="navy" size="3"><b>Tipo Mensaje:</b></font></td>
                <td><b>
                           <?php
                            $options=array('1'=>'Publico','2'=>'Privado');
                            $attributes=array('legend'=>false,'class'=>'auto');
                           echo $form->radio('tipo_mensaje',$options,$attributes);
							?>
                </b></td>
            </tr>
            <tr id="stado">
                <td class="capti"><font color="navy" size="3"><b>Motivo de Oraci&oacute;n <br> Comentario:</b></font></td>
               <td><font color="red">
                                  <?php

                                    echo $this->Form->input('comentario',array("label"=>false,"class"=>"textar", "type"=>"textarea",'maxlength'=>'150'));
                                  ?>
               </font></td>
            </tr>
			<?php $fecha= date("d-m-Y H:i:s");
			echo $this->Form->input('fecha',array("label"=>false, "value"=>"$fecha", "type"=>"hidden"));
			?>
            <tr>

                <td colspan="2" style="text-align: center;"><?php echo $this->Form->submit('Aceptar',array('class' => 'botonreg', 'title' => 'Custom Title')); ?></td>
            </tr>

            </table>
			</fieldset>
<fieldset>
<h1>Adjuntar Video</h1>
<div id="videoembed" style="display: none;">
<?php
   echo $form->create('Video',array('type' => 'file'));
   echo $form->input('usuario_id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
   
   
   
   
   
   echo $form->input('etiqueta',array('options'=>array('Equilibrio','Videos'),'label'=>'Etiqueta'));
   echo $form->input('descripcion',array('type'=>'quote','label'=>'Descripción'));
   echo $form->input('destacado',array('type'=>'checkbox','label'=>'Marcar como destacado'));
   echo $form->input('video_home',array('options'=>array('Home','Videos'),'label'=>'Categorias'));
   echo $form->input('path_id_path',array('type'=>'hidden','value'=>'3','label'=>'Ruta'));
   echo $form->end('Crear Video');
?>
</div>
</fieldset>
