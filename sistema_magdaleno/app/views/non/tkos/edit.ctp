<div class="tkos form">
<?php echo $this->Form->create('Tko');?>
	<fieldset>
 		<legend><?php __('Edit Tko'); ?></legend>
	<?php
		echo $this->Form->input('idtko');
		echo $this->Form->input('link_tko');
		echo $this->Form->input('width_tko');
		echo $this->Form->input('height_tko');
		echo $this->Form->input('fechacre_tko');
		echo $this->Form->input('usuario_id_usuario');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Tko.idtko')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Tko.idtko'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tkos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>