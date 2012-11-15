<h1>Adjuntar Takeover</h1>
<div>
    <h1 id="usu"><?php echo $html->link('Volver a la vista de consulta',array('action' => '/'));?></h1>
</div>
<?php

   echo $form->create('Tko',array('type' => 'file'));
   echo $form->input('link_tko',array('label'=>'link del takeover'));
   echo $form->input('tipodispositivo_file',array('options'=>array('web','Movil'),'label'=>'Dispositivo'));
   echo $form->input('width_tko',array('label'=>'Ancho del takeover'));
   echo $form->input('height_tko',array('label'=>'Alto del takeover'));
   echo $form->input('path_id_path',array('type'=>'hidden','value'=>'3','label'=>'Ruta'));
   echo $form->input('usuario_id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
   echo $form->input('nombre_file',array('type'=>'file','label'=>'Uploads'));
    echo $form->end('Guardar TakeOver');
?>

