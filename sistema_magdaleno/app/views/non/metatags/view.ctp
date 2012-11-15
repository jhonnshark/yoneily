<div class="metatags view">
<h2><?php  __('Metatag');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Idmetatag'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $metatag['Metatag']['idmetatag']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Value Metatag'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $metatag['Metatag']['value_metatag']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fechacre Metatag'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $metatag['Metatag']['fechacre_metatag']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Metatag', true), array('action' => 'edit', $metatag['Metatag']['idmetatag'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Metatag', true), array('action' => 'delete', $metatag['Metatag']['idmetatag']), null, sprintf(__('Are you sure you want to delete # %s?', true), $metatag['Metatag']['idmetatag'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Metatags', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Metatag', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Categories');?></h3>
	<?php if (!empty($metatag['Category'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id Categorias'); ?></th>
		<th><?php __('Parent Id'); ?></th>
		<th><?php __('Nombre Categorias'); ?></th>
		<th><?php __('Link Categorias'); ?></th>
		<th><?php __('Estilo Categorias'); ?></th>
		<th><?php __('Fechacre Categorias'); ?></th>
		<th><?php __('Status Categorias'); ?></th>
		<th><?php __('Usuario Id Usuario'); ?></th>
		<th><?php __('Categorias Id Categorias'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($metatag['Category'] as $category):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $category['id_categorias'];?></td>
			<td><?php echo $category['parent_id'];?></td>
			<td><?php echo $category['nombre_categorias'];?></td>
			<td><?php echo $category['link_categorias'];?></td>
			<td><?php echo $category['estilo_categorias'];?></td>
			<td><?php echo $category['fechacre_categorias'];?></td>
			<td><?php echo $category['status_categorias'];?></td>
			<td><?php echo $category['usuario_id_usuario'];?></td>
			<td><?php echo $category['categorias_id_categorias'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'categories', 'action' => 'view', $category['id_categorias'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'categories', 'action' => 'edit', $category['id_categorias'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'categories', 'action' => 'delete', $category['id_categorias']), null, sprintf(__('Are you sure you want to delete # %s?', true), $category['id_categorias'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
