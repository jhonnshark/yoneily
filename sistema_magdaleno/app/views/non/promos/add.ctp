<div class="promos form">
<?php echo $this->Form->create('Promo');?>
	<fieldset>
 		<legend><?php __('Agregar Promoción'); ?></legend>
	<?php
		echo $this->Form->input('name_promo',array('label'=>'Nombre de la promoción'));
                echo $this->Form->input('usuario_id_usuario',array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar Promo', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Consultar promociones', true), array('action' => 'index'));?></li>
	</ul>
</div>