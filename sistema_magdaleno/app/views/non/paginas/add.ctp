<h1>Crear Página</h1>
<?php
   echo $form->create('Pagina');
   echo $form->input('titulo', array('label' => 'Título'));
   echo $form->input('fondo', array('label' => 'Fondo'));
   echo $form->end('Crear Página');
?>