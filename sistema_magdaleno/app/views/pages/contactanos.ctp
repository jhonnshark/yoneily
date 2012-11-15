<script type="text/javascript">
	$('document').ready(function(){
		$("#dialog-modal").show(function(){
			$.ajax({
                type: "POST",
                url: "<?php echo $html->url('/',true)?>pages/info/",
                success: function(data){
				//alert(data);
					if(data!=0){
					
						var url = '<?php echo $html->url('/',true)?>pages/info/';
						var d = $('#dialog-modal').html('<iframe width="356" height="370" id="ifrm" ></iframe>');
						$("#dialog-modal>#ifrm").attr("src", url);
					}else{
						$("#dialog-modal").hide();
					}
                }
            });
        });
	});
</script><br><br><br>
<center>
		<div class="post1">
		<table><tr><td>
			<div style="margin-left:0px;">
			
			<h1><font color="navy">Contactanos</font></h1>
			<fieldset class="contactos">
		<?php
			echo $form->create('Page');
			
		?>
		<table border="0" class="regtable" style="margin-left:20px;">
           <tr>
                <td class="capti"><font color="navy" size="3"><b>Email:</b></font></td>
                <td><font color="red"><?php echo $this->Form->input('correo', array("label" => false, "class" => "otro_input")); ?></font></td>
            </tr>         
            <tr>
                <td class="capti par" style="background-color: #ececec;"><font color="navy" size="3"><b>Nombre Completo:</b></font></td>
                <td><font color="red"><?php echo $this->Form->input('nombre', array("label" => false, "class" => "otro_input",'maxlength'=>'50')); ?></font></td>
            
             <tr>
                <td class="capti par" ><font color="navy" size="3"><b>Tel&eacute;fono:</b></font></td>
                <td><font color="red"><?php echo $this->Form->input('codi',array("class"=>"codigo","label"=>false,"div"=>false,"options" => array($cod),"empty"=>"----"));?><?php echo $this->Form->input('telefono', array("label" => false, "class" => "telefono","div"=>false,"error" => true,"maxlength"=>7)); ?></font></td>
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
                <td class="capti"><font color="navy" size="3"><b>Comentario:</b></font></td>
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
			</div>	
			</td>
			<td>
			
			<div id="dialog-modal" style="display:none;background-color:white;margin-top:10px;"></div>	
			</td></tr></table>
		</div>	



<!-- Start demo FOTOS-->
	<div class="demo" style="margin-top:5px;margin-left:1px; width:783px; margin-bottom:150px;">
	
	<div class="scroll-pane ui-widget ui-widget-header ui-corner-all">
	<!--<div class="imgtwit">
		<img alt="eve" src="<?php //echo $html->url('/')?>images/imagenes.png"/>
	</div>-->
	<span id="toolTipBox"> </span>
		<div class="scroll-content">
		
		<?php for($j=0;$j<$cont_galeria;$j++){ ?>
			<div class="scroll-content-item ui-widget-header">
			 
			<a href="<?php echo $html->url('/',true)?>pages/detallegaleria/<?php echo $gal[$j][0]['fecha']."/".$gal[$j]['Gallery']['url']; ?>" ><img src="<?php echo $html->url('/')?>files/galeria/thumbnails/<?php echo $gal[$j]['Gallery']['thumbnails'];?>" style="margin-bottom:5px;height:100px;width:100px;"  onmouseover="toolTip('<?php echo $gal[$j]['Gallery']['texto_galeria']; ?>',this)"></a>
			</div>
			
		<?php }
		 //pr($gal);
		?>
		</div>
		<div class="scroll-bar-wrap ui-widget-content ui-corner-bottom">
			<div class="scroll-bar"></div>
		</div>
	</div>
	</div><!-- End demo -->
	</center>
