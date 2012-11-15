<script type="text/javascript">
    $('document').ready(function(){
            
	});
</script>

	 <!-- #gallery -->
	<?php //if((!empty($promos[0]['Promo']['thumbnails'])) and (!empty($promos[1]['Promo']['thumbnails'])) and (!empty($promos[2]['Promo']['thumbnails'])) and (!empty($promos[3]['Promo']['thumbnails'])) and (!empty($promos[4]['Promo']['thumbnails']))){?>
  <div style="margin-top:-150px;margin-left:-10px;">
    <div id="header1" ><div class="wrap" >
   <div id="slide-holder" >
	<div id="slide-runner">
			
	<?php //for($j=0;$j<$cont_promo;$j++){?>
		<?php if(!empty($promos[0]['Promo']['thumbnails'])){?>
		<a href="<?php echo $html->url('/',true)?>pages/detallepublicidad/<?php echo $promos[0][0]['fecha']."/".$promos[0]['Promo']['url']; ?>" ><img id="slide-img-1" src="<?php echo $html->url('/',true)?>files/promos/slider/<?php echo $promos[0]['Promo']['thumbnails'];?>"  class="slide" alt="" style="width:762px;height:280px;" /></a>
		<?php }
		if(!empty($promos[1]['Promo']['thumbnails'])){?>
		<a href="<?php echo $html->url('/',true)?>pages/detallepublicidad/<?php echo $promos[1][0]['fecha']."/".$promos[1]['Promo']['url']; ?>" ><img id="slide-img-2" src="<?php echo $html->url('/',true)?>files/promos/slider/<?php echo $promos[1]['Promo']['thumbnails'];?>"  class="slide" alt="" style="width:762px;height:280px;" /></a>
		<?php }
		if(!empty($promos[2]['Promo']['thumbnails'])){?>
		<a href="<?php echo $html->url('/',true)?>pages/detallepublicidad/<?php echo $promos[2][0]['fecha']."/".$promos[2]['Promo']['url']; ?>" ><img id="slide-img-3" src="<?php echo $html->url('/',true)?>files/promos/slider/<?php echo $promos[2]['Promo']['thumbnails'];?>"  class="slide" alt="" style="width:762px;height:280px;" /></a>
		<?php }
		if(!empty($promos[3]['Promo']['thumbnails'])){?>
		<a href="<?php echo $html->url('/',true)?>pages/detallepublicidad/<?php echo $promos[3][0]['fecha']."/".$promos[3]['Promo']['url']; ?>" ><img id="slide-img-4" src="<?php echo $html->url('/',true)?>files/promos/slider/<?php echo $promos[3]['Promo']['thumbnails'];?>"  class="slide" alt="" style="width:762px;height:280px;" /></a>
		<?php }
		if(!empty($promos[4]['Promo']['thumbnails'])){?>
		<a href="<?php echo $html->url('/',true)?>pages/detallepublicidad/<?php echo $promos[3][0]['fecha']."/".$promos[3]['Promo']['url']; ?>" ><img id="slide-img-5" src="<?php echo $html->url('/',true)?>files/promos/slider/<?php echo $promos[4]['Promo']['thumbnails'];?>"  class="slide" alt="" style="width:762px;height:280px;" /></a>
		<?php }?>
		
		<div id="slide-controls">
		 <p id="slide-client" class="text"><font color="white" size="2"><b><strong>Titulo:</font> </strong><font color="red" size="2"><span></span></b></font></p>
		 <font color="black" size="2"><p id="slide-desc" class="text"></p></font>
		 <p id="slide-nav"></p>
		</div>
	
	</div>
	
	<!--content featured gallery here -->
   </div>
   <script type="text/javascript">
	<?php //for($j=0;$j<$cont_promo;$j++){ ?>
    if(!window.slider) var slider={};slider.data=[
	<?php if(!empty($promos[0]['Promo']['texto_promo'])){?>
	{"id":"slide-img-1","client":"<?php echo $promos[0]['Promo']['texto_promo'];?>","desc":"<?php echo $promos[0]['Promo']['claves'];?>"},
	<?php }
	if(!empty($promos[1]['Promo']['texto_promo'])){?>
	{"id":"slide-img-2","client":"<?php echo $promos[1]['Promo']['texto_promo'];?>","desc":"<?php echo $promos[1]['Promo']['claves'];?>"}
	<?php }
	if(!empty($promos[2]['Promo']['texto_promo'])){?>
	,{"id":"slide-img-3","client":"<?php echo $promos[2]['Promo']['texto_promo'];?>","desc":"<?php echo $promos[2]['Promo']['claves'];?>"}
	<?php }
	if(!empty($promos[3]['Promo']['texto_promo'])){?>
	,{"id":"slide-img-4","client":"<?php echo $promos[3]['Promo']['texto_promo'];?>","desc":"<?php echo $promos[3]['Promo']['claves'];?>"}
	<?php }
	if(!empty($promos[4]['Promo']['texto_promo'])){?>
	,{"id":"slide-img-5","client":"<?php echo $promos[4]['Promo']['texto_promo'];?>","desc":"<?php echo $promos[4]['Promo']['claves'];?>"}
	<?php }?>
	];
	<?php //} //pr($promos);?>
  </script>
  
  </div></div>
  <?php //pr($promos);?>
  <?php //}else{?>
  <!--<a href="#" ><img id="slide-img-0" src="<?php echo $html->url('/',true)?>images/no_pic.png"  class="slide" alt="" style="width:762px;height:280px;" /></a>-->
  
  <?php //}?>
  
<div class="demo" style="width:779px;margin-bottom:-10px;">
<div id="accordion">
	<h3><a href="#section1">LOCALES</a></h3>
	
</div>
</div><!-- End demo -->

	<!-- Start demo FOTOS-->
	<?php if($cont_local >0){ ?>
	
	<div class="demo" style="margin-top:1px;margin-left:1px; width:783px; margin-bottom:150px;">
	
	<div class="scroll-pane ui-widget ui-widget-header ui-corner-all">
	<!--<div class="imgtwit">
		<img alt="eve" src="<?php //echo $html->url('/')?>images/imagenes.png"/>
	</div>-->
	<span id="toolTipBox"> </span>
	
		<div class="scroll-content">
		<?php 
		//pr($local);
		for($j=0;$j < $cont_local;$j++){ ?>
			<div class="scroll-content-item ui-widget-header">
			 
			<!--<a href="<?php echo $html->url('/',true)?>pages/detallegaleria/<?php echo $local[$j][0]['fecha']."/".$local[$j]['Locale']['url']; ?>" ><img src="<?php echo $html->url('/')?>files/locales/thumbnails/<?php echo $local[$j]['Locale']['nombre_file'];?>" style="margin-bottom:5px;height:100px;width:100px;"  onmouseover="toolTip('<?php echo $local[$j]['Locale']['nombre_empresa']; ?>',this)"></a>-->
			<a href="<?php echo $html->url('/',true)?>pages/detallelocales/<?php echo $local[$j]['Locale']['rif']; ?>/<?php echo $local[$j]['Locale']['nombre_empresa']; ?>" ><img src="<?php echo $html->url('/')?>files/locales/thumbnails/<?php echo $local[$j]['Locale']['nombre_file'];?>" style="margin-bottom:5px;height:100px;width:100px;" onmouseover="toolTip('<?php echo $local[$j]['Locale']['nombre_empresa']; ?>',this)" ></a>
			</div>
			
		<?php }
		 //pr($gal);
		?>
		</div>
		<div class="scroll-bar-wrap ui-widget-content ui-corner-bottom">
			<div class="scroll-bar"></div>
		</div>
	</div>
	</div><!-- End demo -->
	<?php }?>
</div>
  <!-- /#gallery -->
