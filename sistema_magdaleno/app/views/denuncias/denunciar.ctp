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
               	source: '<?php echo $html->url('/',true)?>galleries/verlocal',
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
<center><img src="<?php echo $html->url('/',true)?>/img/banco.png" style="height:110px;" /><br/>
<h2>Denunciar Publicaci&oacute;n</h2>

<h2><font color="navy">Indique el Motivo por el cual hace la Denuncia</font></h2>
</center>
<?php

   echo $form->create('Denuncia');
   echo "<center><table class='textarea1' ><tr ><td >".$form->input('motivo',array('label'=>false,'type'=>'textarea'))."</td></tr></table></center>";
   echo $form->input('register_idregistro', array('type'=>'hidden','value'=>$usuario));
   echo $form->input('galeria_id_galeria', array('type'=>'hidden','value'=>$producto));
   echo $form->input('locale_id_local', array('type'=>'hidden','value'=>$local));
   echo "<center>".$form->end('Registrar')."</center>";
?>
