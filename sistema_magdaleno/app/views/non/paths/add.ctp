<div class="paths form">
<?php echo $this->Form->create('Path');?>
	<fieldset>
 		<legend><?php __('Agregar Path'); ?></legend>
	<?php
		echo $this->Form->input('url_path');
		echo $this->Form->input('fechacre_path');
		echo $this->Form->input('usuario_id_usuario',array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Paths', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>