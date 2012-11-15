<?php
App::import('Vendor' ,'convertidor', array('file' => 'SimpleImage.php'));
class LocalesController extends AppController {

	var $name = 'Locales';
        var $helpers = array('Html', 'Form', 'Javascript');
        var $uses = array('Locale','Archivo','Category','User','Group','Aco','Aro','ArosAco');
         var $paginate = array(
          'limit' => 10,
		  'order' => array(
				'status' =>'DESC'
		  )
         );
	function beforeFilter(){
        $this->Auth->allow('acceso');
    }
	function index() {
        $this->layout ='admin'; 
		$this->Locale->recursive = 0;
		$this->set('locales', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid gallery', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('locale', $this->Locale->read(null, $id));
	}

	function add() {
        $this->layout ='admin';   
		//pr($this->data);	
		
		if (!empty($this->data)) {
		$cadena = "abcdefghijklmnopqrstuvwxyz";
		$cadena = md5($cadena);//md5 crea un valor aleatorio
		srand((double)microtime()*1000000);
		$inicio = rand(0,27);
		$codigo = substr($cadena,$inicio,6);
        $this->data['Locale']['codigo']=$codigo;
		
		$locales = $this->Locale->find('all',array('conditions'=>array('rif'=>$this->data['Locale']['rif'])));
		if(empty($locales)){
		//$this->data['Locale']['nombre_file']	= $this->data['Locale']['nombre_file']['name'];
            $this->Locale->create();
			/*$fecha=date('d-m-Y');
			//$clave=MD5($this->data['Locale']['password']);
			$clave=$this->data['Locale']['password'];
				//pr($clave);
			$datos['User'] = array(
				'username' =>$this->data['Locale']['correo'],
				'email_usuario' =>$this->data['Locale']['correo'],
				'password' =>$clave,
				'perfil_usuario' =>$this->data['Locale']['encargado_nombre'].' '.$this->data['Locale']['encargado_apellido'],
				'groups_idgrupos' =>2
				//'fecharreg_usuario' =>$fecha
			);*/
			//pr($datos);
		//if($this->User->saveAll($datos)){
			if ($this->Locale->saveAll($this->data)) {
				
				$nom_pic = $this->Locale->read();
				//pr($nom_pic);
					//Thumbnails
					//var_dump("direccion ".dirname(__FILE__));
					$file = $nom_pic['Locale']['nombre_file'];
					$ubicacion = $nom_pic['Locale']['ubicacion_file'];
					// The directory where our images will be stored
					$file_directory = dirname(__FILE__)."/../webroot/files/locales/otras/";
					$conversion = dirname(__FILE__)."/../webroot/files/locales/thumbnails/";
					// The path to the original image file on our web server
					$original_file_path = $file_directory.$file;
					$conversion=$conversion.$file;
					//Imagen del uploadbloqueado
				    $image = new SimpleImage();
					$image->load($original_file_path);
					if($image->getWidth() > 96){
						$image->resizeToWidth(96);
					}
					if($image->getHeight() > 72){
						$image->resizeToHeight(72);
					}
					$image->save($conversion);
					
					//Imagen del Fotos
					$normal = dirname(__FILE__)."/../webroot/files/locales/slider/";
					$original_file_path = $file_directory.$file;
					$normal=$normal.$file;
				    $image = new SimpleImage();
					$image->load($original_file_path);
					if($image->getWidth() > 600){
						$image->resizeToWidth(600);
					}
					if($image->getHeight() > 480){
						$image->resizeToHeight(480);
					}
					$image->save($normal);
					
					//UBICACION DEL LOCAL
					$ubic_file = dirname(__FILE__)."/../webroot/files/locales/slider/";
					$original_file_path = $file_directory.$ubicacion;
					$ubic_file=$ubic_file.$ubicacion;
				    $image = new SimpleImage();
					$image->load($original_file_path);
					if($image->getWidth() > 600){
						$image->resizeToWidth(600);
					}
					if($image->getHeight() > 480){
						$image->resizeToHeight(480);
					}
					$image->save($ubic_file);
					
					
				$this->Session->setFlash(__('Se ha registrado exitosamente.', null), 'default', array('class' => 'flash_good'));
                $this->redirect(array('action' => 'index')); 
			} else {
				$this->Session->setFlash(__('No se pudo registrar, por favor intenta nuevamente', null), 'default', array('class' => 'flash_bad'));
			}
		/*} else {
			$this->Session->setFlash(__('No se pudo registrar, por favor intenta nuevamente', null), 'default', array('class' => 'flash_bad'));
		}*/
		}else{
			$this->Session->setFlash(__('Ya el rif ha sido registrado. Verifique.', null), 'default', array('class' => 'flash_bad'));
		}
			 
		}
		$users = $this->Locale->User->find('list');
		$this->set(compact('users'));
		

	}

	function edit($id = null) {
	$this->layout ='admin';   
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
	function acceso(){
            $this->layout = 'ajax';
                $corre = $this->data['Locale']['username'];
                $pass = $this->data['Locale']['password'];

               
            $this->set('lo',$corre);
            $this->set('pa',$pass);
            $reglogin = $this->Locale->find('all',array('conditions'=>array('Locale.correo'=>$corre,'Locale.password'=>$pass)));
            //pr($reglogin);
           if(!empty($reglogin)){
              /* $usersesion =   $this->Session->write('nombreusuario', $reglogin[0]['Register']['nombreape']);
               $id = $this->Session->write('keyus',$reglogin[0]['Register']['idregistro']);
               $this->set('mensaje',$this->Session->read('nombreusuario'));
               $this->set('id',$this->Session->read('keyus'));
               $this->set('flag',1);*/
			   $this->redirect(array('controller'=>'users','action' => 'index'));
           }else{
               //$this->set('flag',0);
               //$this->set('mensaje','El usuario no esxiste en la base de datos');
           }

        }
	
}
?>