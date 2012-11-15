<?php
class DenunciasController extends AppController {

	var $name = 'Denuncias';
        var $helpers = array('Html', 'Form', 'Javascript');
        var $uses = array('Denuncia','Locale','Gallery','Denuncia','User');
         var $paginate = array(
          'limit' => 10,
		  'order' => array(
				'fecha' =>'DESC'
		  )
         );
	function beforeFilter() {
        $this->Auth->allowedActions = array('add','consulta','denunciar','fin_denunciar','denunciar_promo','registro_reclamo','registro_denuncia','detallemensajepromo');
    }

	function index() {
	$this->layout ='admin';
		$this->helpers;
		$user=$this->Session->read('Auth.User.locale_id_local');
		if(!empty($user)){
			$this->paginate = array('conditions'=>array('Denuncia.locale_id_local'=>$user,'Denuncia.resp ='=>'0'),'limit' => 10,'order'=> 'fecha DESC');
			$this->set('reclamos', $this->paginate('Denuncia'));
		}else{
			$this->paginate = array('conditions'=>array('Denuncia.resp ='=>'0'),'limit' => 10,'order'=> 'fecha DESC');
			$this->set('reclamos', $this->paginate('Denuncia'));
		}
    }
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid gallery', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('venta', $this->Venta->read(null, $id));
	}

	function add($producto,$usuario,$local) {
        $this->layout ='ajax';  
		$fecha=date('d-m-Y');
			$datos['Venta'] = array(
				'galeria_id_galeria' =>$producto,
				'register_idregistro' =>$usuario,
				'locale_id_local' =>$local,
				'fecha' =>$fecha
			);
		if (!empty($datos)) {
		//pr($datos);
		$galeria = $this->Gallery->find('all',array('conditions'=>array('id_galeria'=>$producto,'cantidad_existente >'=>0)));
			if(!empty($galeria)){
				$c=$galeria[0]['Gallery']['cantidad_existente'];
				$cant=$c-1;
				$vend=$galeria[0]['Gallery']['prod_vendidos'];
				$vendidos=$vend+1;
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
	function consulta($producto,$usuario,$local) {
		
        $this->layout ='ajax';  
		if (!empty($producto) and !empty($usuario) and !empty($local)) {
			$galeria = $this->Gallery->find('all',array('conditions'=>array('id_galeria'=>$producto,'cantidad_existente >'=>0)));
			$cliente = $this->Venta->find('all',array('conditions'=>array('register_idregistro ='=>$usuario,'galeria_id_galeria ='=>$producto,'locale_id_local ='=>$local)));
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
	function denunciar() {
        $this->layout ='ajax';  
		if (!empty($this->data)) {
		//pr($this->data);
			$fecha=date('d-m-Y');
			$this->data['Denuncia']['fecha']=$fecha;
			if ($this->Denuncia->save($this->data)) {
				//$this->Session->setFlash(__('Se ha registrado exitosamente.', null), 'default', array('class' => 'flash_good'));
				$this->redirect(array('action' => 'fin_denunciar'));
			} else {
				//$this->Session->setFlash(__('No se pudo modificar el registro. Por favor intenta nuevamente.', null), 'default', array('class' => 'flash_bad'));
			}
		}
	}
	function denunciar_promo() {
        $this->layout ='ajax';  
		if (!empty($this->data)) {
		//pr($this->data);
			$fecha=date('d-m-Y');
			$this->data['Denuncia']['fecha']=$fecha;
			if ($this->Denuncia->save($this->data)) {
				//$this->Session->setFlash(__('Se ha registrado exitosamente.', null), 'default', array('class' => 'flash_good'));
				$this->redirect(array('action' => 'fin_denunciar'));
			} else {
				//$this->Session->setFlash(__('No se pudo modificar el registro. Por favor intenta nuevamente.', null), 'default', array('class' => 'flash_bad'));
			}
		}
	}
	function fin_denunciar() {
        $this->layout ='ajax';  
	}
	function finalizar_denunciar() {
        $this->layout ='ajax';  
		if (!empty($this->data)) {
			
			if ($this->Locale->save($this->data)) {
				$this->Session->setFlash(__('Se ha modificado el registro exitosamente.', null), 'default', array('class' => 'flash_good'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo modificar el registro. Por favor intenta nuevamente.', null), 'default', array('class' => 'flash_bad'));
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

	function delete($id) {
        $this->Denuncia->delete($id);
        $this->Session->setFlash(__('El registro se ha eliminado con exito.', null), 'default', array('class' => 'flash_good'));
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

	function responder_denuncia($id = null) {
		$this->layout ='admin';
		
		$info = $this->Denuncia->find('all',array('conditions'=>array('id_denuncia'=>$id))); //,'register_idregistro'=>$usuario
		$this->set('info',$info);
		//$this->render(false);
		
    }
	function registro_denuncia(){
		$this->layout ='admin';
		//pr($this->data);
		if (!empty($this->data)) {
            $usuario = $this->data['Denuncia']['usuario'];
			$id_respuesta = $this->data['Denuncia']['id_respuesta'];
			$cliente = $this->Denuncia->find('all',array('conditions'=>array('id_denuncia'=>$id_respuesta)));
			$id_cliente=$cliente[0]['Denuncia']['register_idregistro'];
			//pr($id_cliente);
			if(!empty($this->data['Denuncia']['promocion_id_promo'])){
				$producto_promo = $this->data['Denuncia']['promocion_id_promo'];
			}else{
				$producto_promo='';
			}
			if(!empty($this->data['Denuncia']['galeria_id_galeria'])){
				$producto_gal = $this->data['Denuncia']['galeria_id_galeria'];
			}else{
				$producto_gal='';
			}

			$local = $this->data['Denuncia']['local'];
			$vendedor = $this->User->find('all',array('conditions'=>array('id_usuario'=>$usuario)));
			$nombre=$vendedor[0]['User']['perfil_usuario'];
			$this->data['Denuncia']['nombre']=$nombre;
			$this->data['Denuncia']['galeria_id_galeria']=$producto_gal;
			$this->data['Denuncia']['promocion_id_promo']=$producto_promo;
			$this->data['Denuncia']['resp']=$usuario;
			$this->data['Denuncia']['locale_id_local']=$local;
			$this->data['Denuncia']['status']=0;
			$this->data['Denuncia']['register_idregistro']=$id_cliente;
            $this->Denuncia->set($this->data);
                           if ($this->Denuncia->save($this->data)) {
                                //Mientras  $this->_sendEmail($this->data);
								$this->Denuncia->updateAll(array('Denuncia.status' => '1'), array('Denuncia.id_denuncia' => $id_respuesta));
									$this->Session->setFlash(__('Los datos han sido guardados con exito.', null), 'default', array('class' => 'flash_good'));
                                $this->redirect(array('controller'=>'denuncias','action' => 'index'));
                            } else {
								$this->Session->setFlash(__('No se pudo guardar su registro porfavor intente nuevamente.', null), 'default', array('class' => 'flash_bad'));
								
                            }
		}
    }
	function responder_reclamo($id = null) {
		$this->layout ='nuevo';
		$user=$this->Session->read('Auth.User.locale_id_local');
		if(!empty($user)){
			$info = $this->Denuncia->find('all',array('conditions'=>array('id_denuncia'=>$id,'locale_id_local'=>$user))); //,'register_idregistro'=>$usuario
			$this->set('info',$info);
			//$this->render(false);
		}else{
			$info = $this->Denuncia->find('all',array('conditions'=>array('id_denuncia'=>$id))); //,'register_idregistro'=>$usuario
			$this->set('info', $info);
		}
		
    }
	function registro_reclamo(){
		$this->layout ='nuevo';
		//pr($this->data);
		if (!empty($this->data)) {
            $usuario = $this->data['Denuncia']['usuario'];
			$id_respuesta = $this->data['Denuncia']['id_respuesta'];
			$cliente = $this->Denuncia->find('all',array('conditions'=>array('id_denuncia'=>$id_respuesta)));
			$id_cliente=$cliente[0]['Denuncia']['register_idregistro'];
			//pr($usuario);
			$producto = $this->data['Denuncia']['producto'];
			$local = $this->data['Denuncia']['local'];
			$vendedor = $this->User->find('all',array('conditions'=>array('id_usuario'=>$usuario)));
			$nombre=$vendedor[0]['User']['perfil_usuario'];
			$this->data['Denuncia']['nombre']=$nombre;
			$this->data['Denuncia']['galeria_id_galeria']=$producto;
			$this->data['Denuncia']['resp']=0;
			$this->data['Denuncia']['locale_id_local']=$local;
			$this->data['Denuncia']['status']=0;
			$this->data['Denuncia']['register_idregistro']=$id_cliente;
            $this->Denuncia->set($this->data);
                           if ($this->Denuncia->save($this->data)) {
                                //Mientras  $this->_sendEmail($this->data);
								$this->Denuncia->updateAll(array('Denuncia.status' => '1'), array('Denuncia.id_denuncia' => $id_respuesta));
									$this->Session->setFlash(__('Los datos han sido guardados con exito.', null), 'default', array('class' => 'flash_good'));
                                $this->redirect(array('controller'=>'ventas','action' => 'misreclamos'));
                            } else {
								$this->Session->setFlash(__('No se pudo guardar su registro porfavor intente nuevamente.', null), 'default', array('class' => 'flash_bad'));
								
                            }
		}
    }
	function detallemensajepromo($fecha,$url,$id_page){
		$this->layout ='ajax';
		//pr($url);
			if($this->Denuncia->updateAll(array('Denuncia.status' => '1'), array('Denuncia.id_denuncia' => $id_page))){
                $this->redirect(array('controller'=>'pages','action' => 'detallepublicidad',$fecha,$url));
			}
    }
}
?>