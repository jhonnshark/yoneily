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
 //pr($parent);
   //echo $form->create('Video');
   //echo $html->link('Buscar Video','#',array('id'=>'button','class'=>'ui-state-default ui-corner-all'));
   //echo $form->create('Archivo',array('type' => 'file'));
   echo $form->create('Video',array('type' => 'file'));
   echo $form->input('usuario_id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
   echo $form->input('tipodispositivo_file',array('options'=>array('web','Movil'),'label'=>'Dispositivo'));
   echo $form->input('videoembed',array('type'=>'quote','label'=>'Embeber Video'));
   //echo $form->input('archivos_id_file',array('type'=>'hidden','value'=>''));
   echo $form->input('nombre_file',array('type'=>'file','label'=>'Uploads'));
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
