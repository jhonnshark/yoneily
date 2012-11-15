<div class="galleries view">
<h2><?php  __('Gallery');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gallery['Gallery']['id_galeria']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gallery['Gallery']['texto_galeria']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gallery['Gallery']['fechacre_galeria']; ?>
			&nbsp;
		</dd>
		
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('Consultar Galerias', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crear Galerias', true), array('action' => 'add')); ?> </li>
		
	</ul>
</div>
<div class="related">
	<h3><?php __('Fotos');?></h3>
	<?php if (!empty($gallery['Archivo'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Nombre del Archivo'); ?></th>
		<th><?php __('Fecha de Creación'); ?></th>
		<th><?php __('Mimetype'); ?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($gallery['Archivo'] as $archivo):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $archivo['id_file'];?></td>
			<td><?php echo $archivo['nombre_file'];?></td>
			<td><?php echo $archivo['fechacre_file'];?></td>
			<td><?php echo $archivo['mimetype'];?></td>
						
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'archivos', 'action' => 'view', $archivo['id_file'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'archivos', 'action' => 'edit', $archivo['id_file'])); ?>
				<?php echo $this->Html->link(__('Borrar', true), array('controller' => 'archivos', 'action' => 'delete', $archivo['id_file']), null, sprintf(__('Are you sure you want to delete # %s?', true), $archivo['id_file'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		
		
	</div>
</div>
<div class="related">
	<h3><?php __('Categorias');?></h3>
	<?php if (!empty($gallery['Category'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Nombre Categorias'); ?></th>
		<th><?php __('Fechacre Categorias'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($gallery['Category'] as $category):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $category['id_categorias'];?></td>
			<td><?php echo $category['nombre_categorias'];?></td>
			<td><?php echo $category['fechacre_categorias'];?></td>
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
		
	</div>
</div>
