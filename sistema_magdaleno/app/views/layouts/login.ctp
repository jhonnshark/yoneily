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
    <?php echo $javascript->link(array('jquery-1.4.2.min','jquery-ui-1.8.5.custom.min','prueba','tiny_mce/tiny_mce.js','farbtastic','jquery.counter-1.0','jquery.floatingbox'));?>
    <?php echo $html->css(array('main','jquery-ui-1.8.5.custom','nuevo_admin'));?>
       
</head>
<body>
<center>
	<div class="sesion" style="margin-top:-8px;">
		
		<div id="header" style="margin-top:-5px;">
			
		</div>
			
	</div>

	<div id="container">
		<div id="content_login">

			<div style="width:770px;">
				<?php echo $this->Session->flash(); ?><br />
			</div>

			<?php echo $content_for_layout; ?>

                       <?php echo $session->flash('auth');?>

		</div>
		<div id="footer">
		<span id="toolTipBox"> </span>
		<p><font color="black"><b>Siguenos en nuestras Redes Sociales</b></font><br>
			<a href="#" alt="Facebook"  style="margin-top:-20px;"><img src="<?php echo $html->url('/',true)?>/images/facebook.png" width="50" height="50" onmouseover="toolTip(' Facebook ',this)" /></a>
			<a href="#" alt="Twitter" ><img src="<?php echo $html->url('/',true)?>/images/twitter.png" width="50" height="50" onmouseover="toolTip(' Twitter ',this)"/></a>
		</p>
		</div>
	</div>
</center>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>