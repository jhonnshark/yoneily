<h1>Adjuntar Banner</h1>
<div>
    <h1 id="usu"><?php echo $html->link('Volver a la vista de consulta',array('action' => '/'));?></h1>
</div>
<?php

   echo $form->create('Banner',array('type' => 'file'));
   echo $form->input('link_banners',array('label'=>'link para el banner'));
   echo $form->input('tipodispositivo_file',array('options'=>array('web','Movil'),'label'=>'Dispositivo'));
   echo $form->input('type_banners',array('label'=>'Tipo de Banner'));
   echo $form->input('width_banners',array('label'=>'Ancho'));
   echo $form->input('height_banners',array('label'=>'Alto'));
   echo $form->input('posicion_banners',array('label'=>'Posicion del banner'));
   echo $form->input('path_id_path',array('type'=>'hidden','value'=>'3','label'=>'Ruta'));
   echo $form->input('usuario_id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
   echo $form->input('promo_idpromo',array('options'=>array($promos),'label'=>'Promocion'));
   echo $form->input('nombre_file',array('type'=>'file','label'=>'Uploads'));
   echo $form->input('tko_idtko',array('options'=>array($tkos),'label'=>'Take Over'));
   echo $form->input('Category',array('options'=>array($categories),'label'=>'Categorias'));
    echo $form->end('Guardar Banner');
?>
