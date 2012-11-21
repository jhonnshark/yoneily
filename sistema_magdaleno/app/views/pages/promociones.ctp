<div style="background-color:#ffffff;min-height:450px;">
<!--.::PROMOCIONES DE PRODUCTOS -->
<?php if(!empty($promociones)){?>
<center><br>
<table><tr>
<td>
<font color="black" face="arial" size="4"><b> | Resultados Promociones Encontradas | </b></font>
</td>
</tr></table>
<hr />
<table style="width:650px;margin-top:15px;">
<?php for ($i=0; $i<((count($promociones))); $i++) {  ?>
<tr >
<!-- PRIMERA FOTO -->
<td>
		<?php if(($i)<count($promociones)){ ?>
		<div style="width:190px;">
			<center><a href="<?php echo $html->url('/',true)?>pages/detallepublicidad/<?php echo $promociones[$i][0]['fecha']."/".$promociones[$i]['Promo']['url']; ?>" ><img src="<?php echo $html->url('/')?>files/promos/thumbnails/<?php echo $promociones[$i]['Promo']['thumbnails'];?>" style="margin-bottom:5px;height:100px;width:200px;" ></a></center>
			<br /><center>
			<font color="red">
				<b><?php echo $promociones[$i]['Promo']['texto_promo'];?><br/></b>
			</font>
			<font color="black">
			<b><?php echo $promociones[$i]['Promo']['precio']." Bs.F";?></b>
			</font>
			</center>
		</div>
		<?php }else{  } ?>
</td>		
<!-- SEGUNDA FOTO -->
<td>
		<?php if(($i+1)<count($promociones)){ ?>
		<div style="width:190px;">
			<center><a href="<?php $i++; echo $html->url('/',true)?>pages/detallepublicidad/<?php echo $promociones[$i][0]['fecha']."/".$promociones[$i]['Promo']['url']; ?>" ><img src="<?php echo $html->url('/')?>files/promos/thumbnails/<?php echo $promociones[$i]['Promo']['thumbnails'];?>" style="margin-bottom:5px;height:100px;width:200px;" ></a></center>
			<br /><center>
			<font color="red">
				<b><?php echo $promociones[$i]['Promo']['texto_promo'];?><br/></b>
			</font>
			<font color="black">
			<b><?php echo $promociones[$i]['Promo']['precio']." Bs.F";?></b>
			</font>
			</center>
		</div>
		<?php }else{  } ?>
</td>		
<!-- TERCERA FOTO -->
<td>
		<?php if(($i+1)<count($promociones)){ ?>
		<div style="width:190px;">
			<center><a href="<?php $i++; echo $html->url('/',true)?>pages/detallepublicidad/<?php echo $promociones[$i][0]['fecha']."/".$promociones[$i]['Promo']['url']; ?>" ><img src="<?php echo $html->url('/')?>files/promos/thumbnails/<?php echo $promociones[$i]['Promo']['thumbnails'];?>" style="margin-bottom:5px;height:100px;width:200px;" ></a></center>
			<br /><center>
			<font color="red">
				<b><?php echo $promociones[$i]['Promo']['texto_promo'];?><br/></b>
			</font>
			<font color="black">
			<b><?php echo $promociones[$i]['Promo']['precio']." Bs.F";?></b>
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