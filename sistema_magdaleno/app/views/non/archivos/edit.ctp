<div class="archivos form">
<?php echo $this->Form->create('Archivo');?>
	<fieldset>
 		<legend><?php __('Edit Archivo'); ?></legend>
	<?php
		echo $this->Form->input('id_file');
		echo $this->Form->input('type_file');
		echo $this->Form->input('fechacre_file');
		echo $this->Form->input('mimetype');
		echo $this->Form->input('tipodispositivo_file');
		echo $this->Form->input('path_id_path');
		echo $this->Form->input('videos_id_videos');
		echo $this->Form->input('banners_id_banners');
		echo $this->Form->input('tko_idtko');
		echo $this->Form->input('usuario_id_usuario');
		echo $this->Form->input('contentespecial_idcontentespecial');
		echo $this->Form->input('canciones_idcanciones');
		echo $this->Form->input('contennoticias_id_contennoticias');
		echo $this->Form->input('Gallery');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Archivo.id_file')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Archivo.id_file'))); ?></li>
		<li><?php echo $this->Html->link(__('List Archivos', true), array('action' => 'index'));?></li>
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