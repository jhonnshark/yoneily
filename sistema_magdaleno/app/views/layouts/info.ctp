<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Sistema de Muebles de Magdaleno'); ?>
	</title>
	<?php
		echo $this->Html->css('nuevo');                 
	?>
</head>
<body>	
	<?php echo $content_for_layout; ?>    	
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>