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
<center><img src="<?php echo $html->url('/',true)?>/img/galeria.png" style="height:110px;" /><br/>
<h2>Modificar Promoci&oacute;n</h2>
</center>
<?php
	//pr($empresa);
	echo $form->create('Promo',array('type' => 'file'));
    echo "<table class='formpequeno'><tr><td>".$form->input('texto_promo',array('label'=>'Título de la  Promoci&oacute;n'))."</td>";
    echo "<td>".$form->input('claves',array('label'=>'Palabras Claves'))."</td></tr>";
    echo "<tr><td>".$form->input('cantidad',array('label'=>'Cantidad en Producto'))."</td>";
    echo "<td>".$form->input('precio',array('label'=>'Precio por Producto'))."</td></tr>";
    if(!empty($empresa)){
		echo "<tr><td>".$form->input('locale_id_local',array('label'=>'Nombre del Local','value'=>$empresa,'disabled'=>'disabled'))."</td>";
		echo $form->input('locale_id_local',array('label'=>false,'value'=>$empresa,'type'=>'hidden'))."</td>";
    }else{
		echo "<tr><td>".$form->input('locale_id_local',array('label'=>'Nombre del Local','id'=>'buscar_local'))."</td>";
	}
	echo "<td class=formpequeno>".$form->input('garantia',array('label'=>'Garantia:','id'=>'buscar_seleccion','options'=>array(
      'Si'=>'Si',
	  'No'=>'No'
	   ),'empty'=>'Seleccione'
       ))."</td>";
	echo "</tr>";
    echo "<tr><td>".$form->input('thumbnails',array('type'=>'file','label'=>'Subir Imagen del Producto'))."</td>";
    echo "<td>".$form->input('publicar',array('type'=>'checkbox','label'=>'Publicar'))."</td></tr></table>";
    echo "<center><table class='textarea1' ><tr ><td >".$form->input('descripcion',array('label'=>'Descripci&oacute;n'))."</td></tr></table></center>";
    echo $form->input('id_promo', array('type'=>'hidden'));
    echo $form->input('usuario_id_usuario', array('type'=>'hidden','value'=>$session->read('Auth.User.id_usuario')));
    echo $form->end('Editar Promocion');
	
	
?>

