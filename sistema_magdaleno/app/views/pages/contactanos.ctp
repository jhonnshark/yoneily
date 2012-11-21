<style type="text/css">
#contenido{
	background-color: #ffffff;
	z-index: 2;
	-webkit-border-radius: 7px;
	-moz-border-radius: 7px;
	border-radius: 7px;
}

</style>


<div id="contenido">
	<img src="<?php echo $html->url('/',true)?>/images/contacto11.png" height="140" width="260" style="z-index:2;"/>

<table style="margin-left:30px;">
	<tr>
		<td>

			<fieldset class="contactos">
				<?php
					echo $form->create('Page');
					
				?>
				<table border="0"  >
		           <tr>
		                <td class="" width="220"><b>Email:</b></td>
		                <td><font color="red"><?php echo $this->Form->input('correo', array("label" => false, "class" => "","required" => "email")); ?></font><b><br></td>
		            </tr>         
		            <tr>
		                <td class="" style=""><b>Nombre Completo:</b></td>
		                <td><font color="red"><?php echo $this->Form->input('nombre', array("label" => false, "class" => "",'maxlength'=>'50',"required" => "required")); ?></font><br></td>
		            
		             <tr>
		                <td class="" ><b>Tel&eacute;fono:</b></td>
		                <td><font color="red"><?php echo $this->Form->input('codi',array("class"=>"","label"=>false,"div"=>false,"options" => array($cod),"empty"=>"----"));?><?php echo $this->Form->input('telefono', array("label" => false, "class" => "telefono","div"=>false,"error" => true,"maxlength"=>7,"required" => "required")); ?></font><br></td>
		            </tr>
		             
		            <tr>
		                <td style="" class=""><b>Sexo:</b></td>
		                <td align="rigth"><b>
		                           <?php
		                            $options=array('M'=>'Masculino','F'=>'Femenino');
		                            $attributes=array('legend'=>false,'class'=>'');
		                           echo $form->radio('sexo',$options,$attributes);
									?>
		                </b><br></td>
		            </tr>
		            <tr>
		                <td class=""><b>Pa&iacute;s:</b></td>
		                <td><font color="red">
		                           <?php
		                                  echo $this->Form->input('pais',array("type"=>"text", "class" => "","id"=>"RegisterPais","label"=>false));
		                           ?>
		                </font><br></td>
		            </tr>
		            <tr>
		                <td class=""><b>Tipo Mensaje:</b></td>
		                <td><b>
		                           <?php
		                            $options=array('1'=>'Publico','2'=>'Privado');
		                            $attributes=array('legend'=>false,'class'=>'');
		                           echo $form->radio('tipo_mensaje',$options,$attributes);
									?>
		                </b><br></td>
		            </tr>
		            <tr id="stado">
		                <td class=""><b>Comentario:</b></td>
		               <td><font color="red">
		                                  <?php

		                                    echo $this->Form->input('comentario',array("label"=>false,"class"=>"", "type"=>"textarea",'maxlength'=>'150'));
		                                  ?>
		               </font><br></td>
		            </tr>
					<?php $fecha= date("d-m-Y H:i:s");
					echo $this->Form->input('fecha',array("label"=>false, "value"=>"$fecha", "type"=>"hidden"));
					?>
		            <tr>

		                <td colspan="2" style="text-align: center;"><?php echo $this->Form->submit('Aceptar',array('class' => '	', 'title' => 'Custom Title')); ?><br></td>
		            </tr>

		            </table>
			</fieldset>
		</div>	
		</td>
			<td>
			
			<div id="dialog-modal" style="display:none;background-color:white;margin-top:10px;"></div>	
			</td></tr></table>
		</div>
</div>





