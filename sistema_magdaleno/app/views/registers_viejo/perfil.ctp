<?php
 //pr($even);
//print_r($mireg);
?>
<script type="text/javascript">
function cargarProvincias(){
 	var idPais= $("#RegisterPais").attr('alt');

         //alert(idPais);
        if(idPais == 'Venezuela'){
            $('#RegisterEstado').html('<option selected>Cargando</option>');
            $('#RegisterEstado').attr("disabled",'');
             $('#RegisterCiudad').attr("disabled",'');
            //alert("estados de venezuela");
            $.ajax({
               type: "POST",
               url: "<?php echo $html->url('/');?>pages/verestados",
               dataType: "html",
               success: function(msg){
                   //$('#hola').text("hola");
                   $('#RegisterEstado').html(msg);
                   //alert ("completado" + msg);
               }
               /*error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus + ": " + XMLHttpRequest.responseText);
                    $('#RegisterEstado').html('<option value='+XMLHttpRequest.responseText+'selected>'+XMLHttpRequest.responseText.estado+'</option>');
               }*/
             });
        }else{
            $('#RegisterEstado').attr("disabled",'disabled');
            $('#RegisterCiudad').attr("disabled",'disabled');
            $('#RegisterEstado').html('<option selected></option>');
            $('#RegisterCiudad').html('<option selected></option>');
            //alert("desabilitar boton");
        }

}

function cargarCiudades(id){
        //alert(id);
        if(id != null)
        {
            $('#RegisterCiudad').html('<option selected>Cargando</option>');
            $('#RegisterCiudad').attr("disabled",'');
            $.ajax({
               type: "POST",
               url: "<?php echo $html->url('/');?>pages/verciudad/"+id,
               dataType: "html",
               success: function(msg){
                   //$('#hola').text("hola");
                   $('#RegisterCiudad').html(msg);
                   //alert ("completado" + msg);
               }
               /*error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus + ": " + XMLHttpRequest.responseText);
                    $('#RegisterEstado').html('<option value='+XMLHttpRequest.responseText+'selected>'+XMLHttpRequest.responseText.estado+'</option>');
               }*/
             });
           }else{
                 $('#RegisterCiudad').attr("disabled",'disabled');
           }

}


      $('document').ready(function(){
      $("select#RegisterEstado").change(function(){
        var valor = $("#RegisterEstado").val();
        cargarCiudades(valor);

      });
            $('.divcorner').corner("10px");
            $('img.redondo1').imgr({size:"5px",color:"white",radius:"60px"});
            //$('img.eventothumb').imgr({size:"0px",radius:"20px"});
            //$('.imageView_container').imageView({width: 96, height:72});


            $('#btnface a').tooltip({
                track: true,
                delay: 0,
                showURL: false,
                showBody: " - ",
                fade: 250
            });

            $('#btntwi a').tooltip({
                track: true,
                delay: 0,
                showURL: false,
                showBody: " - ",
                fade: 250
            });

            $('#btncorreo a').tooltip({
                track: true,
                delay: 0,
                showURL: false,
                showBody: " - ",
                fade: 250
            });

            //$('.email').colorbox({width:"80%", height:"100%", iframe:true})
            /*$("#btnface").mouseover(function(){
                alert("tooltip");
            });


            $("#btnface").mouseoout(function(){
                alert("sali");
            });*/
        $('#bannerinf').flash(
                {
                        swf: '<?php echo $html->url('/')?>files/noticias/<?php echo $banner3[0]['Archivo']['nombre_file'];?>',
			width:<?php echo $banner3[0]['Banner']['width_banners']?>,
			height:<?php echo $banner3[0]['Banner']['height_banners']?>,
			quality: "high",

                       flashvars: {
                          url:'<?php echo $html->url('/',true)?>statistics/redirecturl/<?php echo $banner3[0]['Banner']['id_banners'];?>/<?php echo $idpromos?>'
                       }
               }
           );


        $("#RegisterPais").autocomplete({
                //source: availableTags

               	source: '<?php echo $html->url('/',true)?>registers/verpais',
                minLength: 1,
                 select: function(event, ui){
                     $("#RegisterPais").attr('alt', ui.item.id);
                     cargarProvincias();
                      $(".ui-autocomplete").css({'top':'232%','left':'22%'})
                     //alert(ui.item.id);
                     //alert(ui.item.value);
                 }
	});
        $(".ui-autocomplete").css({'top':'232%','left':'22%'});

    });
 </script>
<div class="span-24">

<div style="margin-top:20px;">

    </div>
<div class="span-24 last">
    <div class="fondobanner3" align="center" id="bannerinf" name="bannerinf">
                     
     </div>
  </div>
<div  class="span-24" style="height:30px;">
</div>
<div class="span-24 last contentmenu">
    <div class=" span-4" style="padding-left:8px;" >
        <img alt="logo" src="<?php echo $html->url('/')?>img/corner2.png"/>
    </div>
    <div class=" span-20 last" style="height: 35px;margin-top: -3px;margin-left: -20px; padding-top: 5px; background-repeat: no-repeat;background-image:url('<?php echo $html->url('/')?>img/menu.png') ">
        <ul style="list-style: none; display: inline;" class="mainmenu">
          <?php
                $nombre = array();
               for($i=1;$i<count($main);$i++){
         ?>

            <li style="display:inline; margin-left:35px;">

                    <a href="<?php echo $html->url('/')?><?php echo $link[$i];?>"><?php echo $main[$i]; ?></a>
            </li>

        <?php
               }
            //echo $main;
          ?>
       </ul>
    </div>
</div>
<div  class="span-24" style="height:30px;">
</div>

 <div class="loeqmusica span-5">
             <img alt="logo" src="<?php echo $html->url('/')?>img/textoperfil.png">
 </div>
 <div class="logmusic span-2 last">
             <img alt="logo" src="<?php echo $html->url('/')?>img/logoevento.png">
 </div>

    <div class="span-22 divcorner" style="background-color: #fff; height: auto; margin-left: 40px; margin-top: 30px;">
        <div class="span-22 last" style="margin-left: -2px;">
            <img src="<?php echo $html->url('/',true)?>img/btnperfil.png" />
        </div>
        <div class="span-21 fondoperfil">
    	
            <?php
                    echo $this->Form->create('Register',array('controller'=>'registers','action'=>'actualizardatos'));
                    print_r($datos);
                    echo $this->Form->input('idregistro',array('type'=>'hidden','value'=>$datos['Register']['idregistro']));
                    echo $this->Form->input('correo', array("label" => false, "class" => "email","error" => false,'value'=>$datos['Register']['correo']));
                    echo $this->Form->input('password', array("label" => false,"type"=>"text", "class" => "pass", "error" => false,'value'=>$datos['Register']['password']));
                    echo $this->Form->input('rpass', array("label" => false,"type"=>"text", "class" => "rpass","error" => false,'value'=>$datos['Register']['rpass']));
                    echo $this->Form->input('nombreape', array("label" => false, "class" => "nomape","error" => false,'value'=>$datos['Register']['nombreape']));
                    echo $this->Form->input('telefono', array("label" => false, "class" => "telefono","div"=>false,"error" => false,"maxlength"=>7,'value'=>$datos['Register']['telefono']));
                    echo $this->Form->input('fechanac',array('label'=>false,'selected'=>$datos['Register']['fechanac'],'minYear'=>'1940','maxYear'=>'2030','dateFormat'=>'DMY','monthNames'=>array('Seleccione','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre')));

                    if($datos['Register']['sexo'] == 'M'){
                       $attributes=array('legend'=>false,'class'=>'auto','default'=>'M');
                    }else{
                      $attributes=array('legend'=>false,'class'=>'auto','default'=>'F');
                    }
                    $options=array('M'=>'masculino','F'=>'femenino');
                    echo $form->radio('sexo',$options,$attributes);
                    echo $this->Form->input('pais',array("type"=>"text","class"=>"pais","label"=>false,'value'=>$datos['Register']['pais']));
                    echo $this->Form->input('estado',array("class"=>"estado","label"=>false,"options" => array('')));
                    echo $this->Form->input('ciudad',array("class"=>"ciudad","label"=>false,"options" => array('')));
                    if($datos['Register']['tecon'] == 1){
                        echo $this->Form->input('tecon',array("class"=>"auto","label"=>false,"type"=>"checkbox", "checked"=>true));
                    }else{
                        echo $this->Form->input('tecon',array("class"=>"auto","label"=>false,"type"=>"checkbox","checked"=>false));
                    }
                     if($datos['Register']['tecon'] == 1){
                        echo $this->Form->input('scor',array("class"=>"auto","label"=>false,"type"=>"checkbox", "checked"=>true));
                     }else{
                        echo $this->Form->input('scor',array("class"=>"auto","label"=>false,"type"=>"checkbox","checked"=>false));
                     }
                    echo $this->Form->input('cuentatwitter', array("label" => false, "class" => "twitter","error" => false,'value'=>$datos['Register']['cuentatwitter']));

                    echo $this->Form->submit('aceptar',array('class' => 'botonreg', 'title' => 'Custom Title'));
            ?>
	    
                
        </div>

        
    </div>
    <div  class="span-24" style="height:30px;">
    </div>
</div>