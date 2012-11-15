<div class="banners form">
<?php echo $this->Form->create('Banner');?>
	<fieldset>
 		<legend><?php __('Edit Banner'); ?></legend>
	<?php
		echo $this->Form->input('id_banners');
		echo $this->Form->input('link_banners');
		echo $this->Form->input('type_banners');
		echo $this->Form->input('width_banners');
		echo $this->Form->input('height_banners');
		echo $this->Form->input('fechacre_banners');
		echo $this->Form->input('posicion_banners');
		echo $this->Form->input('usuario_id_usuario');
		echo $this->Form->input('promo_idpromo');
		echo $this->Form->input('tko_idtko');
		echo $this->Form->input('Category');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Banner.id_banners')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Banner.id_banners'))); ?></li>
		<li><?php echo $this->Html->link(__('List Banners', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Promos', true), array('controller' => 'promos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promo', true), array('controller' => 'promos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tkos', true), array('controller' => 'tkos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tko', true), array('controller' => 'tkos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>