<?php $url_comfirm = $html->url('/users/confirmar/'. md5($User['User']['idusers']), true);?>
Bienvenid@, <?php echo $User['User']['nombres']. ' ' . $User['User']['apellidos'] ?>,<br/>
Para registrar tu grupo y crear tu lipdub debes confirmar tu correo haciendo<br/>
clic <a href="<?php echo $url_comfirm; ?>" target="_blank">aquí</a><br/><br/>
Si tienes problemas con el link copia y pega el siguiente en tu navegador<br/>
<a href="<?php echo $url_comfirm; ?>" target="_blank"><?php echo $url_comfirm; ?></a>