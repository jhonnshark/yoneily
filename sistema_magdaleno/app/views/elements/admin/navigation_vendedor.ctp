<?php $user=$session->read('Auth.User.locale_id_local');?>
<div id="menu" >
    <ul class="menu">
        <li>
            <a href="<?php echo $html->url('../users/home'); ?>" class="parent"><?php __('Principal'); ?></a>
        </li>
		<li>
            <a href="#" class="parent"><?php __('Compras'); ?></a>
            <ul>
                <li><?php echo $html->link(__('Lista', true), array('plugin' => 0, 'controller' => 'registers', 'action' => 'index_compras'), array('escape' => false)); ?></li>
            </ul>
        </li>

        

        <li>
            <a href="#" class="parent"><?php __('Multimedia'); ?></a>
            <ul>
				<li>
                    <?php echo $html->link(__('Promociones', true), array('plugin' => 0, 'controller' => 'promos', 'action' => 'index'), array('escape' => false)); ?>
                    <ul>
                        <li><?php echo $html->link(__('Agregar', true), array('plugin' => 0, 'controller' => 'promos', 'action' => 'add'), array('class' => 'separator', 'escape' => false)); ?></li>
						<li><?php echo $html->link(__('Lista', true), array('plugin' => 0, 'controller' => 'promos', 'action' => 'index'), array('escape' => false)); ?></li>
                    </ul>
                </li>
				<li>
                    <?php echo $html->link(__('Galeria', true), array('plugin' => 0, 'controller' => 'galleries', 'action' => 'index'), array('escape' => false)); ?>
                    <ul>
                        <li><?php echo $html->link(__('Lista', true), array('plugin' => 0, 'controller' => 'galleries', 'action' => 'index'), array('escape' => false)); ?></li>
                        <li><?php echo $html->link(__('Agregar', true), array('plugin' => 0, 'controller' => 'galleries', 'action' => 'add'), array('class' => 'separator', 'escape' => false)); ?></li>
                     
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
            <a href="#" class="parent"><?php __('Contactos'); ?></a>
            <ul>
                <li><?php echo $html->link(__('Preguntas', true), array('plugin' => 0, 'controller' => 'pages', 'action' => 'index_preguntas'), array('escape' => false)); ?></li>
                <!--<li><?php echo $html->link(__('Reclamos', true), array('plugin' => 0, 'controller' => 'denuncias', 'action' => 'index'), array('escape' => false)); ?></li>-->
            </ul>
        </li>

        <li>
            <a href="#" class="parent"><?php __('Registros'); ?></a>
            <ul>
				<li><?php echo $html->link(__('Clientes', true), array('plugin' => 0, 'controller' => 'registers', 'action' => 'index'), array('escape' => false)); ?>
					<ul>
                        <li><?php echo $html->link(__('Agregar', true), array('plugin' => 0, 'controller' => 'registers', 'action' => 'add_cliente'), array('class' => 'separator', 'escape' => false)); ?></li>
						<li><?php echo $html->link(__('Lista', true), array('plugin' => 0, 'controller' => 'registers', 'action' => 'index'), array('escape' => false)); ?></li>
                    </ul>
				</li>
            </ul>
        </li>

        <li>
            <a href="#" class="parent"><?php __('Inventario'); ?></a>
            <ul>
                <li><?php echo $html->link(__('Existencia', true), array('plugin' => 0, 'controller' => 'pages', 'action' => 'existencia'), array('escape' => false)); ?></li>
                <li><?php echo $html->link(__('Agotados', true), array('plugin' => 0, 'controller' => 'pages', 'action' => 'agotados'), array('escape' => false)); ?></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo $html->url('../users/logout'); ?>"><?php __('Cerrar Seción'); ?></a>

        </li>

        <li style="left:50%;">
            <?php if($session->read('Auth.User.groups_idgrupos')==1){ ?>
                <div>
                    <font color="black">
                    <?php echo "<font color=red>Administrador (a): </font> ".$session->read('Auth.User.perfil_usuario'); ?>&nbsp;&nbsp;</font>
                
                </div>
            <?php }?>
        </li>
        <li style="left:50%;">
            <?php if($session->read('Auth.User.groups_idgrupos')==2){ ?>
                <div>
                    <font color="black">
                    <?php echo "<font color=red>Vendedor (a): </font> ".$session->read('Auth.User.perfil_usuario'); ?>&nbsp;&nbsp;</font>
                
                </div>
            <?php }?>
        </li>

    </ul>
</div>
