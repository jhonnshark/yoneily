<?php
class VentasController extends AppController {

	var $name = 'Ventas';
        var $helpers = array('Html', 'Form', 'Javascript');
        var $uses = array('Venta','Locale','Gallery','Denuncia','Promo','Page','Codigo');
         var $paginate = array(
          'limit' => 10,
		  'order' => array(
				'fecha' =>'DESC'
		  )
         );
	function beforeFilter() {
        $this->Auth->allowedActions = array('add','consulta','denunciar','finalizar_denunciar','add_promo','consulta_promocion','denunciar_promo','miscompras','mismensajes','misreclamos','finalizar_compra','pdf_compra','carrito','cuantos','pdf_completo_venta','add_carrito');
    }
	function index() {
        $this->layout ='admin'; 
		$this->Venta->recursive = 0;
		$this->set('ventas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid gallery', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('venta', $this->Venta->read(null, $id));
	}
	function ventas_delete($producto = null,$usuario = null,$local = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id Invalido.', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Venta->deleteAll("Venta.id_venta=".$id)) {
			
		}
		$this->Session->setFlash(__('No se pudo eliminar. Intenta nuevamente.', null), 'default', array('class' => 'flash_bad'));
		$this->redirect(array('action' => 'index'));
	}
	function add($producto,$usuario,$local, $cantidad,$cuantos) {
        $this->layout ='ajax';  
		$fecha=date('d-m-Y');
			$datos['Venta'] = array(
				'galeria_id_galeria' =>$producto,
				'register_idregistro' =>$usuario,
				'locale_id_local' =>$local,
				'fecha' =>$fecha,
				'cantidad' =>$cantidad,
				'cuantos' =>$cuantos
			);
		if (!empty($datos)) {
		//pr($datos);
		$galeria = $this->Gallery->find('all',array('conditions'=>array('id_galeria'=>$producto,'cantidad_existente >'=>0)));
			if(!empty($galeria)){
				$c=$galeria[0]['Gallery']['cantidad_existente'];
				$cant=$c-$cantidad;
				$vend=$galeria[0]['Gallery']['prod_vendidos'];
				$vendidos=$vend+$cantidad;
				$this->Venta->create();
				if ($this->Venta->saveAll($datos)) {
					$this->Gallery->updateAll(array('Gallery.cantidad_existente' => $cant,'Gallery.prod_vendidos' => $vendidos), array('Gallery.id_galeria' => $producto));
					echo 1;
				} else {
					echo 0;
				}
			}else{
				echo 2;
			}
			 
		}
	}
	function add_carrito($producto,$usuario,$local, $cantidad,$cuantos) {
        $this->layout ='ajax';  
		$fecha=date('d-m-Y');
			$datos['Venta'] = array(
				'galeria_id_galeria' =>$producto,
				'register_idregistro' =>$usuario,
				'locale_id_local' =>$local,
				'fecha' =>$fecha,
				'cantidad' =>$cantidad,
				'cuantos' =>$cuantos
			);
		if (!empty($datos)) {
		//pr($datos);
		$galeria = $this->Gallery->find('all',array('conditions'=>array('id_galeria'=>$producto,'cantidad_existente >'=>0)));
			if(!empty($galeria)){
				$c=$galeria[0]['Gallery']['cantidad_existente'];
				$cant=$c-$cantidad;
				$vend=$galeria[0]['Gallery']['prod_vendidos'];
				$vendidos=$vend+$cantidad;
				$this->Venta->create();
				if ($this->Venta->saveAll($datos)) {

					$this->Gallery->updateAll(array('Gallery.cantidad_existente' => $cant,'Gallery.prod_vendidos' => $vendidos), array('Gallery.id_galeria' => $producto));
					echo 1;
				} else {
					echo 0;
				}
			}else{
				echo 2;
			}
			 
		}
	}
	function finalizar_compra($forma_pago,$numero_pago, $id_venta) {
        $this->layout ='ajax';  
		$fecha=date('d-m-Y');
		if($this->Venta->updateAll(array('Venta.forma_pago' => "'$forma_pago'",'Venta.numero_pago' => $numero_pago, 'Venta.status'=>3), array('Venta.id_venta' => $id_venta))){
			echo "6";
		}
	}
	function add_promo($producto,$usuario,$local,$cantidad,$cuantos) {
	/*echo "es ".$producto;
	echo "es ".$usuario;
	echo "es ".$local;*/
        $this->layout ='ajax';  
		$fecha=date('d-m-Y');
			$datos['Venta'] = array(
				'promocion_id_promo' =>$producto,
				'register_idregistro' =>$usuario,
				'locale_id_local' =>$local,
				'fecha' =>$fecha,
				'cantidad' =>$cantidad,
				'cuantos' =>$cuantos
			);
		if (!empty($datos)) {
		//pr($datos);
		$promocion = $this->Promo->find('all',array('conditions'=>array('id_promo'=>$producto,'cantidad_existente >'=>0)));
			if(!empty($promocion)){
				$c=$promocion[0]['Promo']['cantidad_existente'];
				$cant=$c-$cantidad;
				$vend=$promocion[0]['Promo']['prod_vendidos'];
				$vendidos=$vend+$cantidad;
				$this->Venta->create();
				if ($this->Venta->saveAll($datos)) {
					$this->Promo->updateAll(array('Promo.cantidad_existente' => $cant,'Promo.prod_vendidos' => $vendidos), array('Promo.id_promo' => $producto));
					echo 1;
				} else {
					echo 0;
				}
			}else{
				echo 2;
			}
			 
		}
	}
	function consulta($producto,$usuario,$local) {
		/*echo "producto ".$producto;
		echo "usuario ".$usuario;
		echo "local ".$local;*/
        $this->layout ='ajax';  
		if (!empty($producto) and !empty($usuario) and !empty($local)) {
			$galeria = $this->Gallery->find('all',array('conditions'=>array('id_galeria'=>$producto,'cantidad_existente >'=>0)));
			$cliente = $this->Venta->find('all',array('conditions'=>array('Venta.register_idregistro ='=>$usuario,'Venta.galeria_id_galeria ='=>$producto,'Venta.locale_id_local ='=>$local)));
		//pr($cliente);
			if(empty($cliente)){
					if(!empty($galeria)){
						echo 3;
					}else{
						echo 2;
					}
				}else{
					echo 4;
				}
				 
		}
	}
	
	function consulta_promocion($producto,$usuario,$local) {
		
        $this->layout ='ajax';  
		if (!empty($producto) and !empty($usuario) and !empty($local)) {
			$promocion = $this->Promo->find('all',array('conditions'=>array('id_promo'=>$producto,'cantidad_existente >'=>0)));
			$cliente = $this->Venta->find('all',array('conditions'=>array('Venta.register_idregistro ='=>$usuario,'Venta.promocion_id_promo ='=>$producto,'Venta.locale_id_local ='=>$local)));
		//pr($cliente);
			if(empty($cliente)){
					if(!empty($promocion)){
						echo 3;
					}else{
						echo 2;
					}
				}else{
					echo 4;
				}
				 
		}
	}
	function cuantos() {
        $this->layout ='ajax';  
			$cuanto = $this->Venta->find('count');
			//$this->set('cuanto',$cuanto);	 
			echo $cuanto;
	}
	/*function miscompras() {
		$usuario=$this->Session->read('keyus');
        $this->layout ='nuevo'; 
		//echo $usuario;		
		if (!empty($usuario)) {
			$cliente = $this->Venta->find('all',array('conditions'=>array('register_idregistro ='=>$usuario),'limit'=>'7','order' => array('fecha' =>'DESC')));
			//pr($cliente);
			$this->set('clientes',$cliente);
		}
	}*/
	function miscompras() {
	$this->layout ='nuevo';
		$this->helpers;
		$usuario=$this->Session->read('keyus');
		$this->paginate = array('conditions'=>array('Venta.register_idregistro'=>$usuario),'limit' => 6,'order'=> 'fecha DESC');
		$this->set('clientes', $this->paginate('Venta'));
    }
	function mismensajes() {
	$this->layout ='nuevo';
		$this->helpers;
		$usuario=$this->Session->read('keyus');
			$this->paginate = array('fields'=>array('Gallery.id_galeria','Gallery.thumbnails','Gallery.url','replace(date(Gallery.fechacre_galeria),"-","") as fecha1','Gallery.texto_galeria','Gallery.locale_id_local','Page.id_page','Page.nombre','Page.fecha','Locale.nombre_empresa','Page.status','Promo.url','replace(date(Promo.fechacre_promo),"-","") as fecha2'),'conditions'=>array('Page.register_idregistro'=>$usuario,'Page.resp !='=>'0'),'limit' => 8,'order'=> 'fecha DESC');
			$this->set('mensajes', $this->paginate('Page'));
	}
	function misreclamos() {
	$this->layout ='nuevo';
		$this->helpers;
		$usuario=$this->Session->read('keyus');
			$this->paginate = array('fields'=>array('Gallery.id_galeria','Gallery.thumbnails','Gallery.url','replace(date(Gallery.fechacre_galeria),"-","") as fecha1','Gallery.texto_galeria','Gallery.locale_id_local','Denuncia.id_denuncia','Denuncia.promocion_id_promo','Denuncia.fecha','Locale.nombre_empresa','Locale.encargado_nombre','Locale.encargado_apellido','Denuncia.status','Promo.id_promo','Promo.url','replace(date(Promo.fechacre_promo),"-","") as fecha2'),'conditions'=>array('Denuncia.register_idregistro'=>$usuario,'Denuncia.resp !='=>'0'),'limit' => 8,'order'=> 'fecha DESC');
			$this->set('reclamos', $this->paginate('Denuncia'));
	}
	function denunciar($producto,$usuario,$local) {
        $this->layout ='ajax';  
		$this->set('producto',$producto);
		$this->set('usuario',$usuario);
		$this->set('local',$local);
	}
	function denunciar_promo($producto,$usuario,$local) {
        $this->layout ='ajax';  
		$this->set('producto',$producto);
		$this->set('usuario',$usuario);
		$this->set('local',$local);
	}
	function finalizar_denunciar() {
        $this->layout ='ajax';  
		if (!empty($this->data)) {
			
			if ($this->Locale->save($this->data)) {
				//$this->Session->setFlash(__('Se ha modificado el registro exitosamente.', null), 'default', array('class' => 'flash_good'));
				//$this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(__('No se pudo modificar el registro. Por favor intenta nuevamente.', null), 'default', array('class' => 'flash_bad'));
			}
		}
	}
	function edit($id = null) {
	                if (!$this->Acl->check(array('model' => 'User', 'foreign_key' => $this->Session->read('Auth.User.id_usuario')), 'editar galerias')) {
                    $this->redirect(array('action' => 'index'));
                }
                
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Id Invalido.', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Locale->save($this->data)) {
				$this->Session->setFlash(__('Se ha modificado el registro exitosamente.', null), 'default', array('class' => 'flash_good'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo modificar el registro. Por favor intenta nuevamente.', null), 'default', array('class' => 'flash_bad'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Locale->read(null, $id);
                   

                }
		
             /*   $users = $this->Locale->User->find('list');
		$galerias = $this->Locale->find('list',array('fields'=>array('thumbnails'),'conditions'=>array('id_galeria'=>$id)));
		$this->set(compact('users','galerias'));*/
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id Invalido.', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Locale->deleteAll("Locale.id_local=".$id)) {
			$this->Session->setFlash(__('Se ha eliminado el registro exitosamente.', null), 'default', array('class' => 'flash_good'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('No se pudo eliminar. Intenta nuevamente.', null), 'default', array('class' => 'flash_bad'));
		$this->redirect(array('action' => 'index'));
	}
	
	function deleteimg($id = null,$idfile=null) {
               
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for gallery', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Locale->query("DELETE FROM archivos_galleries,archivos USING archivos_galleries INNER JOIN archivos ON archivos_galleries.files_id_file=archivos.id_file INNER JOIN galleries ON archivos_galleries.galerias_id_galeria=galleries.id_galeria where galleries.id_galeria = $id AND archivos.id_file = $idfile")) {
			$this->Session->setFlash(__('Imagen Borrada', true));
			$this->redirect(array('action'=>'index'));
		}else{
                    $this->Session->setFlash(__('La imagen no se pudo borrar', true));
                    $this->redirect(array('action' => 'index'));
                }
	}
	
	
	function desactiva($id = null) {
		 if (!$id) {
			$this->Session->setFlash(__('Id Invalido.', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action'=>'index'));
		}
		
		if($this->Locale->updateAll(array('Locale.status' => '0'), array('Locale.id_local' => $id))) {
			$this->Session->setFlash(__('Se ha desactivado exitosamente.', null), 'default', array('class' => 'flash_good'));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El registro no pudo desactivarse. Por favor Intenta nuevamente.', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index'));
		}
	}
	
	function activa($id = null) {
		 if (!$id) {
			$this->Session->setFlash(__('Id Invalido.', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action'=>'index'));
		}
		
		if($this->Locale->updateAll(array('Locale.status' => '1'), array('Locale.id_local' => $id))) {
			$this->Session->setFlash(__('Se ha activado exitosamente.', null), 'default', array('class' => 'flash_good'));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('No pudo activarse. Por favor Intenta nuevamente.', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index'));
		}
	}
	function pdf_compra($id) {Configure::write('debug',0);
      $this->layout = 'pdf'; //this will use the pdf.ctp layout
	  //echo "es ".$id;
		$ventas = $this->Venta->find('all',array('conditions' => array('Venta.id_venta'=>$id)));
		$this->set(compact('ventas'));
        $this->render();
    }
	function pdf_completo_venta($id) {Configure::write('debug',0);
      $this->layout = 'pdf'; //this will use the pdf.ctp layout
	  //echo "es ".$id;
	  $fecha=date('d-m-Y');
		$ventas = $this->Venta->find('all',array('conditions' => array('Venta.register_idregistro'=>$id,'Venta.fecha'=>$fecha)));
		$this->set(compact('ventas'));
        $this->render();
    }
	function pdf($id) {Configure::write('debug',0);
      $this->layout = 'pdf'; //this will use the pdf.ctp layout
		$locales = $this->Locale->find('all',array('conditions' => array('Locale.id_local'=>$id)));
		$this->set(compact('locales'));
        $this->render();
    }
	function pdf_completo() {Configure::write('debug',0);
      $this->layout = 'pdf'; //this will use the pdf.ctp layout
		$locales = $this->Locale->find('all');
		$this->set(compact('locales'));
        $this->render();
    }
	function consulta_compra($id_venta) {
        $this->layout ='ajax';  
			$cliente = $this->Venta->find('all',array('conditions'=>array('Venta.id ='=>$usuario,'Venta.galeria_id_galeria ='=>$producto,'Venta.locale_id_local ='=>$local)));
					if(!empty($galeria)){
						echo 3;
					}else{
						echo 2;
					}
	}
	
	function carrito($id_local,$usuario,$cuantos){
		$this->layout ='carrito';  
			$this->paginate = array('fields'=>array('id_galeria','thumbnails','url','replace(date(fechacre_galeria),"-","") as fecha','texto_galeria','locale_id_local','precio'),'limit' => 8,'conditions' => array('Gallery.locale_id_local ='=>$id_local));
			$this->set('galerias', $this->paginate('Gallery'));
			
			$this->paginate = array('fields'=>array('id_promo','thumbnails','url','replace(date(fechacre_promo),"-","") as fecha','texto_promo','locale_id_local','precio'),'limit' => 8,'conditions' => array('Promo.locale_id_local ='=>$id_local));
			$this->set('promociones', $this->paginate('Promo'));
			$this->set('local', $id_local);
			$this->set('cuantos', $cuantos);
			
	}
}
?>