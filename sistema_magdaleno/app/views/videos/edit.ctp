<h1>Adjuntar Video</h1>
<div>
    <h1 id="usu"><?php echo $html->link('Volver a la vista de consulta',array('action' => '/'));?></h1>
</div>
<?php
          /*echo $javascript->codeBlock(
            "$(function() {
                //run the currently selected effect
		function runEffect(){
                        var selectedEffect = 'blind';
			$('#effect').toggle(selectedEffect,500);
		};

		//set effect from select menu value
		$('#button').click(function() {
                        runEffect();
                        $('.demo').css('display','inline');
			return false;
		});

               $.ajax({
                  url: 'http://localhost/backendequilibrio/archivos/add',
                  data: 'value1=$news[1]',
                  success: function(data){
                   $(data).appendTo('#contentidoajax');
                  }
                });
        });"
    );*/
?>
<?php
 //pr($archivos);
   //echo $form->create('Video');
   //echo $html->link('Buscar Video','#',array('id'=>'button','class'=>'ui-state-default ui-corner-all'));
   //echo $form->create('Archivo',array('type' => 'file'));
   echo $form->create('Video',array('type' => 'file'));
   echo $form->input('usuario_id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
   echo $form->input('tipodispositivo_file',array('options'=>array('web','Movil'),'label'=>'Dispositivo'));
   echo $form->input('id_videos', array('type'=>'hidden'));
   echo $form->input('videoembed',array('type'=>'quote','label'=>'Embeber Video'));
   

   echo $form->input('titulo_video',array('type'=>'text','label'=>'titulo del video'));
   echo $form->input('etiqueta',array('type'=>'text','label'=>'Etiqueta'));
   echo $form->input('viddesta',array('type'=>'file','label'=>'subir Thumbnail Destacado'));
  ?>
  <div style="margin-top:2em; font-family:Arial;width: 120px; border: 1px solid black;">
        <img width="100" height="100" src="<?php echo $html->url('/',true);?>files/videothumbnail/<?php echo $archivos[0]['Archivo']['viddesta']?>"/>
    </div>
	<?php
   echo $form->input('vidthumbnail',array('type'=>'file','label'=>'subir video Thumbnail'));
   ?>
   <div style="margin-top:2em; font-family:Arial;width: 120px; border: 1px solid black;">
        <img width="100" height="100" src="<?php echo $html->url('/',true);?>files/videothumbnail/<?php echo $archivos[0]['Archivo']['vidthumbnail']?>"/>
    </div>
<div style="margin-top:2em; font-family:Arial; background-color: #98FB98; width: 300px;">
    <?php
           //pr($archivos);
            foreach($archivos as $ar)
           {
                echo $ar['Archivo']['vidthumbnail'];
                //echo $ar['Video']['vidthumbnail'];
           }
    ?>

</div>
<?php
   echo $form->input('embedthumb',array('type'=>'file','label'=>'Subir embed thumbnail'));
?>
	
	<div style="margin-top:2em; font-family:Arial;width: 120px; border: 1px solid black;">
        <img width="100" height="100" src="<?php echo $html->url('/',true);?>files/videothumbnail/<?php echo $archivos[0]['Archivo']['embedthumb']?>"/>
    </div>
    <div style="margin-top:2em; font-family:Arial; background-color: #98FB98; width: 300px;">
    <?php
           //pr($archivos);
            foreach($archivos as $ar)
           {
                echo $ar['Archivo']['embedthumb'];
                //echo $ar['Video']['vidthumbnail'];
           }
    ?>

</div>
<?php
   echo $form->input('destacado',array('type'=>'checkbox','label'=>'Marcar como destacado'));
   echo $form->input('descripcion',array('type'=>'quote','label'=>'Descripción'));
?>
<p><b>Este es el archivo asociado al video</b></p>
<div style="margin-top:2em; font-family:Arial; background-color: #98FB98; width: 300px;">
    <?php
           //pr($archivos);
            foreach($archivos as $archivo)
           {
                echo $archivo['Archivo']['nombre_file'];
           }
    ?>

</div>

<?php
   echo $form->input('id_file',array('type'=>'hidden','value'=>$archivos[0]['Archivo']['id_file']));
   echo $form->input('nombre_file',array('type'=>'file','label'=>'Uploads'));
    echo $form->input('Category',array('options'=>array($cat2),'label'=>'Categorias'));
   echo $form->input('path_id_path',array('type'=>'hidden','value'=>'3','label'=>'Ruta'));
   echo $form->end('Crear Video');
?>

<!--<div class="demo" style="display:none">

<div class="toggler">
	<div id="effect" class="ui-widget-content ui-corner-all">
		<h3 class="ui-widget-header ui-corner-all">Busqueda de Archivo</h3>
		<div id="contentidoajax">

                </div>

	</div>
</div>

</div>

<div style="display: none;" class="demo-description">

<p>Click the button above to preview the effect.</p>

</div>-->