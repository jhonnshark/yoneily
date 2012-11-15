<h1>Editar Página</h1>
<?php
     echo $form->create('Pagina', array('action' => 'edit'));
     echo $form->input('titulo',array('label'=>'Título'));
     echo $form->input('fondo',array('label' => 'Fondo'));
     echo $form->end('Guardar Cambios');
?>