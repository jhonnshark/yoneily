<div class="news view">
<h2><?php  __('News');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Contennoticias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $news['News']['id_contennoticias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Titulo Contennoticias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $news['News']['titulo_contennoticias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sumario Contennoticias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $news['News']['sumario_contennoticias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Texto Contennoticias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $news['News']['texto_contennoticias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fechacre Contennoticias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $news['News']['fechacre_contennoticias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status Contennoticias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $news['News']['status_contennoticias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('News'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($news['News']['id_contennoticias'], array('controller' => 'news', 'action' => 'view', $news['News']['id_contennoticias'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($news['User']['id_usuario'], array('controller' => 'users', 'action' => 'view', $news['User']['id_usuario'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit News', true), array('action' => 'edit', $news['News']['id_contennoticias'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete News', true), array('action' => 'delete', $news['News']['id_contennoticias']), null, sprintf(__('Are you sure you want to delete # %s?', true), $news['News']['id_contennoticias'])); ?> </li>
		<li><?php echo $this->Html->link(__('List News', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New News', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List News', true), array('controller' => 'news', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New News', true), array('controller' => 'news', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Galleries', true), array('controller' => 'galleries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gallery', true), array('controller' => 'galleries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos', true), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video', true), array('controller' => 'videos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Galleries');?></h3>
	<?php if (!empty($news['Gallery'])):?>
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
		foreach ($news['Gallery'] as $gallery):
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
<div class="related">
	<h3><?php __('Related Videos');?></h3>
	<?php if (!empty($news['Video'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id Videos'); ?></th>
		<th><?php __('Fechacre Videos'); ?></th>
		<th><?php __('Usuario Id Usuario'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($news['Video'] as $video):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $video['id_videos'];?></td>
			<td><?php echo $video['fechacre_videos'];?></td>
			<td><?php echo $video['usuario_id_usuario'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'videos', 'action' => 'view', $video['id_videos'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'videos', 'action' => 'edit', $video['id_videos'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'videos', 'action' => 'delete', $video['id_videos']), null, sprintf(__('Are you sure you want to delete # %s?', true), $video['id_videos'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Video', true), array('controller' => 'videos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
