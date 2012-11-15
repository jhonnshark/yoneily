<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //__('Backend equilibrio:'); ?>
		<?php echo $parchivos[0]["Pagina"]["titulo"] ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('nuevo');

		echo $scripts_for_layout;
                             
	?>
    <style>
        body
        {
            background-color: <?php echo $parchivos[0]["Pagina"]["fondo"] ?>;
        }
    </style>
     <?php echo $javascript->link(array('swfobject'));?>
</head>
<body>
	<div id="container">		
		<div id="content" align="center">
			<?php echo $content_for_layout; ?>                  
		</div>		
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>