<div class="galleries index">
	<h2><?php __('Galleries');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_galeria');?></th>
			<th><?php echo $this->Paginator->sort('texto_galeria');?></th>
			<th><?php echo $this->Paginator->sort('fechacre_galeria');?></th>
			<th><?php echo $this->Paginator->sort('usuario_id_usuario');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($galleries as $gallery):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $gallery['Gallery']['id_galeria']; ?>&nbsp;</td>
		<td><?php echo $gallery['Gallery']['texto_galeria']; ?>&nbsp;</td>
		<td><?php echo $gallery['Gallery']['fechacre_galeria']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gallery['User']['id_usuario'], array('controller' => 'users', 'action' => 'view', $gallery['User']['id_usuario'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $gallery['Gallery']['id_galeria'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $gallery['Gallery']['id_galeria'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $gallery['Gallery']['id_galeria']), null, sprintf(__('Are you sure you want to delete # %s?', true), $gallery['Gallery']['id_galeria'])); ?>
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
		<li><?php echo $this->Html->link(__('New Gallery', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Archivos', true), array('controller' => 'archivos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archivo', true), array('controller' => 'archivos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List News', true), array('controller' => 'news', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New News', true), array('controller' => 'news', 'action' => 'add')); ?> </li>
	</ul>
</div>