<div class="tkos index">
	<h2><?php __('Tkos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('idtko');?></th>
			<th><?php echo $this->Paginator->sort('link_tko');?></th>
			<th><?php echo $this->Paginator->sort('width_tko');?></th>
			<th><?php echo $this->Paginator->sort('height_tko');?></th>
			<th><?php echo $this->Paginator->sort('fechacre_tko');?></th>
			<th><?php echo $this->Paginator->sort('usuario_id_usuario');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tkos as $tko):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tko['Tko']['idtko']; ?>&nbsp;</td>
		<td><?php echo $tko['Tko']['link_tko']; ?>&nbsp;</td>
		<td><?php echo $tko['Tko']['width_tko']; ?>&nbsp;</td>
		<td><?php echo $tko['Tko']['height_tko']; ?>&nbsp;</td>
		<td><?php echo $tko['Tko']['fechacre_tko']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tko['User']['id_usuario'], array('controller' => 'users', 'action' => 'view', $tko['User']['id_usuario'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $tko['Tko']['idtko'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $tko['Tko']['idtko'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tko['Tko']['idtko']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tko['Tko']['idtko'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tko', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>