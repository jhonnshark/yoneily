<center>
<p style="width:610px;">
<?php
$sexo=$info[0]['Register']['sexo'];
if($sexo=='M'){ ?>
<img src="<?php echo $html->url('/',true)?>/procesos/hombre.gif">
<?php }else if($sexo=='F'){?>
<img src="<?php echo $html->url('/',true)?>/procesos/mujer.gif">
<?php }?>
<font color="navy"><b><?php echo $info[0]['Register']['nombreape'].'</font> <font color=black>al '.$info[0]['Denuncia']['fecha'].'</font></b></font><font color=black><b> dice: </b>'; ?><?php echo $info[0]['Denuncia']['motivo'].'</font>'; ?>
</p>				
<hr />
<?php //pr($info); ?>
		<?php echo $form->create('Denuncia',array('controller'=>'denuncias','action'=>'registro_denuncia'));?>

		<?php
		//echo $info[0]['Denuncia']['promocion_id_promo'];
			if(!empty($info[0]['Denuncia']['promocion_id_promo'])){
				echo $this->Form->input('promocion_id_promo',array("label"=>false, "value"=>$info[0]['Denuncia']['promocion_id_promo'], "type"=>"hidden"));
			}else if(!empty($info[0]['Denuncia']['galeria_id_galeria'])){
				echo $this->Form->input('galeria_id_galeria',array("label"=>false, "value"=>$info[0]['Denuncia']['galeria_id_galeria'], "type"=>"hidden"));
			}
			echo $this->Form->input('local',array("label"=>false, "value"=>$info[0]['Denuncia']['locale_id_local'], "type"=>"hidden"));
			echo $form->input('usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
			echo $form->input('id_respuesta', array('type'=>'hidden','value'=>$info[0]['Denuncia']['id_denuncia']));
		?>
		<table class="formpequeno" align="center">
           <tr>
                <td ><font color="navy" size="3"><b>Respuesta:</b></font></td>
                <td><font color="red"><?php echo $this->Form->input('motivo', array("label" => false, "size" => "40",'type'=>'textarea')); ?></font></td>
			<?php $fecha1= date("d-m-Y H:i:s");
			echo $this->Form->input('fecha',array("label"=>false, "value"=>"$fecha1", "type"=>"hidden"));
			
			?>
			</tr>
		</table>
		<table class="formpequeno">
			<tr>
                <td><center><?php echo $this->Form->submit('Responder'); ?><center></td>
            </tr>

        </table>
</center>