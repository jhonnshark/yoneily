<?php
App::import('Vendor' ,'convertidor', array('file' => 'SimpleImage.php'));
class PromosController extends AppController {

	var $name = 'Promos';
        var $helpers = array('Html', 'Form', 'Javascript');
        var $uses = array('Promo','Archivo','Category','Locale');
         /*var $paginate = array(
          'limit' => 10,
		  'order' => array(
				'fechacre_promo' =>'DESC'
		  )
         );*/
	function index() {
	$this->layout ='admin';
		$this->helpers;
		$user=$this->Session->read('Auth.User.locale_id_local');
		if(!empty($user)){
			$this->paginate = array('conditions'=>array('Promo.locale_id_local'=>$user),'limit' => 10,'order'=> 'fechacre_promo DESC');
			$this->set('promociones', $this->paginate('Promo'));
		}else{
			$this->paginate = array('limit' => 10,'order'=> 'fechacre_promo DESC');
			$this->set('promociones', $this->paginate('Promo'));
		}
    }
	/*function index($user) {
        $this->layout ='admin'; 
		$this->Promo->recursive = 0;
		//$this->Promo->'conditions'=>array('Promo.locale_id_local'=>$user);
		$this->set('promociones', $this->paginate('conditions'=>array('Promo.locale_id_local'=>$user)));
		//$user=$session->read('Auth.User.groups_idgrupos');
		pr($user);
	}*/

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid promocion', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('promociones', $this->Promo->read(null, $id));
	}

	function add() {
        $this->layout ='admin';  
		$user=$this->Session->read('Auth.User.locale_id_local');
		if(!empty($user)){
				$locales = $this->Locale->find('all',array('conditions'=>array('Locale.id_local ='=>$user)));
				$empresa=$locales[0]['Locale']['nombre_empresa'];
				$this->set('empresa', $empresa);
		}
		if (!empty($this->data)) {
		
			
			$nombre_local=$this->data['Promo']['locale_id_local'];
			$locales = $this->Locale->find('all',array('fields'=>array('Locale.nombre_empresa','Locale.id_local'),'conditions'=>array('Locale.nombre_empresa ='=>$nombre_local,'Locale.status ='=>1)));
			$this->data['Promo']['locale_id_local']=$locales[0]['Locale']['id_local'];
			$usuario=$locales[0]['Locale']['id_local'];
			$cantidad=$this->data['Promo']['cantidad'];
			$this->data['Promo']['cantidad_existente']=$cantidad;
			$this->data['Promo']['prod_vendidos']=0;
			$this->Promo->create();
			if ($this->Promo->saveAll($this->data)) {
				$nom_pic = $this->Promo->read();
					//Thumbnails
					//var_dump("direccion ".dirname(__FILE__));
					$file = $nom_pic['Promo']['thumbnails'];
					// The directory where our images will be stored
					$file_directory = dirname(__FILE__)."/../webroot/files/promos/otras/";
					$conversion = dirname(__FILE__)."/../webroot/files/promos/thumbnails/";
					// The path to the original image file on our web server
					$original_file_path = $file_directory.$file;
					$conversion=$conversion.$file;
					//Imagen del uploadbloqueado
				    $image = new SimpleImage();
					$image->load($original_file_path);
					if($image->getWidth() > 450){
						$image->resizeToWidth(450);
					}
					if($image->getHeight() > 280){
						$image->resizeToHeight(280);
					}
					$image->save($conversion);
					
					//Imagen del Fotos
					$normal = dirname(__FILE__)."/../webroot/files/promos/slider/";
					$original_file_path = $file_directory.$file;
					$normal=$normal.$file;
				    $image = new SimpleImage();
					$image->load($original_file_path);
					if($image->getWidth() > 779){
						$image->resizeToWidth(779);
					}
					if($image->getHeight() > 280){
						$image->resizeToHeight(280);
					}
					$image->save($normal);
					
					
				$this->Session->setFlash(__('La promoci&oacute;n se ha guardado', true));
                $this->redirect(array('action' => 'index')); 
			} else {
				$this->Session->setFlash(__('La promoci&oacute;n no pudo guardarse porfavor intenta nuevamente.', true));
			}
			 
		}
		$users = $this->Promo->User->find('list');
		$archivos = $this->Promo->Archivo->find('list');
		//$categories = $this->Promo->Category->find('list');
		//$news = $this->Promo->News->find('list');
		$this->set(compact('users', 'archivos'));
		

	}

	function edit($id = null) {
		$this->layout ='admin';
        $user=$this->Session->read('Auth.User.locale_id_local');
		//pr($user);
		if(!empty($user)){
				$locales = $this->Locale->find('all',array('conditions'=>array('Locale.id_local ='=>$user)));
				$empresa=$locales[0]['Locale']['nombre_empresa'];
				$this->set('empresa', $empresa);
		}
		if(empty($this->data)) {
            $this->data = $this->Promo->read(null, $id);
        }else {
			$nombre_local=$this->data['Promo']['locale_id_local'];
			$locales = $this->Locale->find('all',array('fields'=>array('Locale.nombre_empresa','Locale.id_local'),'conditions'=>array('Locale.nombre_empresa ='=>$nombre_local,'Locale.status ='=>1)));
			$this->data['Promo']['locale_id_local']=$locales[0]['Locale']['id_local'];
			$usuario=$locales[0]['Locale']['id_local'];
			$cantidad=$this->data['Promo']['cantidad'];
			$this->data['Promo']['cantidad_existente']=$cantidad;
			$this->data['Promo']['prod_vendidos']=0;
			$this->Promo->create();
			if ($this->Promo->saveAll($this->data)) {
				$nom_pic = $this->Promo->read();
					//Thumbnails
					//var_dump("direccion ".dirname(__FILE__));
					$file = $nom_pic['Promo']['thumbnails'];
					// The directory where our images will be stored
					$file_directory = dirname(__FILE__)."/../webroot/files/promos/otras/";
					$conversion = dirname(__FILE__)."/../webroot/files/promos/thumbnails/";
					// The path to the original image file on our web server
					$original_file_path = $file_directory.$file;
					$conversion=$conversion.$file;
					//Imagen del uploadbloqueado
				    $image = new SimpleImage();
					$image->load($original_file_path);
					if($image->getWidth() > 450){
						$image->resizeToWidth(450);
					}
					if($image->getHeight() > 280){
						$image->resizeToHeight(280);
					}
					$image->save($conversion);
					
					//Imagen del Fotos
					$normal = dirname(__FILE__)."/../webroot/files/promos/slider/";
					$original_file_path = $file_directory.$file;
					$normal=$normal.$file;
				    $image = new SimpleImage();
					$image->load($original_file_path);
					if($image->getWidth() > 779){
						$image->resizeToWidth(779);
					}
					if($image->getHeight() > 280){
						$image->resizeToHeight(280);
					}
					$image->save($normal);
					
			
           // if($this->Promo->save($this->data)) {
				$this->Session->setFlash(__('La edici&oacute;n fue hecha con exito', null), 'default', array('class' => 'flash_good'));
                $this->redirect(array('action' => 'index'));
            }
        }
	}

	function delete($id = null) {
		$user=$this->Session->read('Auth.User.locale_id_local');
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for promocion', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Promo->deleteAll("Promo.id_promo=".$id)) {
			$this->Session->setFlash(__('Promocion deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Promocion was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function deleteimg($id = null,$idfile=null) {
               
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for promocion', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Promo->query("DELETE FROM archivos_galleries,archivos USING archivos_galleries INNER JOIN archivos ON archivos_galleries.files_id_file=archivos.id_file INNER JOIN galleries ON archivos_galleries.galerias_id_promo=galleries.id_promo where galleries.id_promo = $id AND archivos.id_file = $idfile")) {
			$this->Session->setFlash(__('Imagen Borrada', true));
			$this->redirect(array('action'=>'index'));
		}else{
                    $this->Session->setFlash(__('La imagen no se pudo borrar', true));
                    $this->redirect(array('action' => 'index'));
                }
	}
	
	
	function desactiva($id = null) {
		 if (!$id) {
			$this->Session->setFlash(__('Invalid id for promocion', true));
			$this->redirect(array('action'=>'index'));
		}
		
		if($this->Promo->updateAll(array('Promo.publicar' => '0'), array('Promo.id_promo' => $id))) {
			$this->Session->setFlash(__('La Galeria se modificó correctamente', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('La galeria no pudo modificarse porfavor intenta nuevamente', true));
			$this->redirect(array('action' => 'index'));
		}
	}
	
	function activa($id = null) {
		 if (!$id) {
			$this->Session->setFlash(__('Invalid id for promocion', true));
			$this->redirect(array('action'=>'index'));
		}
		
		if($this->Promo->updateAll(array('Promo.publicar' => '1'), array('Promo.id_promo' => $id))) {
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