<h1>Agregar grupos</h1>
<?php
   echo $form->create('Group');
   echo $form->input('name_grupos', array('label' => 'Nombre del Grupo'));
   echo $form->input('titulo_grupos', array('label' => 'Titulo'));
   echo $form->end('Crear Grupo');
?>