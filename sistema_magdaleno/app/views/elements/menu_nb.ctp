
<div class="span-15 last" style="border-width:0px; border-style:solid; border-color:red; margin-left:0px; padding-right:36px; padding-top:0px; height:180px;"> 
		<img src="<?php echo $html->url('/',true)?>nuevasbandasimg/imagenes/header02.png" alt="empresas" width="630" height="126" border="0" usemap="" />
		<div class="span-15 last" style="border-width:0px; border-style:solid; border-color:red; margin-left:0px; padding-right:36px; height:55px;">
			
			
			<!-- Boton Home -->
			<?php if((($this->here)=='/Nuevasbandas/index')or(($this->here)=='/Nuevasbandas')){ ?>
			<div class="span-2"><img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn011.png" name="inicio"  alt="inicio" border=0  height=54 width=80></div>
			<?php } else { ?>
			<div class="span-2"><A HREF="<?php echo $html->url(array('controller'=>'Nuevasbandas','action'=>'index'),true);?>" onMouseOver="rollover('inicio')" onMouseOut="rollout('inicio')"><img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn01.png" name="inicio"  alt="inicio" border=0  height=54 width=80></A>
			<SCRIPT TYPE="text/javascript">
				setrollover("<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn011.png");
			</SCRIPT>
			</div>
			<?php } ?>
			<!-- Boton Home -->
			
			<!-- Boton Evento -->
			<?php if((($this->here)=='/Nuevasbandas/eventos')or(($this->here)=='/eventos')){ ?>
			<div class="span-2"><img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn022.png" name="eventos"  alt="eventos" border=0  height=54 width=80></div>
			<?php } else { ?>
			<div class="span-2"><A HREF="<?php echo $html->url(array('controller'=>'Nuevasbandas','action'=>'eventos'),true);?>" onMouseOver="rollover('evento')" onMouseOut="rollout('evento')"><img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn02.png" name="evento"  alt="evento" border=0  height=54 width=80></A>
			<SCRIPT TYPE="text/javascript">
				setrollover("<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn022.png");
			</SCRIPT>
			</div>
			<?php } ?>
			<!-- Boton Evento -->
			
			<!-- Boton Noticias -->
			<?php $url = $this->here; $urlnoticias= substr($url,0, 22); $urlnoticiasdetalle= substr($url, 0,29); ?>
			<?php if(($urlnoticias == "/Nuevasbandas/noticias")or($urlnoticiasdetalle =="/Nuevasbandas/noticiasdetalle")){ ?>
			<div class="span-2">
			<?php if($urlnoticiasdetalle =="/Nuevasbandas/noticiasdetalle"){ ?>
				<A HREF="<?php echo $html->url(array('controller'=>'Nuevasbandas','action'=>'noticias'),true);?>">
					<img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn033.png" name="inicio"  alt="inicio" border=0  height=54 width=81>
				</A>
			<?php }else{ ?>
				<img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn033.png" name="inicio"  alt="inicio" border=0  height=54 width=81>
			<?php } ?>
			</div>
			<?php } else { ?>
			<div class="span-2"><A HREF="<?php echo $html->url(array('controller'=>'Nuevasbandas','action'=>'noticias'),true);?>" onMouseOver="rollover('noticia')" onMouseOut="rollout('noticia')"><img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn03.png" name="noticia"  alt="noticia" border=0  height=54 width=81></A>
			<SCRIPT TYPE="text/javascript">
				setrollover("<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn033.png");
			</SCRIPT>
			</div>
			<?php } ?>
			<!-- Boton Noticias -->
			
			<!-- Boton Fotos -->
			<?php $url = $this->here; $urlfotos= substr($url,0, 19); $urldetallefoto= substr($url, 0,25); ?>
			<?php if((($urlfotos)=='/Nuevasbandas/fotos')or(($urldetallefoto)=='/Nuevasbandas/detallefoto')){ ?>
			<div class="span-2">
				<?php if($urldetallefoto =="/Nuevasbandas/detallefoto"){ ?>
				<A HREF="<?php echo $html->url(array('controller'=>'Nuevasbandas','action'=>'fotos'),true);?>">
					<img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn044.png" name="foto"  alt="foto" border=0  height=54 width=80>
				</A>
				<?php }else{ ?>
					<img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn044.png" name="foto"  alt="foto" border=0  height=54 width=80>
				<?php } ?>
			</div>
			<?php } else { ?>
			<div class="span-2"><A HREF="<?php echo $html->url(array('controller'=>'Nuevasbandas','action'=>'fotos'),true);?>" onMouseOver="rollover('foto')" onMouseOut="rollout('foto')"><img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn04.png" name="foto"  alt="foto" border=0  height=54 width=80></A>
			<SCRIPT TYPE="text/javascript">
				setrollover("<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn044.png");
			</SCRIPT>
			</div> 
			<?php } ?>
			<!-- Boton Fotos -->
			
			<!-- Boton Videos -->
			<?php $url = $this->here; $urlvideos= substr($url,0, 20); $urldetallevideo= substr($url, 0,26);  ?>
			<?php if((($urlvideos)=='/Nuevasbandas/videos')or(($urldetallevideo)=='/Nuevasbandas/detallevideo')){ ?>
			<div class="span-2">
				<?php if($urldetallevideo =="/Nuevasbandas/detallevideo"){ ?>
				<A HREF="<?php echo $html->url(array('controller'=>'Nuevasbandas','action'=>'videos'),true);?>">
					<img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn055.png" name="video"  alt="video" border=0  height=54 width=80>
				</A>
				<?php }else{ ?>
					<img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn055.png" name="video"  alt="video" border=0  height=54 width=80>
				<?php } ?>
			</div>
			<?php } else { ?>
			<div class="span-2"><A HREF="<?php echo $html->url(array('controller'=>'Nuevasbandas','action'=>'videos'),true);?>" onMouseOver="rollover('video')" onMouseOut="rollout('video')"><img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn05.png" name="video"  alt="video" border=0  height=54 width=80></A>
			<SCRIPT TYPE="text/javascript">
				setrollover("<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn055.png");
			</SCRIPT>
			</div>
			<?php } ?>
			<!-- Boton Videos -->
			
			<!-- Boton Registro Usuario -->
			<div id="reg" class="span-2"><A HREF="#" onMouseOver="rollover('registro')" onMouseOut="rollout('registro')"><img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn06.png" name="registro"  alt="registro" border=0  height=54 width=80></A>
			<SCRIPT TYPE="text/javascript">
				setrollover("<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn066.png");
			</SCRIPT>
			</div>
			<!-- Boton Registro Usuario -->
			
			<!-- Boton Radio -->
			<div class="span-2"><A HREF="<?php echo $html->url(array('controller'=>'nuevasbandas','action'=>'index'),true);?>" onMouseOver="rollover('radio')" onMouseOut="rollout('radio')"><img src="<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn07.png" name="radio"  alt="radio" border=0  height=54 width=80></A>
			<SCRIPT TYPE="text/javascript">
				setrollover("<?php echo $html->url('/',true);?>nuevasbandasimg/imagenes/btn077.png");
			</SCRIPT>
			</div>
			<!-- Boton Radio -->
			
			<!-- Espacio Blanco -->
			<div class="span-1 last" style="border-width:0px; border-style:solid; border-color:red; margin-right:0px; padding-right:0px; height:55px;">
				<img src="<?php echo $html->url('/',true)?>nuevasbandasimg/imagenes/btn-space.png" alt="empresas" width="70" height="54" border="0" usemap="" />
			</div>
			<!-- Espacio Blanco -->
			
		</div>
</div>
<?php //echo '<font color="white">'.$urlnoticias.' '.$urlnoticiasdetalle.'</font>'; ?>