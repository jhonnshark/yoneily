<div class="archivos view">
<h2><?php  __('Archivo');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id File'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archivo['Archivo']['id_file']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type File'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archivo['Archivo']['type_file']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fechacre File'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archivo['Archivo']['fechacre_file']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mimetype'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archivo['Archivo']['mimetype']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipodispositivo File'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archivo['Archivo']['tipodispositivo_file']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($archivo['Path']['id_path'], array('controller' => 'paths', 'action' => 'view', $archivo['Path']['id_path'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Video'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($archivo['Video']['id_videos'], array('controller' => 'videos', 'action' => 'view', $archivo['Video']['id_videos'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Banner'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($archivo['Banner']['id_banners'], array('controller' => 'banners', 'action' => 'view', $archivo['Banner']['id_banners'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tko'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($archivo['Tko']['idtko'], array('controller' => 'tkos', 'action' => 'view', $archivo['Tko']['idtko'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($archivo['User']['id_usuario'], array('controller' => 'users', 'action' => 'view', $archivo['User']['id_usuario'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Contentespecial Idcontentespecial'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archivo['Archivo']['contentespecial_idcontentespecial']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Canciones Idcanciones'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archivo['Archivo']['canciones_idcanciones']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Contennoticias Id Contennoticias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $archivo['Archivo']['contennoticias_id_contennoticias']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Archivo', true), array('action' => 'edit', $archivo['Archivo']['id_file'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Archivo', true), array('action' => 'delete', $archivo['Archivo']['id_file']), null, sprintf(__('Are you sure you want to delete # %s?', true), $archivo['Archivo']['id_file'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Archivos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archivo', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paths', true), array('controller' => 'paths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Path', true), array('controller' => 'paths', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos', true), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video', true), array('controller' => 'videos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Banners', true), array('controller' => 'banners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner', true), array('controller' => 'banners', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tkos', true), array('controller' => 'tkos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tko', true), array('controller' => 'tkos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Galleries', true), array('controller' => 'galleries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gallery', true), array('controller' => 'galleries', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Galleries');?></h3>
	<?php if (!empty($archivo['Gallery'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id Galeria'); ?></th>
		<th><?php __('Texto Galeria'); ?></th>
		<th><?php __('Fechacre Galeria'); ?></th>
		<th><?php __('Usuario Id Usuario'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($archivo['Gallery'] as $gallery):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $gallery['id_galeria'];?></td>
			<td><?php echo $gallery['texto_galeria'];?></td>
			<td><?php echo $gallery['fechacre_galeria'];?></td>
			<td><?php echo $gallery['usuario_id_usuario'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'galleries', 'action' => 'view', $gallery['id_galeria'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'galleries', 'action' => 'edit', $gallery['id_galeria'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'galleries', 'action' => 'delete', $gallery['id_galeria']), null, sprintf(__('Are you sure you want to delete # %s?', true), $gallery['id_galeria'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Gallery', true), array('controller' => 'galleries', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
