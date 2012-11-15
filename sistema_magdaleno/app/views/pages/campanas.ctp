<script type="text/javascript">
	$('document').ready(function(){
		$(".mapa").show(2000);
		$("#mexico").show();
		$(".mapa_name").click(function(){
				var pais = $(this).attr('id');
				//alert(print_r(idfoto));
                 var url = '<?php echo $html->url('/',true)?>registers/add/'+pais;
                 var d = $('#dialog-modal').html('<iframe width="850" height="500" id="ifrm"></iframe>');
                $("#dialog-modal>#ifrm").attr("src", url);
                var $width = 841;
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
		
	});
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
<div id="leftbar" class="sidebar">
	<?php if(!empty($gal)){ ?>
	<div class="span-8 imagenes_campanas">
		<div class="imgtwit">
			<img alt="eve" src="<?php echo $html->url('/')?>images/imagenes.png"/>
		</div>
		<div class="contentimggalery" style="margin-top:30px;">
			<ul class="listathumbs" >
				<?php for($j=0;$j<$cont_galeria;$j++){ ?>
					<a href="<?php echo $html->url('/',true)?>detallegaleria/<?php echo $gal[$j][0]['fecha']."/".$gal[$j]['Gallery']['url']; ?>"><div class="fotos"><img src="<?php echo $html->url('/')?>files/galeria/thumbnails/<?php echo $gal[$j]['Gallery']['thumbnails'];?>" style="margin-bottom:5px;"></div></a><!--$thumbname[$j]-->
					<br>
					<!--<li style="display:inline;"><img src="<?php //echo $html->url('/')?>files/thumbnails/<?php //echo $thumbsramdom;?>"></li>-->
				<?php } ?>
			</ul>
		</div>
	</div>	
	<?php }?>	
</div>
<div id="content_mapa">
		<div class="post_mapa">
			<center><h1><font color="navy">Campa&ntilde;as en Latino America</font></h1></center>
			<!--background="<?php //echo $html->url('/',true)?>/images/mapa.png" width="500" height="550"-->
			<div class="mapa" id="mapa">
				<p style="margin-top:40px; margin-left:50px;" class="mapa_name" id="146"><a><font color="gray"><b>Mexico</b></font></a></p>
				<p style="margin-top:-35px; margin-left:180px;" class="mapa_name" id="62"><a><font color="navy"><b>Cuba</b></font></a></p>
				<p style="margin-top:-25px; margin-left:220px;" class="mapa_name" id="100"><a><font color="navy"><b>Haiti</b></font></a></p>
				<p style="margin-top:-27px; margin-left:240px;" class="mapa_name" id="65"><a><font color="navy"><b>Rep. Dominicana</b></font></a></p>
				<p style="margin-top:-21px; margin-left:148px;" class="mapa_name" id="25"><a><font color="navy"><b>Belice</b></font></a></p>
				<p style="margin-top:-39px; margin-left:195px;" class="mapa_name" id="113"><a><font color="navy" size="1"><b>Jamaica</b></font></a></p>
				<p style="margin-top:-35px; margin-left:265px;" class="mapa_name" id="178"><a><font color="navy" size="2"><b>Puerto Rico</b></font></a></p>
				<p style="margin-top:-28px; margin-left:58px;" class="mapa_name" id="94"><a><font color="navy"><b>Guatemala</b></font></a></p>
				<p style="margin-top:-42px; margin-left:175px;" class="mapa_name" id="102"><a><font color="navy" size="1"><b>Honduras</b></font></a></p>
				<p style="margin-top:-22px; margin-left:95px;" class="mapa_name" id="68"><a><font color="navy"><b>El Salvador</b></font></a></p>
				<p style="margin-top:-42px; margin-left:175px;" class="mapa_name" id="157"><a><font color="navy" size="1"><b>Nicaragua</b></font></a></p>
				<p style="margin-top:-12px; margin-left:95px;" class="mapa_name" id="60"><a><font color="navy"><b>Costa Rica</b></font></a></p>
				<p style="margin-top:-56px; margin-left:175px;" class="mapa_name" id="170"><a><font color="navy" size="1"><b>Panama</b></font></a></p>
				<p style="margin-top:-23px; margin-left:245px;" class="mapa_name" id="232"><a><font color="navy" size="1"><b>Venezuela</b></font></a></p>
				<p style="margin-top:-63px; margin-left:300px;" class="mapa_name" id="221"><a><font color="navy" size="1"><b>Trinidad y Tobago</b></font></a></p>
				<p style="margin-top:-23px; margin-left:320px;" class="mapa_name" id="99"><a><font color="navy" size="2"><b>Guyanas</b></font></a></p>
				<p style="margin-top:-15px; margin-left:210px;" class="mapa_name" id="52"><a><font color="navy" size="1"><b>Colombia</b></font></a></p>
				<p style="margin-top:-5px; margin-left:135px;" class="mapa_name" id="66"><a><font color="navy" size="2"><b>Ecuador</b></font></a></p>
				<p style="margin-top:25px; margin-left:195px;" class="mapa_name" id="173"><a><font color="navy" size="2"><b>Peru</b></font></a></p>
				<p style="margin-top:-15px; margin-left:325px;" class="mapa_name" id="33"><a><font color="navy" size="2"><b>Brazil</b></font></a></p>
				<p style="margin-top:-15px; margin-left:260px;" class="mapa_name" id="29"><a><font color="navy" size="2"><b>Bolivia</b></font></a></p>
				<p style="margin-top:-3px; margin-left:288px;" class="mapa_name" id="172"><a><font color="navy" size="1"><b>Paraguay</b></font></a></p>
				<p style="margin-top:27px; margin-left:248px;" class="mapa_name" id="13"><a><font color="navy" size="2"><b>Argentina</b></font></a></p>
				<p style="margin-top:-19px; margin-left:312px;" class="mapa_name" id="229"><a><font color="navy" size="2"><b>Uruguay</b></font></a></p>
				<p style="margin-top:-19px; margin-left:202px;" class="mapa_name" id="46"><a><font color="navy" size="2"><b>Chile</b></font></a></p>
			</div>
			
		</div>
		
</div>
<div id="dialog-modal" title="Bienvenido a Asociacion Civil Venezuela para las Naciones" style="display:none;">
    <p>Probando</p>
</div>