<div class="backgrounds index">
	<h2><?php __('Backgrounds');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_background');?></th>
			<th><?php echo $this->Paginator->sort('fechacre_background');?></th>
			<th><?php echo $this->Paginator->sort('file_id_file');?></th>
			<th><?php echo $this->Paginator->sort('promo_idpromo');?></th>
			<th><?php echo $this->Paginator->sort('usuario_id_usuario');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($backgrounds as $background):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $background['Background']['id_background']; ?>&nbsp;</td>
		<td><?php echo $background['Background']['fechacre_background']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($background['Archivo'][''], array('controller' => 'archivos', 'action' => 'view', $background['Archivo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($background['Promo'][''], array('controller' => 'promos', 'action' => 'view', $background['Promo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($background['User']['id_usuario'], array('controller' => 'users', 'action' => 'view', $background['User']['id_usuario'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $background['Background']['id_background'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $background['Background']['id_background'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $background['Background']['id_background']), null, sprintf(__('Are you sure you want to delete # %s?', true), $background['Background']['id_background'])); ?>
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
		<li><?php echo $this->Html->link(__('New Background', true), array('action' => 'add')); ?></li>
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