<div class="paths view">
<h2><?php  __('Path');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $path['Path']['id_path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $path['Path']['url_path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fechacre Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $path['Path']['fechacre_path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($path['User']['id_usuario'], array('controller' => 'users', 'action' => 'view', $path['User']['id_usuario'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Path', true), array('action' => 'edit', $path['Path']['id_path'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Path', true), array('action' => 'delete', $path['Path']['id_path']), null, sprintf(__('Are you sure you want to delete # %s?', true), $path['Path']['id_path'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Paths', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Path', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
