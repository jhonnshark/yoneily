<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	
	<title>
		<?php __('Sistema de Muebles de Magdaleno'); ?>
	</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $html->url('/')?>favicon/logo.ico">
        <script src="<?php echo $html->url('/')?>js/jquery-1.4.2.min.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/')?>js/jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script>
		
		<script src="<?php echo $html->url('/')?>js/roundabout_shapes.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/')?>js/scripts.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/')?>js/ajax.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo $html->url('/')?>js/tooltic.js"></script>
	<?php
		echo $this->Html->css('nuevo');                 
	?>
</head>
<body>	
	<?php echo $content_for_layout; ?>    	
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>