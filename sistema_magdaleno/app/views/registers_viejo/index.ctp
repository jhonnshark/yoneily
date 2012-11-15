<div class="registers index">
	<h2><?php __('Registers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('idregistro');?></th>
			<th><?php echo $this->Paginator->sort('nombreape');?></th>
			<th><?php echo $this->Paginator->sort('sexo');?></th>
			<th><?php echo $this->Paginator->sort('fechanac');?></th>
			<th><?php echo $this->Paginator->sort('direccion');?></th>
			<th><?php echo $this->Paginator->sort('pais');?></th>
			<th><?php echo $this->Paginator->sort('correo');?></th>
			<th><?php echo $this->Paginator->sort('telefono');?></th>
			<th><?php echo $this->Paginator->sort('usuario');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('rpass');?></th>
			<th><?php echo $this->Paginator->sort('estado');?></th>
			<th><?php echo $this->Paginator->sort('codigo');?></th>
			<th><?php echo $this->Paginator->sort('tiporeg');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($registers as $register):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $register['Register']['idregistro']; ?>&nbsp;</td>
		<td><?php echo $register['Register']['nombreape']; ?>&nbsp;</td>
		<td><?php echo $register['Register']['sexo']; ?>&nbsp;</td>
		<td><?php echo $register['Register']['fechanac']; ?>&nbsp;</td>
		<td><?php echo $register['Register']['direccion']; ?>&nbsp;</td>
		<td><?php echo $register['Register']['pais']; ?>&nbsp;</td>
		<td><?php echo $register['Register']['correo']; ?>&nbsp;</td>
		<td><?php echo $register['Register']['telefono']; ?>&nbsp;</td>
		<td><?php echo $register['Register']['usuario']; ?>&nbsp;</td>
		<td><?php echo $register['Register']['password']; ?>&nbsp;</td>
		<td><?php echo $register['Register']['rpass']; ?>&nbsp;</td>
		<td><?php echo $register['Register']['estado']; ?>&nbsp;</td>
		<td><?php echo $register['Register']['codigo']; ?>&nbsp;</td>
		<td><?php echo $register['Register']['tiporeg']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $register['Register']['idregistro'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $register['Register']['idregistro'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $register['Register']['idregistro']), null, sprintf(__('Are you sure you want to delete # %s?', true), $register['Register']['idregistro'])); ?>
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
		<li><?php echo $this->Html->link(__('New Register', true), array('action' => 'add')); ?></li>
	</ul>
</div>