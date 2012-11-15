
<div style="margin-top:30px;" align="center">
<center>
<table class="formpequeno">
<tr>
<?php if($session->read('Auth.User.groups_idgrupos')==1){ ?>
<td style="margin-left:100px;height:190px;width:180px;">
<center><a href="<?php echo $html->url('/')?>users/add" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/users_add.png" height=80 /></center>
</td>
<?php }?>
<td style="margin-left:100px;height:190px;width:180px;">
<center>
<a href="<?php echo $html->url('/')?>registers/add_cliente" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/registers_add.png" height=80 />
</center>
</td>
<td style="margin-left:100px;height:190px;width:180px;">
<center>
<a href="<?php echo $html->url('/')?>galleries/add" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/galleries_add.png" height=80 />
</center>
</td>
<td style="margin-left:100px;height:190px;width:180px;">
<center><a href="<?php echo $html->url('/')?>promos/add" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/promos_add.png" height=80 /></a></center>
</td>
</tr>

<tr>
<td style="margin-left:100px;height:190px;width:180px;">
<center><a href="<?php echo $html->url('/')?>users/ayuda" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/ayuda.png" height=80 /></center>
</td>
<td style="margin-left:100px;height:190px;width:180px;">
<center>
<a href="<?php echo $html->url('/')?>files/manual/manual.pdf" target="_blank" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/manual.png" height=80 />
</center>
</td>
<?php if($session->read('Auth.User.groups_idgrupos')==1){ ?>
<td style="margin-left:100px;height:190px;width:180px;">
<center>
<a href="<?php echo $html->url('/')?>/files/manual/mysqldump.php" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/respaldo.png" height=80 />
</center>
</td>
<?php }?>
<td style="margin-left:100px;height:190px;width:180px;">
<center><a href="<?php echo $html->url('/')?>users/logout" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/salir.png" height=80 /></a></center>
</td>
</tr>

</table>
</center>

</div>
