	<!-- begin navigation -->
	<nav id="navigation">
		<ul>
			<li><?php echo $html->link('Principal', array('controller' => 'pages', 'action' => 'home')); ?></li>
			<li><?php echo $html->link('Quienes Somos', array('controller' => 'pages', 'action' => 'quienes')); ?></li>
			<li><?php echo $html->link('Contactanos', array('controller' => 'pages', 'action' => 'contactanos')); ?></li>
			<li><?php echo $html->link('Promociones', array('controller' => 'pages', 'action' => 'promociones')); ?></li>
			<li><?php echo $html->link('Productos', array('controller' => 'pages', 'action' => 'productos')); ?></li>
			
		</ul>
	</nav>
	<!-- end navigation -->