<h1>Archivos</h1>
<?php
 //pr($parent);
   //$formUrl = array('controller'=>'archivos','actions'=>'add');
   echo $form->create('Archivo',array('type' => 'file'));
   echo $form->input('tipodispositivo_file',array('options'=>array('web','Movil'),'label'=>'Dispositivo'));
   echo $form->input('nombre_file',array('type'=>'file','label'=>'Uploads'));

   echo $form->input('path_id_path',array('type'=>'hidden','value'=>'3','label'=>'Ruta'));
   echo $form->input('usuario_id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
   echo $form->end('Crear Archivos');
?>
