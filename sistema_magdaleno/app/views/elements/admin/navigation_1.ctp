<div id="nav" >
    <ul class="menu">

        <li class="top">
            <a href="<?php echo $html->url('../users/home'); ?>" class="top_link"><?php __('Principal'); ?></a>
        </li>


		<li class="top">
            <a href="#" class="top_link"><?php __('Compras'); ?></a>
            <ul class="sub">
                <li><?php echo $html->link(__('Lista', true), array('plugin' => 0, 'controller' => 'registers', 'action' => 'index_compras'), array('escape' => false)); ?></li>
            </ul>
        </li>
        

        <li class="top">
            <a href="#" class="top_link"><?php __('Multimedia'); ?></a>
            <ul class="sub">
				<li>
                    <?php echo $html->link(__('Promociones', true), array('plugin' => 0, 'controller' => 'promos', 'action' => 'index'), array('escape' => false)); ?>
                    <ul class="sub">
                        <li><?php echo $html->link(__('Lista', true), array('plugin' => 0, 'controller' => 'promos', 'action' => 'index'), array('escape' => false)); ?></li>
                        <li><?php echo $html->link(__('Agregar', true), array('plugin' => 0, 'controller' => 'promos', 'action' => 'add'), array('class' => 'separator', 'escape' => false)); ?></li>
                     
                    </ul>
                </li>
				<li>
                    <?php echo $html->link(__('Productos', true), array('plugin' => 0, 'controller' => 'galleries', 'action' => 'index'), array('escape' => false)); ?>
                    <ul class="sub">
                        <li><?php echo $html->link(__('Lista', true), array('plugin' => 0, 'controller' => 'galleries', 'action' => 'index'), array('escape' => false)); ?></li>
                        <li><?php echo $html->link(__('Agregar', true), array('plugin' => 0, 'controller' => 'galleries', 'action' => 'add'), array('class' => 'separator', 'escape' => false)); ?></li>
                     
                    </ul>
                </li>
				
			</ul>
        </li>

        <li class="top">
            <a href="#" class="top_link"><?php __('Contactos'); ?></a>
            <ul class="sub">
                <li><?php echo $html->link(__('Preguntas', true), array('plugin' => 0, 'controller' => 'pages', 'action' => 'index_preguntas'), array('escape' => false)); ?></li>
                <li><?php echo $html->link(__('Reclamos', true), array('plugin' => 0, 'controller' => 'denuncias', 'action' => 'index'), array('escape' => false)); ?></li>
            </ul>
        </li>

        <li class="top">
            <a href="#" class="top_link"><?php __('Registros'); ?></a>
            <ul class="sub">
                <li><?php echo $html->link(__('Usuarios', true), array('plugin' => 0, 'controller' => 'users', 'action' => 'index1'), array('escape' => false)); ?>
					<ul class="sub">
                        <li><?php echo $html->link(__('Agregar', true), array('plugin' => 0, 'controller' => 'users', 'action' => 'add'), array('class' => 'separator', 'escape' => false)); ?></li>
						<li><?php echo $html->link(__('Lista', true), array('plugin' => 0, 'controller' => 'users', 'action' => 'index1'), array('escape' => false)); ?></li>
                    </ul>
				</li>
				<li><?php echo $html->link(__('Clientes', true), array('plugin' => 0, 'controller' => 'registers', 'action' => 'index'), array('escape' => false)); ?>
					<ul class="sub">
                        <li><?php echo $html->link(__('Agregar', true), array('plugin' => 0, 'controller' => 'registers', 'action' => 'add_cliente'), array('class' => 'separator', 'escape' => false)); ?></li>
						<li><?php echo $html->link(__('Lista', true), array('plugin' => 0, 'controller' => 'registers', 'action' => 'index'), array('escape' => false)); ?></li>
                    </ul>
				</li>
				<li><?php echo $html->link(__('Locales', true), array('plugin' => 0, 'controller' => 'locales', 'action' => 'index'), array('escape' => false)); ?>
					<ul class="sub">
                        <li><?php echo $html->link(__('Agregar', true), array('plugin' => 0, 'controller' => 'locales', 'action' => 'add'), array('class' => 'separator', 'escape' => false)); ?></li>
						<li><?php echo $html->link(__('Lista', true), array('plugin' => 0, 'controller' => 'locales', 'action' => 'index'), array('escape' => false)); ?></li>
                    </ul>
				</li>
            </ul>
        </li>

        <li class="top">
            <a href="#" class="top_link"><?php __('Inventario'); ?></a>
            <ul class="sub">
                <li><?php echo $html->link(__('Existencia', true), array('plugin' => 0, 'controller' => 'pages', 'action' => 'existencia'), array('escape' => false)); ?></li>
                <li><?php echo $html->link(__('Agotados', true), array('plugin' => 0, 'controller' => 'pages', 'action' => 'agotados'), array('escape' => false)); ?></li>
            </ul>
        </li>
    </ul>
</div>
