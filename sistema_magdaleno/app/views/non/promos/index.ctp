<div class="promos index">
	<h2><?php __('Promociones');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('idpromo');?></th>
			<th><?php echo $this->Paginator->sort('name_promo');?></th>
			<th><?php echo $this->Paginator->sort('fechacre_promo');?></th>
			<th><?php echo $this->Paginator->sort('usuario_id_usuario');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($promos as $promo):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $promo['Promo']['idpromo']; ?>&nbsp;</td>
                <td><?php echo utf8_encode($promo['Promo']['name_promo']); ?>&nbsp;</td>
		<td><?php echo $promo['Promo']['fechacre_promo']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($promo['User']['id_usuario'], array('controller' => 'users', 'action' => 'view', $promo['User']['id_usuario'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $promo['Promo']['idpromo'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $promo['Promo']['idpromo']), null, sprintf(__('Are you sure you want to delete # %s?', true), $promo['Promo']['idpromo'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina %page% of %pages%',true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('Atras', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Crear Promoción', true), array('action' => 'add')); ?></li>
		
	</ul>
</div>