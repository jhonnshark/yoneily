<div class="promos view">
<h2><?php  __('Promo');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Idpromo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $promo['Promo']['idpromo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name Promo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $promo['Promo']['name_promo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fechacre Promo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $promo['Promo']['fechacre_promo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($promo['User']['id_usuario'], array('controller' => 'users', 'action' => 'view', $promo['User']['id_usuario'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Promo', true), array('action' => 'edit', $promo['Promo']['idpromo'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Promo', true), array('action' => 'delete', $promo['Promo']['idpromo']), null, sprintf(__('Are you sure you want to delete # %s?', true), $promo['Promo']['idpromo'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Promos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promo', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
