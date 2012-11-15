<?php
//pr($info);

?>
<div align="left" style="margin-left:0px;">
<?php for($j=0;$j<$cont;$j++){ ?>
<fieldset class="comentario" style="width:610px;">
<p style="width:610px;">
<?php
$sexo=$info[$j]['Page']['sexo'];
if($sexo=='M'){ ?>
<img src="<?php echo $html->url('/',true)?>/procesos/hombre.gif">
<font color="navy"><b><?php echo $info[$j]['Page']['nombre'].'</font> <font color=black>al '.$info[$j]['Page']['fecha'].'</font></b></font><font color=black><b> dice: </b>'; ?><?php echo $info[$j]['Page']['comentario'].'</font>'; ?>
<?php }else if($sexo=='F'){?>
<img src="<?php echo $html->url('/',true)?>/procesos/mujer.gif">
<font color="navy"><b><?php echo $info[$j]['Page']['nombre'].'</font> <font color=black>al '.$info[$j]['Page']['fecha'].'</font></b></font><font color=black><b> dice: </b>'; ?><?php echo $info[$j]['Page']['comentario'].'</font>'; ?>
<?php }else{?>
<font color="navy"><b>Vendedor: <?php echo '</font> <font color=black>al '.$info[$j]['Page']['fecha'].'</font></b></font><font color=black><b> dice: </b>'; ?><?php echo $info[$j]['Page']['comentario'].'</font>'; ?>
<?php }?>

</p>	
</fieldset>				
<?php } ?>
</div>