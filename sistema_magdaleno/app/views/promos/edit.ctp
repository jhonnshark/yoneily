<style type="text/css">
label {margin-left: 25%;}
span{margin-left: -25%;}
#buscar_seleccion{width: 250px;}
</style>

<script type="text/javascript">
    $('document').ready(function(){
	//BUSCAR PROVEEDOR
        $("#buscar_local").keyup(function(event){
			if(($('#buscar_local').val())==""){
				//no muestra el loader
			}else{
				$("#paisloader").show();	
			}
			//alert(event.keyCode);
		});
        $("#buscar_local").autocomplete({
                //source: availableTags
               	source: '<?php echo $html->url('/',true)?>promos/verlocal',
                minLength: 1,
                 select: function(event, ui){
                     $("#buscar_local").attr('alt', ui.item.id);
                      $(".ui-autocomplete").css({'top':'1%'})
                     //alert(ui.item.id);
                     //alert(ui.item.value);
                 },
				 open: function(event, ui){
					$("#paisloader").hide();
				 }
		});
	$(".ui-autocomplete").css({'top':'1%'});
	});
</script>
<center><img src="<?php echo $html->url('/',true)?>/img/galeria.png" style="height:80px;" width='80' /><br/>

</center>
<div class="capa">
<?php
	echo "<div class='titulo_barra'><h2>Modificar Promoci&oacute;n</h2></div>";
	echo $form->create('Promo',array('type' => 'file'));
    echo $form->input('texto_promo',array('label'=>'Título de la  Promoci&oacute;n'));
    echo $form->input('claves',array('label'=>'Palabras Claves'));
    echo $form->input('cantidad',array('label'=>'Cantidad en Producto'));
    echo $form->input('precio',array('label'=>'Precio por Producto'));
    if(!empty($empresa)){
		echo $form->input('locale_id_local',array('label'=>'Nombre del Local','value'=>$empresa,'disabled'=>'disabled'));
		echo $form->input('locale_id_local',array('label'=>false,'value'=>$empresa,'type'=>'hidden'));
    }else{
		echo $form->input('locale_id_local',array('label'=>'Nombre del Local','id'=>'buscar_local'));
	}
	echo $form->input('garantia',array('label'=>'Garantia:','id'=>'buscar_seleccion','options'=>array(
      'Si'=>'Si',
	  'No'=>'No'
	   ),'empty'=>'Seleccione'
       ));
	
    echo $form->input('thumbnails',array('type'=>'file','label'=>'Imagen del Producto'));
    echo $form->input('publicar',array('type'=>'checkbox','label'=>'<span>Publicar</span>'));
    echo $form->input('descripcion',array('label'=>'Descripci&oacute;n'));
    echo $form->input('id_promo', array('type'=>'hidden'));
    echo $form->input('usuario_id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
    echo "<br/>".$form->end('Editar Promocion')."<br/>";
	
	
?>
</div>

