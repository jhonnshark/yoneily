<div class="banners index">
	<h2><?php __('Banners');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('Link');?></th>
			<th><?php echo $this->Paginator->sort('Tipo');?></th>
			<th><?php echo $this->Paginator->sort('Ancho');?></th>
			<th><?php echo $this->Paginator->sort('Alto');?></th>
			<th><?php echo $this->Paginator->sort('Fecha de Creación');?></th>
			<th><?php echo $this->Paginator->sort('Posición');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($banners as $banner):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $banner['Banner']['id_banners']; ?>&nbsp;</td>
		<td><?php echo $banner['Banner']['link_banners']; ?>&nbsp;</td>
		<td><?php echo $banner['Banner']['type_banners']; ?>&nbsp;</td>
		<td><?php echo $banner['Banner']['width_banners']; ?>&nbsp;</td>
		<td><?php echo $banner['Banner']['height_banners']; ?>&nbsp;</td>
		<td><?php echo $banner['Banner']['fechacre_banners']; ?>&nbsp;</td>
		<td><?php echo $banner['Banner']['posicion_banners']; ?>&nbsp;</td>
		
		<td class="actions">
                	<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $banner['Banner']['id_banners'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $banner['Banner']['id_banners']), null, sprintf(__('Estas seguro de borrar el archivo # %s?', true), $banner['Banner']['id_banners'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Paginas %page% of %pages%', true)
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
		<li><?php echo $this->Html->link(__('Crear Banner', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Consultar Promociones', true), array('controller' => 'promos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Consultar Takeovers', true), array('controller' => 'tkos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Consultar Categorias', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
	</ul>
</div>