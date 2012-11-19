<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Muebles de Magdaleno'); ?>
		<?php //echo $title_for_layout; ?>
	</title>
	<?php
		echo '<meta name="keywords" content="Venezuela, Muebles, magdaleno, Cagua" />';
		echo '<meta name="description" content="Muebles de Magdaleno, Sistema de Ventas" />';
		echo $scripts_for_layout;
                             
	?>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $html->url('/')?>favicon/logo.ico">
        <script src="<?php echo $html->url('/')?>js/jquery-1.4.2.min.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/')?>js/jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script>
		<link href="<?php echo $html->url('/')?>css/menu_navegacion.css" type="text/css" rel="stylesheet">
		<script src="<?php echo $html->url('/')?>js/jquery-1.7.1.min.js" type="text/javascript"></script> 
	    <script src="<?php echo $html->url('/')?>js/modernizr-2.0.6.min.js" type="text/javascript"></script> 
		<script src="<?php echo $html->url('/')?>js/roundabout_shapes.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/')?>js/scripts.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/')?>js/ajax.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo $html->url('/')?>js/tooltic.js"></script>
		<?php echo $html->css(array('jquery-ui-1.8.5.custom','nuevo','slider','demos'));?>
    <style type="text/css">
		#demo-frame > div.demo { padding: 10px !important; }
		.scroll-pane { overflow: auto; width: 99%; float:left; }
		.scroll-content { width: 2440px; float: left; }
		.scroll-content-item { width: 100px; height: 100px; float: left; margin: 10px; font-size: 3em; line-height: 96px; text-align: center; }
		* html .scroll-content-item { display: inline; } /* IE6 float double margin bug */
		.scroll-bar-wrap { clear: left; padding: 0 4px 0 2px; margin: 0 -1px -1px -1px; }
		.scroll-bar-wrap .ui-slider { background: none; border:0; height: 2em; margin: 0 auto;  }
		.scroll-bar-wrap .ui-handle-helper-parent { position: relative; width: 100%; height: 100%; margin: 0 auto; }
		.scroll-bar-wrap .ui-slider-handle { top:.2em; height: 1.5em; }
		.scroll-bar-wrap .ui-slider-handle .ui-icon { margin: -8px auto 0; position: relative; top: 50%; }
	</style>
	<script type="text/javascript">
	$(function() {
		//scrollpane parts
		var scrollPane = $('.scroll-pane');
		var scrollContent = $('.scroll-content');
		
		//build slider
		var scrollbar = $(".scroll-bar").slider({
			slide:function(e, ui){
				if( scrollContent.width() > scrollPane.width() ){ scrollContent.css('margin-left', Math.round( ui.value / 100 * ( scrollPane.width() - scrollContent.width() )) + 'px'); }
				else { scrollContent.css('margin-left', 0); }
			}
		});
		
		//append icon to handle
		var handleHelper = scrollbar.find('.ui-slider-handle')
		.mousedown(function(){
			scrollbar.width( handleHelper.width() );
		})
		.mouseup(function(){
			scrollbar.width( '100%' );
		})
		.append('<span class="ui-icon ui-icon-grip-dotted-vertical"></span>')
		.wrap('<div class="ui-handle-helper-parent"></div>').parent();
		
		//change overflow to hidden now that slider handles the scrolling
		scrollPane.css('overflow','hidden');
		
		//size scrollbar and handle proportionally to scroll distance
		function sizeScrollbar(){
			var remainder = scrollContent.width() - scrollPane.width();
			var proportion = remainder / scrollContent.width();
			var handleSize = scrollPane.width() - (proportion * scrollPane.width());
			scrollbar.find('.ui-slider-handle').css({
				width: handleSize,
				'margin-left': -handleSize/2
			});
			handleHelper.width('').width( scrollbar.width() - handleSize);
		}
		
		//reset slider value based on scroll content position
		function resetValue(){
			var remainder = scrollPane.width() - scrollContent.width();
			var leftVal = scrollContent.css('margin-left') == 'auto' ? 0 : parseInt(scrollContent.css('margin-left'));
			var percentage = Math.round(leftVal / remainder * 100);
			scrollbar.slider("value", percentage);
		}
		//if the slider is 100% and window gets larger, reveal content
		function reflowContent(){
				var showing = scrollContent.width() + parseInt( scrollContent.css('margin-left') );
				var gap = scrollPane.width() - showing;
				if(gap > 0){
					scrollContent.css('margin-left', parseInt( scrollContent.css('margin-left') ) + gap);
				}
		}
		
		//change handle position on window resize
		$(window)
		.resize(function(){
				resetValue();
				sizeScrollbar();
				reflowContent();
		});
		//init scrollbar size
		setTimeout(sizeScrollbar,10);//safari wants a timeout
	});
	</script> 
	<script>
	$(function() {
		$( "#accordion" ).accordion({
			autoHeight: false,
			navigation: true
		});
	});
	</script>
	<script type="text/javascript">
$('document').ready(function(){
	$("#reg").click(function(){
                 var url = '<?php echo $html->url('/',true)?>registers/add/';
				// alert('entro aqui');
				 //alert(url);
                 var d = $('#dialog-modal').html('<iframe width="640" height="520" id="ifrm"></iframe>');
				 //alert(d);
                $("#dialog-modal>#ifrm").attr("src", url);
                var $width = 681;
                var $height = 600;
                var horizontalPadding = 50;
                var verticalPadding = 5;
                $( "#dialog:ui-dialog2" ).dialog("destroy");
				d.dialog({
                    dialogClass: "centrar",
                    autoOpen: true,
                    width: $width,
                    height: $height,
                    modal: true
                });
                $('.centrar.ui-dialog').css({
                    left:"19%",
                    top:'8%'
                });
        });

	    $("#log").click(function(){
                 var url = '<?php echo $html->url('/',true)?>registers/loginequi/';
				// alert('entro aqui');
				 //alert(url);
                 var d = $('#dialog-modal').html('<iframe width="640" height="520" id="ifrm"></iframe>');
				 //alert(d);
                $("#dialog-modal>#ifrm").attr("src", url);
                var $width = 681;
                var $height = 600;
                var horizontalPadding = 50;
                var verticalPadding = 5;
                $( "#dialog:ui-dialog2" ).dialog("destroy");
				d.dialog({
                    dialogClass: "centrar",
                    autoOpen: true,
                    width: $width,
                    height: $height,
                    modal: true
                });
                $('.centrar.ui-dialog').css({
                    left:"19%",
                    top:'8%'
                });
        });

    });
	
</script>
</head>
<body>
	<center>
		<div class="sesion">
			<div class="cflogo_up">
				<div id="header" ></div>
			</div>
			
			<div style="margin-top:-40px;margin-left:27%;"><?php echo $this->element("admin/navigation"); ?></div>
				
			
					<?php if($this->Session->check('nombreusuario') && $this->Session->check('keyus')){?>
							<div style="margin-top:0px;">
							<b><font color="navy" face="arial" size="4">Hola: <?php echo $this->Session->read('nombreusuario'); ?></font></b>  | <a href="<?php echo $html->url('/')?>registers/miperfil/<?php echo $this->Session->read('keyus'); ?>"><font  face="arial" size="4"><b>Mi perfil</b></font></a> | <a href="<?php echo $html->url('/')?>ventas/miscompras"><font face="arial" size="4"><b>Compras</b></font></a> | <a href="<?php echo $html->url('/')?>ventas/mismensajes"><font face="arial" size="4"><b>Mensajes</b></font></a> | <a href="<?php echo $html->url('/')?>ventas/misreclamos"><font face="arial" size="4"><b>Reclamos</b></font></a> |  <a href="<?php echo $html->url('/')?>registers/salir"><font face="arial" size="4"><b>Cerrar Sesion</b></font></a> 
							</div>
							
						<?php }?>
		

		</div>
		
	</center>
	<center>
		
		<div id="page">
			
			<div id="content" style="margin-top:-10px;">
				<center>

		
		
					<?php echo $content_for_layout; ?>
					<?php echo $this->Session->flash(); ?>
					<?php echo $session->flash('auth');?>
			</div>
		</center>
		
			
		</div>
		<center>
			
			<div id="footer">
			<p><font color="black"><b>Siguenos en nuestras Redes Sociales</b></font><br>
				<a href="https://www.facebook.com/ElPuntoArtesanalDeMagdaleno?ref=hl" target="_blank" alt="Facebook" style="margin-top:-20px;"><img src="<?php echo $html->url('/',true)?>/images/facebook.png" width="50" height="50" onmouseover="toolTip(' Facebook ',this)" /></a>
				<a href="https://twitter.com/yoneylith" alt="Twitter" target="_blank" ><img src="<?php echo $html->url('/',true)?>/images/twitter.png" width="50" height="50" onmouseover="toolTip(' Twitter ',this)"/></a>
			</p>
			</div>
			</center>
	</center>
	<?php echo $this->element('sql_dump'); ?>
	<div id="dialog-modal" title="Bienvenido" style="display:none;">
		<p>Probando</p>
	</div>
</body>
</html>