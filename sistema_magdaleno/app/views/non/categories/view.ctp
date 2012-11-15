<div class="categories view">
<h2><?php  __('Category');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Categorias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['id_categorias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($category['ParentCategory']['id_categorias'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id_categorias'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre Categorias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['nombre_categorias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Link Categorias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['link_categorias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estilo Categorias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['estilo_categorias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fechacre Categorias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['fechacre_categorias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status Categorias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['status_categorias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($category['User']['id_usuario'], array('controller' => 'users', 'action' => 'view', $category['User']['id_usuario'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Categorias Id Categorias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['categorias_id_categorias']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category', true), array('action' => 'edit', $category['Category']['id_categorias'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Category', true), array('action' => 'delete', $category['Category']['id_categorias']), null, sprintf(__('Are you sure you want to delete # %s?', true), $category['Category']['id_categorias'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Backgrounds', true), array('controller' => 'backgrounds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Background', true), array('controller' => 'backgrounds', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Banners', true), array('controller' => 'banners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner', true), array('controller' => 'banners', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Galleries', true), array('controller' => 'galleries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gallery', true), array('controller' => 'galleries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Metatags', true), array('controller' => 'metatags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Metatag', true), array('controller' => 'metatags', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Menus', true), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu', true), array('controller' => 'menus', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Categories');?></h3>
	<?php if (!empty($category['ChildCategory'])):?>
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
		foreach ($category['ChildCategory'] as $childCategory):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $childCategory['id_categorias'];?></td>
			<td><?php echo $childCategory['parent_id'];?></td>
			<td><?php echo $childCategory['nombre_categorias'];?></td>
			<td><?php echo $childCategory['link_categorias'];?></td>
			<td><?php echo $childCategory['estilo_categorias'];?></td>
			<td><?php echo $childCategory['fechacre_categorias'];?></td>
			<td><?php echo $childCategory['status_categorias'];?></td>
			<td><?php echo $childCategory['usuario_id_usuario'];?></td>
			<td><?php echo $childCategory['categorias_id_categorias'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'categories', 'action' => 'view', $childCategory['id_categorias'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'categories', 'action' => 'edit', $childCategory['id_categorias'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'categories', 'action' => 'delete', $childCategory['id_categorias']), null, sprintf(__('Are you sure you want to delete # %s?', true), $childCategory['id_categorias'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Category', true), array('controller' => 'categories', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Backgrounds');?></h3>
	<?php if (!empty($category['Background'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id Background'); ?></th>
		<th><?php __('Fechacre Background'); ?></th>
		<th><?php __('File Id File'); ?></th>
		<th><?php __('Promo Idpromo'); ?></th>
		<th><?php __('Usuario Id Usuario'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['Background'] as $background):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $background['id_background'];?></td>
			<td><?php echo $background['fechacre_background'];?></td>
			<td><?php echo $background['file_id_file'];?></td>
			<td><?php echo $background['promo_idpromo'];?></td>
			<td><?php echo $background['usuario_id_usuario'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'backgrounds', 'action' => 'view', $background['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'backgrounds', 'action' => 'edit', $background['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'backgrounds', 'action' => 'delete', $background['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $background['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Background', true), array('controller' => 'backgrounds', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Banners');?></h3>
	<?php if (!empty($category['Banner'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id Banners'); ?></th>
		<th><?php __('Link Banners'); ?></th>
		<th><?php __('Type Banners'); ?></th>
		<th><?php __('Width Banners'); ?></th>
		<th><?php __('Height Banners'); ?></th>
		<th><?php __('Fechacre Banners'); ?></th>
		<th><?php __('Posicion Banners'); ?></th>
		<th><?php __('Usuario Id Usuario'); ?></th>
		<th><?php __('Promo Idpromo'); ?></th>
		<th><?php __('Tko Idtko'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['Banner'] as $banner):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $banner['id_banners'];?></td>
			<td><?php echo $banner['link_banners'];?></td>
			<td><?php echo $banner['type_banners'];?></td>
			<td><?php echo $banner['width_banners'];?></td>
			<td><?php echo $banner['height_banners'];?></td>
			<td><?php echo $banner['fechacre_banners'];?></td>
			<td><?php echo $banner['posicion_banners'];?></td>
			<td><?php echo $banner['usuario_id_usuario'];?></td>
			<td><?php echo $banner['promo_idpromo'];?></td>
			<td><?php echo $banner['tko_idtko'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'banners', 'action' => 'view', $banner['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'banners', 'action' => 'edit', $banner['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'banners', 'action' => 'delete', $banner['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $banner['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Banner', true), array('controller' => 'banners', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Galleries');?></h3>
	<?php if (!empty($category['Gallery'])):?>
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
		foreach ($category['Gallery'] as $gallery):
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
				<?php echo $this->Html->link(__('View', true), array('controller' => 'galleries', 'action' => 'view', $gallery['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'galleries', 'action' => 'edit', $gallery['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'galleries', 'action' => 'delete', $gallery['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $gallery['id'])); ?>
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
	<h3><?php __('Related Metatags');?></h3>
	<?php if (!empty($category['Metatag'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Idmetatag'); ?></th>
		<th><?php __('Value Metatag'); ?></th>
		<th><?php __('Fechacre Metatag'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['Metatag'] as $metatag):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $metatag['idmetatag'];?></td>
			<td><?php echo $metatag['value_metatag'];?></td>
			<td><?php echo $metatag['fechacre_metatag'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'metatags', 'action' => 'view', $metatag['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'metatags', 'action' => 'edit', $metatag['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'metatags', 'action' => 'delete', $metatag['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $metatag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Metatag', true), array('controller' => 'metatags', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Menus');?></h3>
	<?php if (!empty($category['Menu'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id Menus'); ?></th>
		<th><?php __('Name Menus'); ?></th>
		<th><?php __('Style Menus'); ?></th>
		<th><?php __('Fechacre Menus'); ?></th>
		<th><?php __('Usuario Id Usuario'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['Menu'] as $menu):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $menu['id_menus'];?></td>
			<td><?php echo $menu['name_menus'];?></td>
			<td><?php echo $menu['style_menus'];?></td>
			<td><?php echo $menu['fechacre_menus'];?></td>
			<td><?php echo $menu['usuario_id_usuario'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'menus', 'action' => 'view', $menu['id_menus'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'menus', 'action' => 'edit', $menu['id_menus'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'menus', 'action' => 'delete', $menu['id_menus']), null, sprintf(__('Are you sure you want to delete # %s?', true), $menu['id_menus'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Menu', true), array('controller' => 'menus', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
