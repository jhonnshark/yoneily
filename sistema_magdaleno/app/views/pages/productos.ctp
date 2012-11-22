<div id="promocion">
<div style="">
<!--.::GALERIA DE PRODUCTOS -->
<?php if(!empty($galerias)){?>
<center><br>
<table><tr>
<td>
<font color="black" face="arial" size="4"><b> | Resultados de Productos Encontrados | </b></font>
</td>
</tr></table>
<hr />
<table style="width:700px;margin-top:15px;">
<?php for ($i=0; $i<((count($galerias))); $i++) {  ?>
<tr>
<!-- PRIMERA FOTO -->
<td>
		<?php if(($i)<count($galerias)){ ?>
		<div style="width:190px;">
			<center><a href="<?php echo $html->url('/',true)?>pages/detallegaleria/<?php echo $galerias[$i][0]['fecha']."/".$galerias[$i]['Gallery']['url']; ?>" ><img src="<?php echo $html->url('/')?>files/galeria/thumbnails/<?php echo $galerias[$i]['Gallery']['thumbnails'];?>" style="margin-bottom:5px;height:100px;width:100px;" ></a></center>
			<br /><center>
			<font color="red">
				<b><?php echo $galerias[$i]['Gallery']['texto_galeria'];?><br/></b>
			</font>
			<font color="black">
				<b><?php echo $galerias[$i]['Gallery']['precio']." Bs.F";?></b>
			</font>
			</center>
		</div>
		<?php }else{  } ?>
</td>		
<!-- SEGUNDA FOTO -->
<td>
		<?php if(($i+1)<count($galerias)){ ?>
		<div style="width:190px;">
			<center><a href="<?php $i++; echo $html->url('/',true)?>pages/detallegaleria/<?php echo $galerias[$i][0]['fecha']."/".$galerias[$i]['Gallery']['url']; ?>" ><img src="<?php echo $html->url('/')?>files/galeria/thumbnails/<?php echo $galerias[$i]['Gallery']['thumbnails'];?>" style="margin-bottom:5px;height:100px;width:100px;" ></a></center>
			<br /><center>
			<font color="red">
				<b><?php echo $galerias[$i]['Gallery']['texto_galeria'];?><br/></b>
			</font>
			<font color="black">
				<b><?php echo $galerias[$i]['Gallery']['precio']." Bs.F";?></b>
			</font>
			</center>
		</div>
		<?php }else{  } ?>
</td>		
<!-- TERCERA FOTO -->
<td>
		<?php if(($i+1)<count($galerias)){ ?>
		<div style="width:190px;">
			<center><a href="<?php $i++; echo $html->url('/',true)?>pages/detallegaleria/<?php echo $galerias[$i][0]['fecha']."/".$galerias[$i]['Gallery']['url']; ?>" ><img src="<?php echo $html->url('/')?>files/galeria/thumbnails/<?php echo $galerias[$i]['Gallery']['thumbnails'];?>" style="margin-bottom:5px;height:100px;width:100px;" ></a></center>
			<br /><center>
			<font color="red">
				<b><?php echo $galerias[$i]['Gallery']['texto_galeria'];?><br/></b>
			</font>
			<font color="black">
				<b><?php echo $galerias[$i]['Gallery']['precio']." Bs.F";?></b>
			</font>
			</center>
		</div>
		<?php }else{  } ?>
</td>
<!-- CUARTA FOTO -->
<td>
		<?php if(($i+1)<count($galerias)){ ?>
		<div style="width:190px;">
			<center><a href="<?php $i++; echo $html->url('/',true)?>pages/detallegaleria/<?php echo $galerias[$i][0]['fecha']."/".$galerias[$i]['Gallery']['url']; ?>" ><img src="<?php echo $html->url('/')?>files/galeria/thumbnails/<?php echo $galerias[$i]['Gallery']['thumbnails'];?>" style="margin-bottom:5px;height:100px;width:100px;" ></a></center>
			<br /><center>
			<font color="red">
				<b><?php echo $galerias[$i]['Gallery']['texto_galeria'];?><br/></b>
			</font>
			<font color="black">
				<b><?php echo $galerias[$i]['Gallery']['precio']." Bs.F";?></b>
			</font>
			</center>
		</div>
		<?php }else{  } ?>
</td>
</tr>
<?php }?>
</table>
</center>
<?php }?>

</div>
</div>