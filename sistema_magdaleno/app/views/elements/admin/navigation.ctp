<div class="row-1">
  	<div class="main">
       	<div class="container_12">
          	<div class="grid_12">
               	<nav>
                    <ul class="menu">
                        <li class="active"><?php echo $html->link('Principal', array('class' => '','controller' => 'pages', 'action' => 'home'), array('class' => 'active')); ?></li>
                        <li><?php echo $html->link('Quienes Somos', array('controller' => 'pages', 'action' => 'quienes')); ?></li>
                        <li><?php echo $html->link('Contactanos', array('controller' => 'pages', 'action' => 'contactanos')); ?></li>
                        <li><?php echo $html->link('Promociones', array('controller' => 'pages', 'action' => 'promociones')); ?></li>
                        <li><?php echo $html->link('Productos', array('controller' => 'pages', 'action' => 'productos')); ?></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>