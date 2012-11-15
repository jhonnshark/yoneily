<div style="margin-top:0px;margin-left:0px;background-color:#ffffff;">
<?php if(!empty($locales)){?>
<center>

<table style="width:200px;margin-top:15px;">
<?php for ($i=0; $i<((count($locales))); $i++) {  ?>
<tr>
<!-- PRIMERA FOTO -->
<td>
		<?php if(($i)<count($locales)){ ?>
		<div style="width:190px;">
			<center><img src="<?php echo $html->url('/')?>files/locales/thumbnails/<?php echo $locales[$i]['Locale']['nombre_file'];?>" style="margin-bottom:5px;height:80px;width:100px;" ></center>
			<br /><center>
			<font color="black"><b>
			<?php echo $locales[$i]['Locale']['nombre_empresa'];?><br/>
			<?php echo $locales[$i]['Locale']['telefono_cel'];?><br/>
			</b></font>
			<font color="blue">
				<b><?php echo $locales[$i]['Locale']['correo'];?></b>
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

<!--.::GALERIA DE PRODUCTOS -->
<?php if(!empty($galerias)){?>
<center><br>
<table><tr>
<td>
<font color="black" face="arial" size="4"><b> | Resultados Galerias Encontradas | </b></font>
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