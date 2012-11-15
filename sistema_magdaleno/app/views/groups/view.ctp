<div class="groups view">
<h2><?php  __('Group');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Idgrupos'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['idgrupos']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name Grupos'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['name_grupos']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Asociado Grupos'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['asociado_grupos']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fechacrea Grupo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['fechacrea_grupo']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Group', true), array('action' => 'edit', $group['Group']['idgrupos'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Group', true), array('action' => 'delete', $group['Group']['idgrupos']), null, sprintf(__('Are you sure you want to delete # %s?', true), $group['Group']['idgrupos'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Permissions', true), array('controller' => 'permissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Permission', true), array('controller' => 'permissions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Permissions');?></h3>
	<?php if (!empty($group['Permission'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Idpermiso'); ?></th>
		<th><?php __('Escritura Permiso'); ?></th>
		<th><?php __('Lectura Permiso'); ?></th>
		<th><?php __('Total Permiso'); ?></th>
		<th><?php __('Fechacre Permiso'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($group['Permission'] as $permission):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $permission['idpermiso'];?></td>
			<td><?php echo $permission['escritura_permiso'];?></td>
			<td><?php echo $permission['lectura_permiso'];?></td>
			<td><?php echo $permission['total_permiso'];?></td>
			<td><?php echo $permission['fechacre_permiso'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'permissions', 'action' => 'view', $permission['idpermiso'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'permissions', 'action' => 'edit', $permission['idpermiso'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'permissions', 'action' => 'delete', $permission['idpermiso']), null, sprintf(__('Are you sure you want to delete # %s?', true), $permission['idpermiso'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Permission', true), array('controller' => 'permissions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Users');?></h3>
	<?php if (!empty($group['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id Usuario'); ?></th>
		<th><?php __('Nombre Usuario'); ?></th>
		<th><?php __('Email Usuario'); ?></th>
		<th><?php __('Clave Usuario'); ?></th>
		<th><?php __('Perfil Usuario'); ?></th>
		<th><?php __('Fecharreg Usuario'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($group['User'] as $user):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $user['id_usuario'];?></td>
			<td><?php echo $user['nombre_usuario'];?></td>
			<td><?php echo $user['email_usuario'];?></td>
			<td><?php echo $user['clave_usuario'];?></td>
			<td><?php echo $user['perfil_usuario'];?></td>
			<td><?php echo $user['fecharreg_usuario'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'users', 'action' => 'view', $user['id_usuario'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'users', 'action' => 'edit', $user['id_usuario'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'users', 'action' => 'delete', $user['id_usuario']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['id_usuario'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
