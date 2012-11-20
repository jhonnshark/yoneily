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
                var $width = 660;
                var $height = 570;
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
                    left:"25%",
                    top:'2%'
                });
        });

	    $("#log").click(function(){
                 var url = '<?php echo $html->url('/',true)?>registers/loginequi/';
				// alert('entro aqui');
				 //alert(url);
                 var d = $('#dialog-modal').html('<iframe width="640" height="520" id="ifrm"></iframe>');
				 //alert(d);
                $("#dialog-modal>#ifrm").attr("src", url);
                var $width = 660;
                var $height = 570;
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
                    left:"25%",
                    top:'2%'
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
			<div><?php echo $this->element("admin/navigation"); ?></div>

			<?php if($this->Session->check('nombreusuario') && $this->Session->check('keyus')){?>
			<style type="text/css">
				ul.nav > li:hover {
				    width:492px;
				}

				ul.nav > li a.ie6:hover {
				    direction:ltr;
				    width:492px;
				}
			</style>
				<!--Menu secundario de usuarios -->
				    <ul class="nav">
				        <li>
				        <!--[if lte IE 6]><a class="ie6" href="#url"><table><tr><td><![endif]-->
				            <ul class="panel2">
				            	<li><a href="<?php echo $html->url('/')?>registers/miperfil/<?php echo $this->Session->read('keyus'); ?>"><b>Mi Perfil</b><div class="perfil"></div></a></li>
				                <li><a href="<?php echo $html->url('/')?>ventas/misreclamos"><b>Denuncias</b><div class="claim"></div></a></li>
				                <li><a href="<?php echo $html->url('/')?>ventas/miscompras"><b>Comprar</b><div class="buy"></div></a></li>
				                <li><a href="<?php echo $html->url('/')?>registers/salir" ><b>Salir</b><div class="close"></div></a></li>
				            </ul>
				        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
				        </li>
				    </ul>
				    <div style="clear:both"></div>			
				<!--Fin del menu secundario -->

					<?php }else {?>
				<!--Menu secundario de usuarios -->
				    <ul class="nav">
				        <li>
				        <!--[if lte IE 6]><a class="ie6" href="#url"><table><tr><td><![endif]-->
				            <ul class="sub">
				                <li><a id="reg" href="#"><b>Registrate</b><i></i></a></li>
				                <li><a id="log" href="#"><b>Entrar</b><i></i></a></li>
				                <li><a href="http://localhost/git/yoneily/sistema_magdaleno/users/login" target="_blank"><b>Administrador</b><i></i></a></li>
				            </ul>
				        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
				        </li>
				    </ul>
				    <div style="clear:both"></div>			
				<!--Fin del menu secundario -->

						<?php }?>
		

		</div>
		
	</center>
	
		
		<div id="page">
			
			<div id="content">
				<center>

		
		
					<?php echo $content_for_layout; ?>
					<?php echo $this->Session->flash(); ?>
					<?php echo $session->flash('auth');?>
			</div>
		</center>
		
			
		</div>
		<footer>
	            <div id="footer">
	                <section class="footer_bottom">
	                	<div class="inner">
	                
	                    	<div class="block_copyrights">
	                        	<p>J.E.D &copy; 2012&nbsp;&nbsp;|&nbsp;&nbsp;Richar Pérez, Yoneylith Osorio</p>
	                        </div>                        
	                        <div class="clearboth"></div>
	                    </div>
	                </section>
	            </div>
	    </footer>
	
	<?php echo $this->element('sql_dump'); ?>
	<div id="dialog-modal" title=".::Bienvenido::." style="display:none;">
	</div>
</body>
</html>