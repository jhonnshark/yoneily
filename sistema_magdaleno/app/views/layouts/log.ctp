<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Muebles de Magdaleno:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

		echo $scripts_for_layout;

	?>
	
    <?php echo $javascript->link(array('jquery-1.4.2.min','jquery-ui-1.8.5.custom.min','jquery.bgiframe','jquery.dimensions','jquery.colorbox.js','jquery.validate'));?>
    <?php echo $html->css(array('jquery-ui-1.8.5.custom','jquery-ui-1.8.9.custom','registro','jquery.tooltip'));?>
    <script type="text/javascript">

 </script>
</head>
    <body style="background-color: white; width:400px;">
		<center>
		<?php echo $this->Session->flash(); ?>
        <?php echo $content_for_layout; ?>
		</center>
        <?php echo $this->element('sql_dump'); ?>
	</body>
</html>