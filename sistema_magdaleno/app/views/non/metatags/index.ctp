<div class="metatags index">
	<h2><?php __('Metatags');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('idmetatag');?></th>
			<th><?php echo $this->Paginator->sort('value_metatag');?></th>
			<th><?php echo $this->Paginator->sort('fechacre_metatag');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($metatags as $metatag):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $metatag['Metatag']['idmetatag']; ?>&nbsp;</td>
		<td><?php echo $metatag['Metatag']['value_metatag']; ?>&nbsp;</td>
		<td><?php echo $metatag['Metatag']['fechacre_metatag']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $metatag['Metatag']['idmetatag'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $metatag['Metatag']['idmetatag'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $metatag['Metatag']['idmetatag']), null, sprintf(__('Are you sure you want to delete # %s?', true), $metatag['Metatag']['idmetatag'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Metatag', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>