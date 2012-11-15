<div class="archivos index">
	<h2><?php __('Archivos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_file');?></th>
                        <th><?php echo $this->Paginator->sort('thumbnail');?></th>
			<th><?php echo $this->Paginator->sort('nombre_file');?></th>
                        <th><?php echo $this->Paginator->sort('dir');?></th>
			<th><?php echo $this->Paginator->sort('fechacre_file');?></th>
			<th><?php echo $this->Paginator->sort('mimetype');?></th>
			<th><?php echo $this->Paginator->sort('tipodispositivo_file');?></th>
			<th><?php echo $this->Paginator->sort('usuario_id_usuario');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($archivos as $archivo):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $archivo['Archivo']['id_file']; ?>&nbsp;</td>
                <?php $mimeType = explode('/', $archivo['Archivo']['mimetype']);
                      $mimeType = $mimeType['0'];
                         if ($mimeType == 'image') {
                 ?>
                <td><?php echo $html->link($image->resize('files/noticias/' . $archivo['Archivo']['nombre_file'], 100, 75), array('controller' => 'archivos', 'action' => 'edit', $archivo['Archivo']['id_file']), array('escape' => false)); ?>&nbsp;</td>
		<?php }else{?>
                <td><?php echo $html->image('/img/page_white.png') . ' ' . $archivo['Archivo']['mimetype']; ?>&nbsp;</td>
                <?php }?>
                <td><?php echo $archivo['Archivo']['nombre_file']; ?>&nbsp;</td>
                <td><?php echo $archivo['Archivo']['dir']; ?>&nbsp;</td>
		<td><?php echo $archivo['Archivo']['fechacre_file']; ?>&nbsp;</td>
		<td><?php echo $archivo['Archivo']['mimetype']; ?>&nbsp;</td>
		<td><?php echo $archivo['Archivo']['tipodispositivo_file']; ?>&nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($archivo['User']['id_usuario'], array('controller' => 'users', 'action' => 'view', $archivo['User']['id_usuario'])); ?>
		</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $archivo['Archivo']['id_file'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $archivo['Archivo']['id_file'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $archivo['Archivo']['id_file']), null, sprintf(__('Are you sure you want to delete # %s?', true), $archivo['Archivo']['id_file'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Archivo', true), array('action' => 'add')); ?></li>
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