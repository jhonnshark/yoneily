<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Backend Sistema Magdaleno:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

		echo $scripts_for_layout;
                             
	?>
	<script type="text/javascript" src="<?php echo $html->url('/')?>js/tooltic.js"></script>
    <?php echo $javascript->link(array('jquery-1.4.2.min','jquery-ui-1.8.5.custom.min','prueba','tiny_mce/tiny_mce.js','farbtastic','jquery.counter-1.0','jquery.floatingbox','jquery.validate'));?>
    <?php echo $html->css(array('main','jquery-ui-1.8.5.custom','nuevo_admin'));?>
       
</head>
<body>
<center>
	<div class="sesion" style="margin-top:-8px;">
		<div id="header" style="margin-top:-5px;">
			
		</div>
			
	</div>

	<div id="container">
	<center>
		<?php if($session->read('Auth.User.groups_idgrupos')==1){ ?>
			<center><div class="cflogo_up_menu"><?php echo $this->element("admin/navigation_1"); ?></div></center>
		<?php }?>
		<?php if($session->read('Auth.User.groups_idgrupos')==2){ ?>
			<center><div class="cflogo_up_menu"><?php echo $this->element("admin/navigation_vendedor"); ?></div></center>
		<?php }?>
	</center>
		<div id="content">
			<?php if($session->read('Auth.User.groups_idgrupos')==1){ ?>
				<div style="text-align:right;width:770px;">
					<font color="black" size="4" style="margin-top:10px;"><b><!--<img src="<?php echo $html->url('/',true)?>img/usuario.gif" style="margin-left:5px;width:13px;" />-->
					<?php echo "<font color=red>Administrador (a): </font> ".$session->read('Auth.User.perfil_usuario'); ?>&nbsp;&nbsp;</b></font>
					<a href="<?php echo $html->url('/')?>users/logout"><img src="<?php echo $html->url('/',true)?>procesos/cerrarsesion.png" style="margin-left:15px;width:103px;" /></a>
				
				</div>
			<?php }?>
			<?php if($session->read('Auth.User.groups_idgrupos')==2){ ?>
				<div style="text-align:right;width:770px;">
					<font color="black" size="4" style="margin-top:10px;"><b><!--<img src="<?php echo $html->url('/',true)?>img/usuario.gif" style="margin-left:5px;width:13px;" />-->
					<?php echo "<font color=red>Vendedor (a): </font> ".$session->read('Auth.User.perfil_usuario'); ?>&nbsp;&nbsp;</b></font>
					<a href="<?php echo $html->url('/')?>users/logout"><img src="<?php echo $html->url('/',true)?>procesos/cerrarsesion.png" style="margin-left:15px;width:103px;" /></a>
				
				</div>
			<?php }?>
			<div style="width:770px;">
				<?php echo $this->Session->flash(); ?><br />
			</div>

			<?php echo $content_for_layout; ?>

                       <?php echo $session->flash('auth');?>

		</div>
		
	</div>
	<div id="footer">
			<p><font color="black"><b>Siguenos en nugdfgfdgestras Redes Sociales</b></font><br>
				<a href="https://www.facebook.com/ElPuntoArtesanalDeMagdaleno?ref=hl" target="_blank" alt="Facebook" style="margin-top:-20px;"><img src="<?php echo $html->url('/',true)?>/images/facebook.png" width="50" height="50" onmouseover="toolTip(' Facebook ',this)" /></a>
				<a href="https://twitter.com/yoneylith" alt="Twitter" target="_blank" ><img src="<?php echo $html->url('/',true)?>/images/twitter.png" width="50" height="50" onmouseover="toolTip(' Twitter ',this)"/></a>
			</p>
			</div>
</center>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>