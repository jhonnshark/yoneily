<div class="metatags form">
<?php echo $this->Form->create('Metatag');?>
	<fieldset>
 		<legend><?php __('Edit Metatag'); ?></legend>
	<?php
		echo $this->Form->input('idmetatag');
		echo $this->Form->input('value_metatag');
		echo $this->Form->input('fechacre_metatag');
		echo $this->Form->input('Category');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Metatag.idmetatag')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Metatag.idmetatag'))); ?></li>
		<li><?php echo $this->Html->link(__('List Metatags', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>