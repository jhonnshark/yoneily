<h1>Adjuntar Foto</h1>
<div>
    <h1 id="usu"><?php echo $html->link('Volver a la vista de consulta',array('action' => '/'));?></h1>
</div>
<?php

   echo $form->create('Archivo',array('type' => 'file','action'=>'subir'));
   echo $form->input('tipodispositivo_file',array('options'=>array('web','Movil'),'label'=>'Dispositivo'));
   echo $form->input('path_id_path',array('type'=>'hidden','value'=>'3','label'=>'Ruta'));
   echo $form->input('usuario_id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
   echo $form->input('gallery_id', array('type'=>'hidden','value'=>$idgal));
   //pr($promos);
   echo $form->input('nombre_gal',array('type'=>'file','label'=>'Foto grande galeria'));
   echo $form->input('nombre_thumb',array('type'=>'file','label'=>'Thumb galeria'));
   //echo $form->input('tko_idtko',array('options'=>array($tkos),'label'=>'Take Over'));
  echo $form->end('Subir Foto');
?>
