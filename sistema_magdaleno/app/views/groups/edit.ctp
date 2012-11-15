<h1>Edicion de Usuarios</h1>
<?php
     echo $form->create('Group', array('action' => 'edit'));
     echo $form->input('name_grupos',array('label'=>'Nombre del Grupo'));
     echo $form->input('titulo_grupos', array('label' => 'Titulo'));
     echo $form->input('idgrupos', array('type'=>'hidden'));
     echo $form->end('Guardar Cambios');
?>