<div class="videos view">
<h2><?php  __('Video');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Videos'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $video['Video']['id_videos']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fechacre Videos'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $video['Video']['fechacre_videos']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($video['User']['id_usuario'], array('controller' => 'users', 'action' => 'view', $video['User']['id_usuario'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Archivos Id File'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $video['Video']['archivos_id_file']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Video', true), array('action' => 'edit', $video['Video']['id_videos'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Video', true), array('action' => 'delete', $video['Video']['id_videos']), null, sprintf(__('Are you sure you want to delete # %s?', true), $video['Video']['id_videos'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Archivos', true), array('controller' => 'archivos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archivo', true), array('controller' => 'archivos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List News', true), array('controller' => 'news', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New News', true), array('controller' => 'news', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related News');?></h3>
	<?php if (!empty($video['News'])):?>
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
		foreach ($video['News'] as $news):
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
