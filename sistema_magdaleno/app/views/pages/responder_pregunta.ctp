<style type="text/css">
span{margin-left: -40%;}
hr{color: blue; margin-top: 20px;}
</style>
<center><img src="<?php echo $html->url('/',true)?>/img/ayuda.png" style="height:110px;" /><br/>

</center>
<div class='capa'>
	<tr><td colspan="10" style="padding:0px; margin:0px;">
        <center>
         <div class="titulo_barra"><h2>Comentarios</h2></div>
     </center>
        </td>
    </tr>
    <br/>
<p style="">
<?php
$sexo=$info[0]['Page']['sexo'];
if($sexo=='M'){ ?>
<img src="<?php echo $html->url('/',true)?>/procesos/hombre.gif">
<?php }else if($sexo=='F'){?>
<img src="<?php echo $html->url('/',true)?>/procesos/mujer.gif">
<?php }?>
<font color="navy"><b><?php echo $info[0]['Page']['nombre'].'</font> <font color=black>al '.$info[0]['Page']['fecha'].'</font></b></font><br/><br/><font color=black><span><b> dice: </b>'; ?><?php echo $info[0]['Page']['comentario'].'</span></font>'; ?>
</p>				
<hr />
<?php //pr($info); ?>
		<?php echo $form->create('Page',array('controller'=>'pages','action'=>'registro_respuesta'));?>

		<?php
			if(!empty($info[0]['Page']['promocion_id_promo'])){
				echo $this->Form->input('promocion_id_promo',array("label"=>false, "value"=>$info[0]['Page']['promocion_id_promo'], "type"=>"hidden"));
			}else if(!empty($info[0]['Page']['galerias_id_galeria'])){
				echo $this->Form->input('galerias_id_galeria',array("label"=>false, "value"=>$info[0]['Page']['galerias_id_galeria'], "type"=>"hidden"));
			}
			echo $this->Form->input('local',array("label"=>false, "value"=>$info[0]['Page']['locale_id_local'], "type"=>"hidden"));
			echo $form->input('usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
			echo $form->input('register_idregistro', array('type'=>'hidden','value'=>$info[0]['Register']['idregistro']));
			
			echo $form->input('id_respuesta', array('type'=>'hidden','value'=>$info[0]['Page']['id_page']));
		?>
		
           <tr><br/>
                <td ><font color="navy" size="3"><b>Respuesta:</b></font></td>
                <td><font color="red"><?php echo $this->Form->input('comentario', array("label" => false, "size" => "40",'type'=>'textarea')); ?></font></td>
			<?php $fecha1= date("d-m-Y H:i:s");
			echo $this->Form->input('fecha',array("label"=>false, "value"=>"$fecha1", "type"=>"hidden"));
			?>
			</tr>
			<tr>
                <td><center><br/><?php echo $this->Form->submit('Responder'); ?><br/><center></td>
            </tr>
		</div>

</center>