
<div style="margin-top:30px;" align="center">
<center>
<table class="formpequeno">
<tr>
<?php if($session->read('Auth.User.groups_idgrupos')==1){ ?>
<td style="padding-top:60px;margin-left:100px;height:190px;width:180px;">
<center><a href="<?php echo $html->url('/')?>users/add" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/users_add.png" height=80 title="Regístrar Usuarios" alt="Regístrar Usuarios"/>
</center><center>Regístrar Usuarios</center></a>
</td>
<?php }?>
<td style="padding-top:60px;margin-left:100px;height:190px;width:180px;">
<center>
<a href="<?php echo $html->url('/')?>registers/add_cliente" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/registers_add.png" height=80 title="Regístrar Clientes" alt="Regístrar Clientes"/> 
</center><center>Regístrar Clientes</center>
</td>
<td style="margin-left:100px;height:190px;width:180px;">
<center>
<a href="<?php echo $html->url('/')?>galleries/add" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/galleries_add.png" height=80 title="Regístrar Productos" alt="Regístrar Productos"/>
</center><center>Regístrar Productos</center>
</td>
<td style="margin-left:100px;height:190px;width:180px;">
<center><a href="<?php echo $html->url('/')?>promos/add" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/promos_add.png" height=80 title="Regístrar Promoción" alt="Regístrar Promoción"/>
</center><center>Regístrar Promoción</center>
</td>
</tr>

<tr>
<td style="padding-top:60px;margin-left:100px;height:190px;width:180px;">
<center><a href="<?php echo $html->url('/')?>users/ayuda" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/ayuda.png" height=80 title="Soporte de Ayuda" alt="Soporte de Ayuda"/>
</center><center>Soporte de Ayuda</center>
</td>
<td style="margin-left:100px;height:190px;width:180px;">
<center>
<a href="<?php echo $html->url('/')?>files/manual/manual.pdf" target="_blank" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/manual.png" height=80 title="Manua de Usuario" alt="Manua de Usuario"/>
</center><center>Manual de Usuario</center>
</td>
<?php if($session->read('Auth.User.groups_idgrupos')==1){ ?>
<td style="margin-left:100px;height:190px;width:180px;">
<center>
<a href="<?php echo $html->url('/')?>/files/manual/mysqldump.php" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/respaldo.png" height=80 title="Respaldo BD" alt="Respaldo BD"/>
</center><center>Respaldo BD</center>
</td>
<?php }?>
<td style="margin-left:100px;height:190px;width:180px;">
<center><a href="<?php echo $html->url('/')?>users/logout" style="text-decoration:none;"><img src="<?php echo $html->url('/',true)?>/procesos/salir.png" height=80 title="Cerrar Sección" alt="Cerrar Sección"/>
</center><center>Cerrar Sección</center>
</td>
</tr>

</table>
</center>

</div>
