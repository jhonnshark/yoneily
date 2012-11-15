<h1>Crear Categorias</h1>
<?php
 //pr($parent);
   echo $form->create('Category');
   echo $form->input('categorias_id_categorias',array('options'=>array($parent),'label'=>'Categoria Padre'));
   //echo $form->input('groups_idgrupos', array('options' =>array($groups),'label'=>'Perfil'));
   echo $form->input('nombre_categorias', array('label' => 'Titulo de la categoria'));
   echo $form->input('status_categorias', array('type'=>'checkbox','label'=>'Publicar'));
   echo $form->input('usuario_id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
    echo $form->end('Crear Categorias');
?>
