<?php
class PagesController extends AppController {

    var $name = 'Pages';
    //var $scaffold;
    //var $components = array('Auth');
    var $helpers = array('Html', 'Form', 'Javascript');
    //var $components = array('RequestHandler');
    var $uses = array('Page','Aco','Aro','ArosAco','Video','Gallery','Phone','Promo','Estado','Ciudade','Register','User','Denuncia','Locale');
	/*var $paginate = array(
          'limit' => 10,
		  'order' => array(
				'fechacre_promo' =>'DESC'
		  )
    );*/
	function beforeFilter(){
                $this->Auth->allow('home','quienes','contactanos','mision','campanas','ofrendas','info','verestados','verciudad','detallepublicidad','detallegaleria','buscar','info_promo','registro_pregunta','registro_pregunta_galeria','info_galeria','detallelocales','delete_mensaje','promociones','productos');
        }

    function index() {

    }
	
	function index_preguntas() {
	$this->layout ='admin';
		$this->helpers;
		$user=$this->Session->read('Auth.User.locale_id_local');
		if(!empty($user)){
			$this->paginate = array('conditions'=>array('Page.locale_id_local'=>$user,'Page.resp ='=>'0'),'limit' => 10,'order'=> 'fecha DESC');
			$this->set('preguntas', $this->paginate('Page'));
		}else{
			$this->paginate = array('conditions'=>array('Page.resp ='=>'0'),'limit' => 10,'order'=> 'fecha DESC');
			$this->set('preguntas', $this->paginate('Page'));
		}
    }
	
	function home(){
		$this->layout ='nuevo';
		//'fields'=>array('videoembed','descripcion')
		$embed = $this->Video->find('all',array('recursive'=>0,'conditions'=>array('etiqueta'=>'Equilibrio','destacado'=>'1'),'order'=>'RAND()','limit'=>1));
		$locales = $this->Locale->find('all',array('recursive'=>-1,'fields'=>array('id_local','nombre_file','rif','nombre_empresa'),'conditions'=>array('status'=>'1'),'order'=>'RAND()','limit'=>18));
		//$locales = $this->Gallery->find('all',array('recursive'=>-1,'fields'=>array('id_galeria','thumbnails','url','replace(date(fechacre_galeria),"-","") as fecha','texto_galeria','locale_id_local'),'conditions'=>array('publicar'=>'1'),'order'=>'RAND()','limit'=>18));
		$promos = $this->Promo->find('all',array('recursive'=>-1,'fields'=>array('id_promo','thumbnails','url','replace(date(fechacre_promo),"-","") as fecha','texto_promo','claves'),'conditions'=>array('publicar'=>'1'),'order'=>'RAND()','limit'=>5));
		//pr($galerias);
		$videos = $this->Video->find('all',array('recursive'=>0,'fields'=>array('Archivo.vidthumbnail','Archivo.embedthumb','titulo_video','url','Archivo.nombre_file','replace(date(Video.fechacre_videos),"-","") as fecha'),'conditions'=>array('destacado'=>0),'order'=>'RAND()','limit'=>2));
		$cont_local = $this->Locale->find('count',array('conditions'=>array('status'=>'1')));
		$cont_promo = $this->Promo->find('count',array('conditions'=>array('publicar'=>'1')));
		$cont_videos = $this->Video->find('count',array('conditions'=>array('destacado'=>'0')));
		//pr($cont_galeria);
		if($cont_local > 18){ $this->set('cont_local',18);}else{$this->set('cont_local',$cont_local);	}
		if($cont_promo > 7){ $this->set('cont_promo',6);}else{$this->set('cont_promo',$cont_promo);	}
		if($cont_videos>=2){ $this->set('cont_videos',2);	}else{$this->set('cont_videos',$cont_videos);	}
		$this->set('thumbvid',$videos);
		$this->set('videquilibrio',$embed);
		$this->set('local',$locales);
		$this->set('promos',$promos);
    }
	function detallepublicidad($fecha,$url){
		$this->layout ='nuevo';
		$promos = $this->Promo->find('all',array('conditions'=>array('url'=>$url)));
		$this->set('promos',$promos);
		$this->set('fecha',$fecha);
		$this->set('url',$url);
    }
	function detallegaleria($fecha,$url){
		$this->layout ='nuevo';
		$galeria = $this->Gallery->find('all',array('conditions'=>array('url'=>$url)));
		$this->set('galeria',$galeria);
		$this->set('fecha',$fecha);
		$this->set('url',$url);
    }
	function detallelocales($rif,$frase) {
        $this->layout ='nuevo_buscadores'; 
		//pr($frase);	
		$rif=$rif;
		//if (!empty($rif)) {
			$locales = $this->Locale->find('all',array('conditions'=>array('Locale.rif ='=>$rif,'Locale.nombre_empresa LIKE'=>'%'.$frase.'%')));
			$id_local=$locales[0]['Locale']['id_local'];
			//echo "es ".$id_local;
			$gal = $this->Gallery->find('all',array('conditions'=>array('Gallery.locale_id_local ='=>$id_local)));
			
			$this->paginate = array('fields'=>array('id_galeria','thumbnails','url','replace(date(fechacre_galeria),"-","") as fecha','texto_galeria','locale_id_local','precio'),'limit' => 8,'conditions' => array('Gallery.locale_id_local ='=>$id_local));
			$this->set('galerias', $this->paginate('Gallery'));
			
			$this->paginate = array('fields'=>array('id_promo','thumbnails','url','replace(date(fechacre_promo),"-","") as fecha','texto_promo','locale_id_local','precio'),'limit' => 8,'conditions' => array('Promo.locale_id_local ='=>$id_local));
			$this->set('promociones', $this->paginate('Promo'));
			
			$promo = $this->Promo->find('all',array('conditions'=>array('Promo.locale_id_local ='=>$id_local)));
			//pr($gal);
			$this->set('locales',$locales);
			//$this->set('galerias',$gal);
			//$this->set('promociones',$promo);
			/*if(empty($gal) and empty($promo)){
				$this->Session->setFlash(__('No se encontraron datos.', null), 'default', array('class' => 'flash_bad'));
				$this->redirect(array('controller'=>'pages','action'=>'buscar',$frase));
			}
		}else{
			$this->Session->setFlash(__('No se encontro ese local registrado.', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('controller'=>'pages','action'=>'buscar',$frase));
		}*/
	}
	function buscar($f =null) {
        $this->layout ='nuevo_buscadores'; 
		//pr($f);	
		if(empty($f)){
			$frase=$this->data['Page']['frase'];
		}else{
			$frase=$f;
		}
		if (!empty($frase)) {
			$locales = $this->Locale->find('all',array('conditions'=>array('Locale.nombre_empresa LIKE'=>'%'.$frase.'%')));
			$gal = $this->Gallery->find('all',array('conditions'=>array('Gallery.texto_galeria LIKE'=>'%'.$frase.'%')));
			
			$this->paginate = array('recursive'=>-1,'fields'=>array('id_galeria','thumbnails','url','replace(date(fechacre_galeria),"-","") as fecha','texto_galeria','locale_id_local','precio'),'limit' => 8,'conditions' => array('Gallery.texto_galeria LIKE'=>'%'.$frase.'%'));
			$this->set('galerias', $this->paginate('Gallery'));
			
			$this->paginate = array('recursive'=>-1,'fields'=>array('id_promo','thumbnails','url','replace(date(fechacre_promo),"-","") as fecha','texto_promo','locale_id_local','precio'),'limit' => 8,'conditions' => array('Promo.texto_promo LIKE'=>'%'.$frase.'%'));
			$this->set('promociones', $this->paginate('Promo'));
			
			$promo = $this->Promo->find('all',array('conditions'=>array('Promo.texto_promo LIKE'=>'%'.$frase.'%')));
			//pr($locales);
			$this->set('locales',$locales);
			$this->set('frase',$frase);
			//$this->set('galerias',$galerias);
			//$this->set('promociones',$promociones);
			if(empty($locales) and empty($gal) and empty($promo)){
				$this->Session->setFlash(__('No se encontraron datos.', null), 'default', array('class' => 'flash_bad'));
				$this->redirect(array('controller'=>'pages','action'=>'home'));
			}
		}
	}
	
	function quienes(){
		$this->layout ='nuevo_buscadores';
		$galerias = $this->Gallery->find('all',array('recursive'=>-1,'fields'=>array('id_galeria','thumbnails','url','replace(date(fechacre_galeria),"-","") as fecha'),'conditions'=>array('publicar'=>'1'),'order'=>'RAND()','limit'=>6));
		$this->set('gal',$galerias);
		$cont_galeria = $this->Gallery->find('count',array('conditions'=>array('publicar'=>'1')));
		if($cont_galeria > 18){ $this->set('cont_galeria',18);}else{$this->set('cont_galeria',$cont_galeria);	}
    }
	function contactanos(){
		$this->layout ='nuevo_buscadores';
		if (!empty($this->data)) {
            $codigo = $this->data['Page']['codi'];
            $celu = $codigo.$this->data['Page']['telefono'];                        
            $this->data['Page']['telefono'] = $celu;
            $mayus = ucwords($this->data['Page']['nombre']);
            $this->data['Page']['nombre'] = $mayus;
			
			//$this->data['Page']['fecha'] = $fecha;
			//pr($this->data);
            $this->Page->set($this->data);
                           if ($this->Page->save($this->data)) {
									
                                //Mientras  $this->_sendEmail($this->data);
									$this->Session->setFlash(__('Los datos han sido guardados con exito.', null), 'default', array('class' => 'flash_good'));
                               $this->redirect(array('controller'=>'pages','action' => 'contactanos'));
                            } else {
								$this->Session->setFlash(__('No se pudo guardar su registro porfavor intente nuevamente.', null), 'default', array('class' => 'flash_bad'));
								
                            }
		}
		$codtele = $this->Phone->find('all');
            for($i=0;$i<count($codtele);$i++){
                $codigos[$codtele[$i]['Phone']['cod']] = $codtele[$i]['Phone']['cod'];
            }
        $galerias = $this->Gallery->find('all',array('recursive'=>-1,'fields'=>array('id_galeria','thumbnails','url','replace(date(fechacre_galeria),"-","") as fecha','texto_galeria'),'conditions'=>array('publicar'=>'1'),'order'=>'RAND()','limit'=>18));
		$videos = $this->Video->find('all',array('recursive'=>0,'fields'=>array('Archivo.vidthumbnail','Archivo.embedthumb','titulo_video','url','Archivo.nombre_file','replace(date(Video.fechacre_videos),"-","") as fecha'),'conditions'=>array('destacado'=>0),'order'=>'RAND()','limit'=>2));
		$cont_galeria = $this->Gallery->find('count',array('conditions'=>array('publicar'=>'1')));
		$cont_videos = $this->Video->find('count',array('conditions'=>array('destacado'=>'0')));
		//if($cont_galeria>=2){ $this->set('cont_galeria',2);	}else{$this->set('cont_galeria',$cont_galeria);	}
		if($cont_videos>=2){ $this->set('cont_videos',2);	}else{$this->set('cont_videos',$cont_videos);	}
		$this->set('thumbvid',$videos);
		$this->set('gal',$galerias);
		$this->set('cod',$codigos);
		if($cont_galeria > 18){ $this->set('cont_galeria',18);}else{$this->set('cont_galeria',$cont_galeria);	}
    }
	function registro_pregunta(){
		$this->layout ='nuevo';
		if (!empty($this->data)) {
            $usuario = $this->data['Page']['usuario'];
			$producto = $this->data['Page']['producto'];
			$local = $this->data['Page']['local'];
			$clientes = $this->Register->find('all',array('conditions'=>array('idregistro'=>$usuario)));
			$sexo=$clientes[0]['Register']['sexo'];
			$nombre=$clientes[0]['Register']['nombreape'];
			$this->data['Page']['sexo']=$sexo;
			$this->data['Page']['nombre']=$nombre;
			$this->data['Page']['promocion_id_promo']=$producto;
			$this->data['Page']['register_idregistro']=$usuario;
			$this->data['Page']['locale_id_local']=$local;
			$this->data['Page']['status']=1;
			$fecha = $this->data['Page']['fecha1'];
			$url = $this->data['Page']['url'];
            $this->Page->set($this->data);
                           if ($this->Page->save($this->data)) {
                                //Mientras  $this->_sendEmail($this->data);
									$this->Session->setFlash(__('Mensaje Enviado con Exito.', null), 'default', array('class' => 'flash_good'));
                               $this->redirect(array('controller'=>'pages','action' => 'detallepublicidad',$fecha,$url));
                            } else {
								$this->Session->setFlash(__('No se pudo guardar su registro porfavor intente nuevamente.', null), 'default', array('class' => 'flash_bad'));
								
                            }
		}
    }
	function registro_pregunta_galeria(){
		$this->layout ='nuevo';
		//pr($this->data);
		if (!empty($this->data)) {
            $usuario = $this->data['Page']['usuario'];
			$producto = $this->data['Page']['producto'];
			$local = $this->data['Page']['local'];
			//echo $local;
			$clientes = $this->Register->find('all',array('conditions'=>array('idregistro'=>$usuario)));
			//$page = $this->Page->find('all',array('conditions'=>array('Page.register_idregistro'=>$usuario,'Page.galerias_id_galeria'=>$producto,'Page.locale_id_local'=>$local)));
			//$id_page=$page[0]['Page']['id_page'];
			//pr($id_page);
			$sexo=$clientes[0]['Register']['sexo'];
			$nombre=$clientes[0]['Register']['nombreape'];
			$this->data['Page']['sexo']=$sexo;
			$this->data['Page']['nombre']=$nombre;
			$this->data['Page']['galerias_id_galeria']=$producto;
			$this->data['Page']['register_idregistro']=$usuario;
			$this->data['Page']['locale_id_local']=$local;
			$this->data['Page']['status']=1;
			$fecha = $this->data['Page']['fecha1'];
			$url = $this->data['Page']['url'];
            $this->Page->set($this->data);
                           if ($this->Page->save($this->data)) {
                                //Mientras  $this->_sendEmail($this->data);
								//$this->Page->updateAll(array('Page.status' => '1'), array('Page.id_page' => $id_page));
									$this->Session->setFlash(__('Los datos han sido guardados con exito.', null), 'default', array('class' => 'flash_good'));
                               $this->redirect(array('controller'=>'pages','action' => 'detallegaleria',$fecha,$url));
                            } else {
								$this->Session->setFlash(__('No se pudo guardar su registro porfavor intente nuevamente.', null), 'default', array('class' => 'flash_bad'));
								
                            }
		}
    }
	function detallemensaje($fecha,$url,$id_page){
		$this->layout ='ajax';
		//pr($id_page);
			if($this->Page->updateAll(array('Page.status' => '1'), array('Page.id_page' => $id_page))){
                $this->redirect(array('controller'=>'pages','action' => 'detallegaleria',$fecha,$url));
			}
    }
	function detallemensajepromo($fecha,$url,$id_page){
		$this->layout ='ajax';
		//pr($url);
			if($this->Page->updateAll(array('Page.status' => '1'), array('Page.id_page' => $id_page))){
                $this->redirect(array('controller'=>'pages','action' => 'detallepublicidad',$fecha,$url));
			}
    }
	function mision(){
		$this->layout ='nuevo';
    }
	function campanas(){
		$this->layout ='nuevo';
		$galerias = $this->Gallery->find('all',array('recursive'=>-1,'fields'=>array('id_galeria','thumbnails','url','replace(date(fechacre_galeria),"-","") as fecha'),'conditions'=>array('publicar'=>'1'),'order'=>'RAND()','limit'=>6));
		$this->set('gal',$galerias);
		$cont_galeria = $this->Gallery->find('count',array('conditions'=>array('publicar'=>'1')));
		if($cont_galeria>=6){ $this->set('cont_galeria',6);	}else{$this->set('cont_galeria',$cont_galeria);	}
    }
	function ofrendas(){
		$this->layout ='nuevo';
		$galerias = $this->Gallery->find('all',array('recursive'=>-1,'fields'=>array('id_galeria','thumbnails','url','replace(date(fechacre_galeria),"-","") as fecha'),'conditions'=>array('publicar'=>'1'),'order'=>'RAND()','limit'=>6));
		$this->set('gal',$galerias);
		$cont_galeria = $this->Gallery->find('count',array('conditions'=>array('publicar'=>'1')));
		$cont_videos = $this->Video->find('count',array('conditions'=>array('destacado'=>'0')));
		if($cont_galeria>=6){ $this->set('cont_galeria',6);	}else{$this->set('cont_galeria',$cont_galeria);	}
		if($cont_videos>=6){ $this->set('cont_videos',6);	}else{$this->set('cont_videos',$cont_videos);	}
		$videos = $this->Video->find('all',array('recursive'=>0,'fields'=>array('Archivo.vidthumbnail','Archivo.embedthumb','titulo_video','url','Archivo.nombre_file','replace(date(Video.fechacre_videos),"-","") as fecha'),'conditions'=>array('destacado'=>0),'order'=>'RAND()','limit'=>6));
		$this->set('thumbvid',$videos);
    }
	
    function add() {
	
        if (!empty($this->data)) {
            if ($this->Page->save($this->data)) {
                $this->Session->setFlash('El usuario ha sido creado');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function delete($id) {
        $this->Page->delete($id);
        $this->Session->setFlash(__('El registro se ha eliminado con exito.', null), 'default', array('class' => 'flash_good'));
        $this->redirect(array('action' => 'index_preguntas'));
    }
	function delete_mensaje($id) {
        $this->Page->delete($id);
        $this->Session->setFlash(__('El registro se ha eliminado con exito.', null), 'default', array('class' => 'flash_good'));
        $this->redirect(array('controller'=>'ventas','action' => 'mismensajes'));
    }
	function delete_reclamo($id) {
        $this->Denuncia->delete($id);
        $this->Session->setFlash(__('El registro se ha eliminado con exito.', null), 'default', array('class' => 'flash_good'));
        $this->redirect(array('controller'=>'ventas','action' => 'misreclamos'));
    }
	
    function edit($id) {
       if(empty($this->data)) {
            $this->data = $this->Page->read(null, $id);
        }else {
            if($this->Page->save($this->data)) {
                $this->Session->setFlash('La edición fue hecha con exito.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }
	
	 function _sendEmail($data){
        //pr($data);
        $this->Email->to = $data['Page']['correo'];
        $this->Email->subject = 'Bienvenido a Venezuela para las Naciones';
        $this->Email->from = 'Diony Reveron <dionyreveron@hotmail.com>';
        $this->Email->template = 'sendemail'; // note no '.ctp'
        //Send as 'html', 'text' or 'both' (default is 'text')
        $this->Email->sendAs = 'both'; // because we like to send pretty mail
        //Set view variables as normal
        $this->set('datos', $data);
        //Do not pass any args to send()
        $this->Email->send();

    }
	function info() {
	
		$this->layout ='info';
		
		$info = $this->Page->find('all',array('fields'=>array('id_page','nombre','comentario','sexo','fecha'),'conditions'=>array('tipo_mensaje'=>'1'),'recursive'=>1,'limit'=>15));
		$cont = $this->Page->find('count',array('conditions'=>array('tipo_mensaje'=>'1')));
		
		$this->set('info',$info);
		if($cont>=10){ $this->set('cont',10);	}else{$this->set('cont',$cont);	}
		//$this->render(false);
		
    }
	function info_promo($producto,$usuario) {
	
		$this->layout ='info';
		
		$info = $this->Page->find('all',array('fields'=>array('id_page','nombre','comentario','sexo','fecha'),'conditions'=>array('promocion_id_promo'=>$producto),'recursive'=>1,'limit'=>15,'order' => array('id_page' =>'DESC'))); //,'register_idregistro'=>$usuario
		$cont = $this->Page->find('count',array('conditions'=>array('promocion_id_promo'=>$producto)));//,'register_idregistro'=>$usuario
		if($cont>=15){ $this->set('cont',15);	}else{$this->set('cont',$cont);	}
		$this->set('info',$info);
		//$this->render(false);
		
    }
	function info_galeria($producto,$usuario) {
	
		$this->layout ='info';
		
		$info = $this->Page->find('all',array('fields'=>array('id_page','nombre','comentario','sexo','fecha'),'conditions'=>array('galerias_id_galeria'=>$producto),'recursive'=>1,'limit'=>15,'order' => array('id_page' =>'DESC'))); //,'register_idregistro'=>$usuario
		$cont = $this->Page->find('count',array('conditions'=>array('galerias_id_galeria'=>$producto)));//,'register_idregistro'=>$usuario
		if($cont>=15){ $this->set('cont',15);	}else{$this->set('cont',$cont);	}
		$this->set('info',$info);
		//$this->render(false);
		
    }
	function responder_pregunta($id = null) {
		$this->layout ='admin';
		
		$info = $this->Page->find('all',array('conditions'=>array('id_page'=>$id))); //,'register_idregistro'=>$usuario
		$this->set('info',$info);
		//$this->render(false);
		
    }
	function registro_respuesta(){
		$this->layout ='admin';
		//pr($this->data);
		if (!empty($this->data)) {
            $usuario = $this->data['Page']['usuario'];
			$id_respuesta = $this->data['Page']['id_respuesta'];

			if(!empty($this->data['Page']['promocion_id_promo'])){
				$producto_promo = $this->data['Page']['promocion_id_promo'];
			}else{
				$producto_promo='';
			}
			if(!empty($this->data['Page']['galerias_id_galeria'])){
				$producto_gal = $this->data['Page']['galerias_id_galeria'];
			}else{
				$producto_gal='';
			}
			$local = $this->data['Page']['local'];
			$vendedor = $this->User->find('all',array('conditions'=>array('id_usuario'=>$usuario)));
			$nombre=$vendedor[0]['User']['perfil_usuario'];
			$this->data['Page']['nombre']=$nombre;
			$this->data['Denuncia']['galerias_id_galeria']=$producto_gal;
			$this->data['Denuncia']['promocion_id_promo']=$producto_promo;
			$this->data['Page']['resp']=$usuario;
			$this->data['Page']['locale_id_local']=$local;
			$this->data['Page']['status']=0;
            $this->Page->set($this->data);
                           if ($this->Page->save($this->data)) {
                                //Mientras  $this->_sendEmail($this->data);
								$this->Page->updateAll(array('Page.status' => '0'), array('Page.id_page' => $id_respuesta));
									$this->Session->setFlash(__('Mensaje Enviado con Exito.', null), 'default', array('class' => 'flash_good'));
                               $this->redirect(array('controller'=>'pages','action' => 'index_preguntas'));
                            } else {
								$this->Session->setFlash(__('No se pudo guardar su registro porfavor intente nuevamente.', null), 'default', array('class' => 'flash_bad'));
								
                            }
		}
    }
	
	function verestados(){
        $this->layout = 'vacio';
        $estados = $this->Estado->find('all');
        //pr($estados);
        //$nomestad = array();
        /*for($x=1;$x<count($estados);$x++)
        {
                $nomestad[$x] = $estados[$x]['Estado']['nombre'];
        }*/
        $this->set('esta',$estados);


    }

    function verciudad($id){
        $this->layout = 'vacio';
        $ciudades = $this->Ciudade->find('all',array('conditions'=>array('Ciudade.estadoId'=>$id)));
        /*for($x=0;$x<count($ciudades);$x++)
        {
                $nomciu[$x] = $ciudades[$x]['Ciudade']['nombre'];
        }*/
        $this->set('ciud',$ciudades);


    } 
	function existencia() {
	$this->layout ='admin';
		$this->helpers;
		$user=$this->Session->read('Auth.User.locale_id_local');
		if(!empty($user)){
			$this->paginate = array('conditions'=>array('Gallery.locale_id_local'=>$user,'Gallery.cantidad_existente >'=>'0'),'limit' => 10,'order'=> 'fechacre_galeria DESC');
			$this->set('galerias', $this->paginate('Gallery'));
			$this->paginate = array('conditions'=>array('Promo.locale_id_local'=>$user,'Promo.cantidad_existente >'=>'0'),'limit' => 10,'order'=> 'fechacre_promo DESC');
			$this->set('promociones', $this->paginate('Promo'));
		}else{
			$this->paginate = array('conditions'=>array('Gallery.cantidad_existente >'=>'0'),'limit' => 10,'order'=> 'fechacre_galeria DESC');
			$this->set('galerias', $this->paginate('Gallery'));
			$this->paginate = array('conditions'=>array('Promo.cantidad_existente >'=>'0'),'limit' => 10,'order'=> 'fechacre_promo DESC');
			$this->set('promociones', $this->paginate('Promo'));
		}
    }
	function agotados() {
	$this->layout ='admin';
		$this->helpers;
		$user=$this->Session->read('Auth.User.locale_id_local');
		if(!empty($user)){
			$this->paginate = array('conditions'=>array('Gallery.locale_id_local'=>$user,'Gallery.cantidad_existente ='=>'0'),'limit' => 10,'order'=> 'fechacre_galeria DESC');
			$this->set('galerias', $this->paginate('Gallery'));
			$this->paginate = array('conditions'=>array('Promo.locale_id_local'=>$user,'Promo.cantidad_existente ='=>'0'),'limit' => 10,'order'=> 'fechacre_promo DESC');
			$this->set('promociones', $this->paginate('Promo'));
		}else{
			$this->paginate = array('conditions'=>array('Gallery.cantidad_existente ='=>'0'),'limit' => 10,'order'=> 'fechacre_galeria DESC');
			$this->set('galerias', $this->paginate('Gallery'));
			$this->paginate = array('conditions'=>array('Promo.cantidad_existente ='=>'0'),'limit' => 10,'order'=> 'fechacre_promo DESC');
			$this->set('promociones', $this->paginate('Promo'));
		}
    }
	function promociones() {
        $this->layout ='nuevo_buscadores'; 
			$this->paginate = array('recursive'=>-1,'fields'=>array('id_promo','thumbnails','url','replace(date(fechacre_promo),"-","") as fecha','texto_promo','locale_id_local','precio'),'order'=>'RAND()','limit' => 8,'conditions' => array('Promo.publicar ='=>1));
			$this->set('promociones', $this->paginate('Promo'));
			
			$promo = $this->Promo->find('all',array('conditions'=>array('Promo.publicar ='=>1)));
			if(empty($promo)){
				$this->Session->setFlash(__('No se encontraron datos.', null), 'default', array('class' => 'flash_bad'));
				$this->redirect(array('controller'=>'pages','action'=>'home'));
			}
	}
	function productos() {
        $this->layout ='nuevo_buscadores'; 
			$this->paginate = array('recursive'=>-1,'fields'=>array('id_galeria','thumbnails','url','replace(date(fechacre_galeria),"-","") as fecha','texto_galeria','locale_id_local','precio'),'order'=>'RAND()','limit' => 8,'conditions' => array('Gallery.publicar ='=>1));
			$this->set('galerias', $this->paginate('Gallery'));
			$gal = $this->Gallery->find('all',array('conditions'=>array('Gallery.publicar ='=>1)));
			if(empty($gal)){
				$this->Session->setFlash(__('No se encontraron datos.', null), 'default', array('class' => 'flash_bad'));
				$this->redirect(array('controller'=>'pages','action'=>'home'));
			}
	}
}
?>