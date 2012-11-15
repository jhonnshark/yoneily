<h1>Subir Archivo</h1>
<?php
   echo $form->create('Parchivo',array('type' => 'file'));
   echo $form->input('name', array('label' => 'Nombre','type'=>'file'));
   echo $form->input('width', array('label' => 'Ancho'));
   echo $form->input('height', array('label' => 'Alto'));
   echo $form->input('id_pagina', array('type'=>'hidden','value'=>$pagina));
   echo $form->end('Subir Archivo');
?>