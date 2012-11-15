<?php
App::import('Vendor' ,'convertidor', array('file' => 'SimpleImage.php'));
class GalleriesController extends AppController {

	var $name = 'Galleries';
        var $helpers = array('Html', 'Form', 'Javascript');
        var $uses = array('Gallery','Archivo','Category','Locale');

	function index() {
	$this->layout ='admin';
		$this->helpers;
		$user=$this->Session->read('Auth.User.locale_id_local');
		if(!empty($user)){
			$this->paginate = array('conditions'=>array('Gallery.locale_id_local'=>$user),'limit' => 10,'order'=> 'fechacre_galeria DESC');
			$this->set('galleries', $this->paginate('Gallery'));
		}else{
			$this->paginate = array('limit' => 10,'order'=> 'fechacre_galeria DESC');
			$this->set('galleries', $this->paginate('Gallery'));
		}
    }
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid gallery', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('gallery', $this->Gallery->read(null, $id));
	}

	function add() {
        $this->layout ='admin';  
		//pr($this->data);
		$user=$this->Session->read('Auth.User.locale_id_local');
		if(!empty($user)){
				$locales = $this->Locale->find('all',array('conditions'=>array('Locale.id_local ='=>$user)));
				$empresa=$locales[0]['Locale']['nombre_empresa'];
				$this->set('empresa', $empresa);
		}
		if (!empty($this->data)) {
			$this->Gallery->create();
			$nombre_local=$this->data['Gallery']['locale_id_local'];
			$locales = $this->Locale->find('all',array('fields'=>array('Locale.nombre_empresa','Locale.id_local'),'conditions'=>array('Locale.nombre_empresa ='=>$nombre_local,'Locale.status ='=>1)));
			$this->data['Gallery']['locale_id_local']=$locales[0]['Locale']['id_local'];
			
            $cantidad=$this->data['Gallery']['cantidad'];
			$this->data['Gallery']['cantidad_existente']=$cantidad;
			$this->data['Gallery']['prod_vendidos']=0;
			if ($this->Gallery->saveAll($this->data)) {
				$nom_pic = $this->Gallery->read();
					//Thumbnails
					//var_dump("direccion ".dirname(__FILE__));
					$file = $nom_pic['Gallery']['thumbnails'];
					// The directory where our images will be stored
					$file_directory = dirname(__FILE__)."/../webroot/files/galeria/otras/";
					$conversion = dirname(__FILE__)."/../webroot/files/galeria/thumbnails/";
					// The path to the original image file on our web server
					$original_file_path = $file_directory.$file;
					$conversion=$conversion.$file;
					//Imagen del uploadbloqueado
				    $image = new SimpleImage();
					$image->load($original_file_path);
					if($image->getWidth() > 124){
						$image->resizeToWidth(124);
					}
					if($image->getHeight() > 124){
						$image->resizeToHeight(124);
					}
					$image->save($conversion);
					
					//Imagen del Fotos
					$normal = dirname(__FILE__)."/../webroot/files/galeria/normal/";
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
					
					
				$this->Session->setFlash(__('La galeria se ha guardado', true));
                $this->redirect(array('action' => 'index')); 
			} else {
				$this->Session->setFlash(__('La galeria no pudo guardarse porfavor intenta nuevamente.', true));
			}
			 
		}
		$users = $this->Gallery->User->find('list');
		$archivos = $this->Gallery->Archivo->find('list');
		//$categories = $this->Gallery->Category->find('list');
		//$news = $this->Gallery->News->find('list');
		$this->set(compact('users', 'archivos'));
		

	}

	function edit($id = null) {
		$this->layout ='admin';  
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid gallery', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			//pr($this->data);
			$nombre_local=$this->data['Gallery']['locale_id_local'];
			$locales = $this->Locale->find('all',array('fields'=>array('Locale.nombre_empresa','Locale.id_local'),'conditions'=>array('Locale.nombre_empresa ='=>$nombre_local,'Locale.status ='=>1)));
			$this->data['Gallery']['locale_id_local']=$locales[0]['Locale']['id_local'];
			
            $cantidad=$this->data['Gallery']['cantidad'];
			$this->data['Gallery']['cantidad_existente']=$cantidad;
			$this->data['Gallery']['prod_vendidos']=0;
			if ($this->Gallery->saveAll($this->data)) {
				$nom_pic = $this->Gallery->read();
					//Thumbnails
					//var_dump("direccion ".dirname(__FILE__));
					$file = $nom_pic['Gallery']['thumbnails'];
					// The directory where our images will be stored
					$file_directory = dirname(__FILE__)."/../webroot/files/galeria/otras/";
					$conversion = dirname(__FILE__)."/../webroot/files/galeria/thumbnails/";
					// The path to the original image file on our web server
					$original_file_path = $file_directory.$file;
					$conversion=$conversion.$file;
					//Imagen del uploadbloqueado
				    $image = new SimpleImage();
					$image->load($original_file_path);
					if($image->getWidth() > 124){
						$image->resizeToWidth(124);
					}
					if($image->getHeight() > 124){
						$image->resizeToHeight(124);
					}
					$image->save($conversion);
					
					//Imagen del Fotos
					$normal = dirname(__FILE__)."/../webroot/files/galeria/normal/";
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
			//if ($this->Gallery->save($this->data)) {
				$this->Session->setFlash(__('La galeria se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La galeria no pudo guardarse porfavor intenta nuevamente.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Gallery->read(null, $id);
                   

                }
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for gallery', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Gallery->deleteAll("Gallery.id_galeria=".$id)) {
			$this->Session->setFlash(__('Gallery deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Gallery was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function deleteimg($id = null,$idfile=null) {
               
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for gallery', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Gallery->query("DELETE FROM archivos_galleries,archivos USING archivos_galleries INNER JOIN archivos ON archivos_galleries.files_id_file=archivos.id_file INNER JOIN galleries ON archivos_galleries.galerias_id_galeria=galleries.id_galeria where galleries.id_galeria = $id AND archivos.id_file = $idfile")) {
			$this->Session->setFlash(__('Imagen Borrada', true));
			$this->redirect(array('action'=>'index'));
		}else{
                    $this->Session->setFlash(__('La imagen no se pudo borrar', true));
                    $this->redirect(array('action' => 'index'));
                }
	}
	
	
	function desactiva($id = null) {
		 if (!$id) {
			$this->Session->setFlash(__('Invalid id for gallery', true));
			$this->redirect(array('action'=>'index'));
		}
		
		if($this->Gallery->updateAll(array('Gallery.publicar' => '0'), array('Gallery.id_galeria' => $id))) {
			$this->Session->setFlash(__('La Galeria se modificó correctamente', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('La galeria no pudo modificarse porfavor intenta nuevamente', true));
			$this->redirect(array('action' => 'index'));
		}
	}
	
	function activa($id = null) {
		 if (!$id) {
			$this->Session->setFlash(__('Invalid id for gallery', true));
			$this->redirect(array('action'=>'index'));
		}
		
		if($this->Gallery->updateAll(array('Gallery.publicar' => '1'), array('Gallery.id_galeria' => $id))) {
			$this->Session->setFlash(__('La Galeria se modificó correctamente', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('La galeria no pudo modificarse porfavor intenta nuevamente', true));
			$this->redirect(array('action' => 'index'));
		}
	}
	
	function verlocal(){
            $this->layout = 'ajax';
            $frase = $_REQUEST['term'];
			if(($frase!="")or($frase!=NULL)){
				$locales = $this->Locale->find('all',array('fields'=>array('Locale.nombre_empresa','Locale.id_local'),'conditions'=>array('Locale.nombre_empresa LIKE'=>'%'.$frase.'%','Locale.status ='=>1)));
			}
			else
			{
				$locales = $this->Locale->find('all',array('fields'=>array('Locale.nombre_empresa')));
			}
			
			
               $nomlocal = array();
               
           // pr($proveedores);
            for($i=0;$i<count($locales);$i++)
                    {
                        $nomlocal[$i]['id'] = $locales[$i]['Locale']['id_local'];
                        $nomlocal[$i]['value'] = $locales[$i]['Locale']['nombre_empresa'];
                    }
        $this->set('local',$nomlocal);
    }
	
}
?>