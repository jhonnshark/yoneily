Bienvenid@, <?php echo $User['User']['nombres']. ' ' . $User['User']['apellidos'] ?>,
Para registrar tu grupo y crear tu lipdub debes confirmar tu correo copia
y pega este link en tu navegador

<?php echo $html->url('/users/confirmar/'. md5($User['User']['idusers']), true); ?>
