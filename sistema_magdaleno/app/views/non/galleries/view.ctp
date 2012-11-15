<div class="galleries view">
<h2><?php  __('Gallery');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Galeria'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gallery['Gallery']['id_galeria']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Texto Galeria'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gallery['Gallery']['texto_galeria']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fechacre Galeria'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gallery['Gallery']['fechacre_galeria']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($gallery['User']['id_usuario'], array('controller' => 'users', 'action' => 'view', $gallery['User']['id_usuario'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gallery', true), array('action' => 'edit', $gallery['Gallery']['id_galeria'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Gallery', true), array('action' => 'delete', $gallery['Gallery']['id_galeria']), null, sprintf(__('Are you sure you want to delete # %s?', true), $gallery['Gallery']['id_galeria'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Galleries', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gallery', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Related Archivos');?></h3>
	<?php if (!empty($gallery['Archivo'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id File'); ?></th>
		<th><?php __('Type File'); ?></th>
		<th><?php __('Fechacre File'); ?></th>
		<th><?php __('Mimetype'); ?></th>
		<th><?php __('Tipodispositivo File'); ?></th>
		<th><?php __('Path Id Path'); ?></th>
		<th><?php __('Videos Id Videos'); ?></th>
		<th><?php __('Banners Id Banners'); ?></th>
		<th><?php __('Tko Idtko'); ?></th>
		<th><?php __('Usuario Id Usuario'); ?></th>
		<th><?php __('Contentespecial Idcontentespecial'); ?></th>
		<th><?php __('Canciones Idcanciones'); ?></th>
		<th><?php __('Contennoticias Id Contennoticias'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
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
			<td><?php echo $archivo['type_file'];?></td>
			<td><?php echo $archivo['fechacre_file'];?></td>
			<td><?php echo $archivo['mimetype'];?></td>
			<td><?php echo $archivo['tipodispositivo_file'];?></td>
			<td><?php echo $archivo['path_id_path'];?></td>
			<td><?php echo $archivo['videos_id_videos'];?></td>
			<td><?php echo $archivo['banners_id_banners'];?></td>
			<td><?php echo $archivo['tko_idtko'];?></td>
			<td><?php echo $archivo['usuario_id_usuario'];?></td>
			<td><?php echo $archivo['contentespecial_idcontentespecial'];?></td>
			<td><?php echo $archivo['canciones_idcanciones'];?></td>
			<td><?php echo $archivo['contennoticias_id_contennoticias'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'archivos', 'action' => 'view', $archivo['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'archivos', 'action' => 'edit', $archivo['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'archivos', 'action' => 'delete', $archivo['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $archivo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Archivo', true), array('controller' => 'archivos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Categories');?></h3>
	<?php if (!empty($gallery['Category'])):?>
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
		foreach ($gallery['Category'] as $category):
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
<div class="related">
	<h3><?php __('Related News');?></h3>
	<?php if (!empty($gallery['News'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id Contennoticias'); ?></th>
		<th><?php __('Titulo Contennoticias'); ?></th>
		<th><?php __('Sumario Contennoticias'); ?></th>
		<th><?php __('Texto Contennoticias'); ?></th>
		<th><?php __('Fechacre Contennoticias'); ?></th>
		<th><?php __('Status Contennoticias'); ?></th>
		<th><?php __('Categorias Id Categorias'); ?></th>
		<th><?php __('Usuario Id Usuario'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($gallery['News'] as $news):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $news['id_contennoticias'];?></td>
			<td><?php echo $news['titulo_contennoticias'];?></td>
			<td><?php echo $news['sumario_contennoticias'];?></td>
			<td><?php echo $news['texto_contennoticias'];?></td>
			<td><?php echo $news['fechacre_contennoticias'];?></td>
			<td><?php echo $news['status_contennoticias'];?></td>
			<td><?php echo $news['categorias_id_categorias'];?></td>
			<td><?php echo $news['usuario_id_usuario'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'news', 'action' => 'view', $news['id_contennoticias'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'news', 'action' => 'edit', $news['id_contennoticias'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'news', 'action' => 'delete', $news['id_contennoticias']), null, sprintf(__('Are you sure you want to delete # %s?', true), $news['id_contennoticias'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New News', true), array('controller' => 'news', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
