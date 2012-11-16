<?php $user=$session->read('Auth.User.locale_id_local');?>
<div id="nav" >
    <ul class="sf-menu" style="width:828px; background: #00cc66;">
        <li>
            <a href="<?php echo $html->url('../users/home'); ?>"><span class="ui-icon ui-icon-home"></span><?php __('Principal'); ?></a>
        </li>
		<li>
            <a href="#"><span class="ui-icon ui-icon-document"></span><?php __('Compras'); ?></a>
            <ul>
                <li><?php echo $html->link('<span class="ui-icon ui-icon-tag"></span>' . __('Lista', true), array('plugin' => 0, 'controller' => 'registers', 'action' => 'index_compras'), array('escape' => false)); ?></li>
            </ul>
        </li>

        

        <li>
            <a href="#"><span class="ui-icon ui-icon-video"></span><?php __('Multimedia'); ?></a>
            <ul>
				<li>
                    <?php echo $html->link('<span class="ui-icon ui-icon-tag"></span>' . __('Promociones', true), array('plugin' => 0, 'controller' => 'promos', 'action' => 'index'), array('escape' => false)); ?>
                    <ul>
                        <li><?php echo $html->link('<span class="ui-icon ui-icon-plus"></span>' . __('Agregar', true), array('plugin' => 0, 'controller' => 'promos', 'action' => 'add'), array('class' => 'separator', 'escape' => false)); ?></li>
						<li><?php echo $html->link('<span class="ui-icon ui-icon-tag"></span>' . __('Lista', true), array('plugin' => 0, 'controller' => 'promos', 'action' => 'index'), array('escape' => false)); ?></li>
                    </ul>
                </li>
				<li>
                    <?php echo $html->link('<span class="ui-icon ui-icon-tag"></span>' . __('Galeria', true), array('plugin' => 0, 'controller' => 'galleries', 'action' => 'index'), array('escape' => false)); ?>
                    <ul>
                        <li><?php echo $html->link('<span class="ui-icon ui-icon-tag"></span>' . __('Lista', true), array('plugin' => 0, 'controller' => 'galleries', 'action' => 'index'), array('escape' => false)); ?></li>
                        <li><?php echo $html->link('<span class="ui-icon ui-icon-plus"></span>' . __('Agregar', true), array('plugin' => 0, 'controller' => 'galleries', 'action' => 'add'), array('class' => 'separator', 'escape' => false)); ?></li>
                     
                    </ul>
                </li>
				<!--<li>
                    <?php echo $html->link('<span class="ui-icon ui-icon-tag"></span>' . __('Video', true), array('plugin' => 0, 'controller' => 'videos', 'action' => 'index'), array('escape' => false)); ?>
                    <ul>
                        <li><?php echo $html->link('<span class="ui-icon ui-icon-tag"></span>' . __('Lista', true), array('plugin' => 0, 'controller' => 'videos', 'action' => 'index'), array('escape' => false)); ?></li>
                        <li><?php echo $html->link('<span class="ui-icon ui-icon-plus"></span>' . __('Agregar', true), array('plugin' => 0, 'controller' => 'videos', 'action' => 'add'), array('class' => 'separator', 'escape' => false)); ?></li>
                     
                    </ul>
                </li>-->
			</ul>
        </li>

        <li>
            <a href="#"><span class="ui-icon ui-icon-contact"></span><?php __('Contactos'); ?></a>
            <ul>
                <li><?php echo $html->link('<span class="ui-icon ui-icon-contact"></span>' . __('Preguntas', true), array('plugin' => 0, 'controller' => 'pages', 'action' => 'index_preguntas'), array('escape' => false)); ?></li>
                <li><?php echo $html->link('<span class="ui-icon ui-icon-mail-closed"></span>' . __('Reclamos', true), array('plugin' => 0, 'controller' => 'denuncias', 'action' => 'index'), array('escape' => false)); ?></li>
            </ul>
        </li>

        <li>
            <a href="#"><span class="ui-icon ui-icon-person"></span><?php __('Registros'); ?></a>
            <ul>
				<li><?php echo $html->link('<span class="ui-icon ui-icon-person"></span>' . __('Clientes', true), array('plugin' => 0, 'controller' => 'registers', 'action' => 'index'), array('escape' => false)); ?>
					<ul>
                        <li><?php echo $html->link('<span class="ui-icon ui-icon-plus"></span>' . __('Agregar', true), array('plugin' => 0, 'controller' => 'registers', 'action' => 'add_cliente'), array('class' => 'separator', 'escape' => false)); ?></li>
						<li><?php echo $html->link('<span class="ui-icon ui-icon-tag"></span>' . __('Lista', true), array('plugin' => 0, 'controller' => 'registers', 'action' => 'index'), array('escape' => false)); ?></li>
                    </ul>
				</li>
            </ul>
        </li>

        <li>
            <a href="#" class="last"><span class="ui-icon ui-icon-wrench"></span><?php __('Inventario'); ?></a>
            <ul>
                <li><?php echo $html->link('<span class="ui-icon ui-icon-wrench"></span>' . __('Existencia', true), array('plugin' => 0, 'controller' => 'pages', 'action' => 'existencia'), array('escape' => false)); ?></li>
                <li><?php echo $html->link('<span class="ui-icon ui-icon-info"></span>' . __('Agotados', true), array('plugin' => 0, 'controller' => 'pages', 'action' => 'agotados'), array('escape' => false)); ?></li>
            </ul>
        </li>
    </ul>
</div>
