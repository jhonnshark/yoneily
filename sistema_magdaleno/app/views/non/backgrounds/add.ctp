<div class="backgrounds form">
<?php echo $this->Form->create('Background');?>
	<fieldset>
 		<legend><?php __('Add Background'); ?></legend>
	<?php
		echo $this->Form->input('fechacre_background');
		echo $this->Form->input('file_id_file');
		echo $this->Form->input('promo_idpromo');
		echo $this->Form->input('usuario_id_usuario');
		echo $this->Form->input('Category');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Backgrounds', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Archivos', true), array('controller' => 'archivos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archivo', true), array('controller' => 'archivos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Promos', true), array('controller' => 'promos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promo', true), array('controller' => 'promos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>