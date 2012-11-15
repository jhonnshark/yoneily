<div class="promos form">
<?php echo $this->Form->create('Promo');?>
	<fieldset>
 		<legend><?php __('Edit Promo'); ?></legend>
	<?php
		echo $this->Form->input('idpromo');
		echo $this->Form->input('name_promo');
		//echo $this->Form->input('fechacre_promo');
		echo $this->Form->input('usuario_id_usuario');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Promo.idpromo')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Promo.idpromo'))); ?></li>
		<li><?php echo $this->Html->link(__('List Promos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>