<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Equilibrio.Net:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<!--<meta property="og:description" content="Probando desdel el home de equilibrio.net"/>
	<meta property="og:image" content="<?php echo $html->url('/',true)?><?php echo $ogimage ?>"/>-->
	
	<?php
			 
		echo $this->Html->meta('icon');
                if(!empty($metanoti)){
                    echo $html->meta(
                            'keywords',
                            $metanoti[0]['News']['keywords']
                    );
                    echo $html->meta(
                                    'description',
                                    $metanoti[0]['News']['description']
                    );
	?>
				<meta property="og:image" content="<?php echo $html->url('/',true)?><?php echo $ogimage ?>"/>
				<meta property="og:description" content="<?php echo $metanoti[0]['News']['description']?>"/>				
	<?php
                }
    ?>
	<?php
		if(!empty($vid)){
	?>
		<meta property="og:image" content="<?php echo $html->url('/',true)?>files/videothumbnail/<?php echo $vid[0]["Archivo"]["embedthumb"] != ""?$vid[0]["Archivo"]["embedthumb"]:$vid[0]["Archivo"]["vidthumbnail"]; ?>"/>
		<meta property="og:description" content="<?php echo $vid[0]["Video"]["descripcion"];?>"/>
		<meta property="og:title" content="<?php echo $vid[0]["Video"]["titulo_video"];?>"/>
	<?php			
		}		
		if(!empty($desta)){			
		?>
			<meta property="og:image" content="<?php echo $html->url('/',true)?>files/videothumbnail/<?php echo $desta[0]["Archivo"]["embedthumb"] != ""?$desta[0]["Archivo"]["embedthumb"]:$desta[0]["Archivo"]["vidthumbnail"];; ?>"/>
			<meta property="og:description" content="<?php echo $desta[0]["Video"]["descripcion"];?>"/>
			<meta property="og:title" content="<?php echo $desta[0]["Video"]["titulo_video"];?>"/>
		<?php	
		}

	
	
                if(!empty($metadatos)){
                    echo $html->meta(
                            'keywords',
                            $metadatos[0]['met']['keywords']
                    );
                    echo $html->meta(
                                    'description',
                                    $metadatos[0]['met']['description']
                    );
	?>
			<!--<meta property="og:description" content="<?php echo $metadatos[0]['met']['description']?>"/>-->
	<?php
                }

		//echo $this->Html->css('cake.generic');
		
		echo $scripts_for_layout;

	?>
 	    
		<script src="<?php echo $html->url('/',true)?>js/jquery-1.4.2.min.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/tiny_mce/tiny_mce.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/prueba.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/jquery.swfobject.1-1-1.min.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/admin.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/jquery.swfobject.1-1-1.min.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/jquery.elastic-1.6.1.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/jquery.field.min.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/jquery.hoverIntent.minified.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/jquery.slug.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/jquery.tipsy.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/superfish.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/supersubs.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/jquery.cookie.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/jquery.uuid.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/jquery-uniqueArray.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/farbtastic.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/jquery.corner.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/glossy.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/cvi_glossy_lib.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/jquery.imgr.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/jquery.thumbs.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/jquery.imageView.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/swfaddress.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/swfobject.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/jquery.bgiframe.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/jquery.dimensions.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/jquery.tooltip.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/jquery.tooltip.min.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/jquery.colorbox.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/jquery.validate.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/jquery.ad-gallery.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/takeover.js" type="text/javascript"></script>	

		<?php echo $html->css(array('jquery-ui-1.8.5.custom','jquery-ui-1.8.9.custom','frontend','screen','ie','jquery.thumbs','jquery.tooltip','colorbox','jquery.ad-gallery','googlesc'));?>
		
        <script type="text/javascript">
			window.onerror = new Function("return true");
			$(document).ready(function(){
				
				$("#reg").click(function(){
                 var url = '<?php echo $html->url('/',true)?>registers/add/';
                 var d = $('#dialog-modal').html('<iframe width="850" height="500" id="ifrm"></iframe>');
                $("#dialog-modal>#ifrm").attr("src", url);
                var $width = 881;
                var $height = 550;
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
                 var d = $('#dialog-modal').html('<iframe width="850" height="300" id="ifrm"></iframe>');
                $("#dialog-modal>#ifrm").attr("src", url);
                var $width = 881;
                var $height = 350;
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
            $(".gsc-search-box").css('background-color','black');
            $(".gsc-input").css('height','52px');

              
                
			
			
		});
				
        </script>
		<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1066207-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
    <?php       
    if(!empty ($bck)){
        if($bck != ""){
    ?>
    <body style="background-repeat: no-repeat; background-position:top; background-color: <?php echo $bck[0]['Background']['bgcolor']; ?>; background-image: url('<?php echo $html->url('/',true)?>files/noticias/<?php echo $bck[0]['Archivo']['nombre_file'];?>')" >
    <?php
        }else{?>
            <body>
		<?php
        }
    }
    ?>
    <div class="container" >
		<div class="span-24 header">
                    <div class="fondoheader">
                        <div class="movelogo span-1 last">
                            <a href="<?php echo $html->url('/',true)?>"><img alt="equilibrio" src="<?php echo $html->url('/',true)?>img/logo.png"/></a>
                        </div>
						
                        <?php
                            if($this->Session->check('nombreusuario') && $this->Session->check('keyus')){

                        ?>
                        <div class="cflogo span-10 last">
                            <a href="<?php echo $html->url('/')?>salir">Salir</a> | <a id="usu" href="<?php echo $html->url('/')?>registers/edit">Hola: <?php echo $this->Session->read('nombreusuario'); ?></a>
                        </div>
                        <?php
                            }else{
                        ?>
                        <div class="cflogo span-3 last">
                            <a id="log" href="#">Ingresa</a> | <a id="reg" href="#">Reg&iacute;strate</a>
                        </div>
                        
						
						<div class="cflogo span-1 last">
                            <input id="fb-auth" type="image" value="Login" src="<?php //echo $html->url('/', true); ?>img/icono-facebook.gif" alt="Facebook"  style="width:22px; height:23px; margin-left:10px; margin-top: -3px;"/>
							<!--<img id="fb-auth" src="<?php //echo $html->url('/', true); ?>img/icono-facebook.gif" />-->
							<!--<div style="width:22px; height:23px; margin-left:10px"><img id="fb-auth" src="<?php //echo $html->url('/', true); ?>img/icono-facebook.gif" /></div>-->
							<div id="fb-root"></div>
							
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <script type="text/javascript">
      // initialize the library with the API key
      
	  var connect = false;
	  //FB.init({ apiKey:'121382464605639'});
		
	  var button = $('#fb-auth');		
				$(button).click ( 
					function() {
						//alert("click");
						FB.init({
							 appId  : '121382464605639',
							 status : true, // check login status
							 cookie : true, // enable cookies to allow the server to access the session
							 xfbml  : true  // parse XFBML
						});
						FB.getLoginStatus(updateButton,true);				
					}
				);
				
	  function updateButton(response) {
			//alert(response);
			//alert(print_r(response));
				if (response.session && !connect) {
					 //alert("update1");
					connect = true;
					consultarUser();
				}else{
					 //alert("update2");
					connect = false;
					FB.login(function(response) {
						if (response.session && response.perms) {
							connect = true;
							consultarUser();
						}
					},{perms:'publish_stream,email,user_birthday'});
				}
        }
	
		function updateConnect(response)
		{
				
				if (response.session ) {
					connect = true;					
				}else{
					connect = false;	
					
				}
		}
		
		function consultarUser() {
					//$(".loader").css("display","inline");
					//alert("consulta");
					if(!connect)
					{
						FB.getLoginStatus(updateButton);
						return;
					}
					FB.api('/me', function(response) {
						var dataFacebook="";
						if(response.error)
						{
							for (var key in response.error) {
								if(dataFacebook != "")
								{
									dataFacebook += "&";
								}
								dataFacebook += key +" = "+ response[key];
							}
							//alert("error en facebook"+dataFacebook);
							//$("#salida").text("Ha ocurrido un error. Estamos trabajando en solucionarlo.");
							//$("#salida").attr("class","span-6 error");
							//$(".loader").css("display","none");
							return;
						}else{
						
							for (var key in response) {
								if(dataFacebook != "")
								{
									dataFacebook += "&";
								}
								dataFacebook += key +" = "+ response[key];
							}
														
							var id_redsocial = response.id;
							var email=response.email;
							//var dataString = '&idfb=' + id_redsocial;

                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?php echo $html->url('/',true);?>registers/loginfacebook/"+id_redsocial+'/'+email,
                                                           dataType: "html",
                                                           success: function(msg){
                                                              //alert(msg);
                                                             $("#cargador").css('display','none');
                                                             if(msg == 1){
                                                                 $("#respuesta").html("Bienvenido a equilibrio");
                                                                 location.reload();
                                                                 //setTimeout('direccionar()',0*1000);
                                                             }else{
                                                                 $("#respuesta").html("El usuario no existe en la base de datos");
                                                                 //location.reload();
                                                                 //setTimeout('recargar()',0*1000);
																 
																	 var url = '<?php echo $html->url('/',true)?>registers/add/';
																	 var d = $('#dialog-modal').html('<iframe width="850" height="500" id="ifrm"></iframe>');
																	$("#dialog-modal>#ifrm").attr("src", url);
																	var $width = 881;
																	var $height = 550;
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
                                                             }




                                                             }
                                                        });
							//alert("mis datos de facebook"+dataFacebook);
							
						}
					});
				
            }
            /*
				
      // fetch the status on load
      FB.getLoginStatus(handleSessionResponse);

      $('#fb-auth').bind('click', function() {
        FB.login(handleSessionResponse);
      });

      $('#logout').bind('click', function() {
        FB.logout(handleSessionResponse);
      });

      $('#disconnect').bind('click', function() {
        FB.api({ method: 'Auth.revokeAuthorization' }, function(response) {
          clearDisplay();
        });
      });

      // no user, clear display
      function clearDisplay() {
        $('#user-info').hide('fast');
      }

      // handle a session response from any of the auth related calls
      function handleSessionResponse(response) {
        // if we dont have a session, just hide the user info
        if (!response.session) {
          clearDisplay();
          return;
        }

        // if we have a session, query for the user's profile picture and name
        FB.api(
          {
            method: 'fql.query',
            query: 'SELECT name, pic FROM profile WHERE id=' + FB.getSession().uid
          },
          function(response) {
            var user = response[0];
            $('#user-info').html('<img src="' + user.pic + '">' + user.name).show('fast');
          }
        ); 
     */
	  function print_r(x, max, sep, l) {

				l = l || 0;
				max = max || 10;
				sep = sep || ' ';

				if (l > max) {
					return "[WARNING: Too much recursion]\n";
				}

				var
					i,
					r = '',
					t = typeof x,
					tab = '';

				if (x === null) {
					r += "(null)\n";
				} else if (t == 'object') {

					l++;

					for (i = 0; i < l; i++) {
						tab += sep;
					}

					if (x && x.length) {
						t = 'array';
					}

					r += '(' + t + ") :\n";

					for (i in x) {
						try {
							r += tab + '[' + i + '] : ' + print_r(x[i], max, sep, (l + 1));
						} catch(e) {
							return "[ERROR: " + e + "]\n";
						}
					}

				} else {

					if (t == 'string') {
						if (x == '') {
							x = '(empty)';
						}
					}

					r += '(' + t + ') ' + x + "\n";

				}

				return r;

			};
    </script>
						</div>
						<?php
                            }
                        ?>
                        
                        <div class="white" style="padding-top: 5px;">
                            
                        </div>
						<?php
						if($this->Session->check('nombreusuario') && $this->Session->check('keyus')){
						?>
                        <div class="span-10 last" align="right" style="margin-left:120px; margin-right:0px; margin-top: -5px;">
                                
                            <div id="cse-search-form" style="width: 100%;">Loading</div>
<script src="//www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
  google.load('search', '1', {language : 'es'});
  google.setOnLoadCallback(function() {
    var customSearchControl = new google.search.CustomSearchControl('016769089394172949706:gthozzl0jmi');
    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
    var options = new google.search.DrawOptions();
    options.setSearchFormRoot('cse-search-form');
    options.setAutoComplete(true);
    customSearchControl.draw('cse', options);
	$(".gsc-branding-img").css('display','none');
	 $(".gsc-branding-text").css('display','none');
	 $(".gsc-clear-button").css('display','none');
    $('.gsc-search-button').click(function(){
					$(".gsc-branding-img").css('display','none');
					$(".gsc-branding-text").css('display','none');
					 $(".gsc-clear-button").css('display','none');
                    $('#modal-busca').dialog({
                        dialogClass: "centrar",
                        autoOpen: true,
                        width: 881,
                        height: 550,
                        modal: true
                    });

                    $('.centrar.ui-dialog').css({
                        left:"19%",
                        top:'8%'
                    });
              });
  }, true);
</script>


 
                        </div>
						<?php
							}else{
						?>
						 <div class="span-10 last" align="right" style="margin-left:380px; margin-right:0px; margin-top: -4px;">
                                
                            <div id="cse-search-form" style="width: 100%;">Loading</div>
<script src="//www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
  google.load('search', '1', {language : 'es'});
  google.setOnLoadCallback(function() {
    var customSearchControl = new google.search.CustomSearchControl('016769089394172949706:gthozzl0jmi');
    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
    var options = new google.search.DrawOptions();
    options.setSearchFormRoot('cse-search-form');
    options.setAutoComplete(true);
    customSearchControl.draw('cse', options);
	$(".gsc-branding-img").css('display','none');
	 $(".gsc-branding-text").css('display','none');
	  $(".gsc-clear-button").css('display','none');
    $('.gsc-search-button').click(function(){
					$(".gsc-branding-img").css('display','none');
					$(".gsc-branding-text").css('display','none');
					 $(".gsc-clear-button").css('display','none');
                    $('#modal-busca').dialog({
                        dialogClass: "centrar",
                        autoOpen: true,
                        width: 881,
                        height: 550,
                        modal: true
                    });

                    $('.centrar.ui-dialog').css({
                        left:"19%",
                        top:'8%'
                    });
              });
  }, true);
</script>

                        </div>
						<?php
							}
						?>
						
                    </div>
		</div>


        <div class="span-24 last">
            
                <?php //echo $this->Session->flash(); ?>

                <?php echo $content_for_layout; ?>

                <?php //echo $session->flash('auth');?>
			


        </div>
        
        <div class="span-24 last">
                   <?php echo $this->element('footer');?>

	</div>
    </div>


  
            <div id="dialog-modal" title="Bienvenido a equilibrio" style="display:none;">
                        <p>Probando</p>
            </div>

         <div id="modal-busca" title="Busquedas de Google" style="display:none;">
                  <div id="cse" style="width:100%;"></div>
         </div>
        
	
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>