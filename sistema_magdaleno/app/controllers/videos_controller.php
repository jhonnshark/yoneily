<?php
App::import('Vendor' ,'convertidor', array('file' => 'SimpleImage.php'));
class VideosController extends AppController {

	var $name = 'Videos';
        var $helpers = array('Html', 'Form', 'Javascript');
        var $uses = array('Video','News','Archivo','Category');

        var $paginate = array(
          'limit' => 15,
		  'order' => array(
				'fechacre_videos' =>'DESC'
		  )

         );

	function index() {
		$this->layout ='admin'; 
		$this->Video->recursive = 0;
		$this->set('videos', $this->paginate());
	}

	function view($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid video', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('video', $this->Video->read(null, $id));
	}

	function add() {
		$this->layout ='admin'; 
		//pr($this->data);
		if (!empty($this->data)) {
			$dataArchivo['Archivo'] = array(
				'usuario_id_usuario' =>$this->data['Video']['usuario_id_usuario'],
				'tipodispositivo_file' => $this->data['Video']['tipodispositivo_file'],
				'path_id_path' => $this->data['Video']['path_id_path'],
				'vidthumbnail'=>$this->data['Video']['vidthumbnail'],
				'nombre_file'=>$this->data['Video']['nombre_file']
			);
            if(($this->data['Video']['nombre_file']['name'] != null)and($this->data['Video']['vidthumbnail']['name'] != null)){
				if($this->Archivo->save($dataArchivo)){
					$this->data['Video']['archivos_id_file'] = $this->Archivo->id;
					if ($this->Video->saveAll($this->data)) {
						$this->Session->setFlash(__('El video se ha adjuntado con exito', true));
						$nom_pic = $this->Video->read();
						//Thumbnails
						//var_dump("direccion ".dirname(__FILE__));
						$file = $nom_pic['Archivo']['nombre_file'];
						//pr($nom_pic);
						// The directory where our images will be stored
						$file_directory = dirname(__FILE__)."/../webroot/files/videothumbnail/";
						$conversion = dirname(__FILE__)."/../webroot/files/videos/";
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
							$this->redirect(array('action' => 'index'));
					} else {
							$this->Session->setFlash(__('El video no se pudo guardar. Por favor intenta nuevamente.', true));
					}				
				}
			}else{
								/*if($this->data['Video']['nombre_file']['name'] == null)
								{

										$this->Session->setFlash(__('El video no se pudo guardar. Debes subir un video - Por favor intenta nuevamente.', true));
										
								}
								else
								{*/
										if(($this->data['Video']['nombre_file']['name'] == null)and($this->data['Video']['vidthumbnail']['name'] == null)){
											$this->Session->setFlash(__('El video no se pudo guardar. Debes subir ambos Thumbnails - Por favor intenta nuevamente.', true));
										}else if($this->data['Video']['vidthumbnail']['name'] == null){
											$this->Session->setFlash(__('El video no se pudo guardar. Debes subir video Thumbnail - Por favor intenta nuevamente.', true));
										}else if($this->data['Video']['nombre_file']['name'] == null){
											$this->Session->setFlash(__('El video no se pudo guardar. Debes subir Thumbnail Destacado - Por favor intenta nuevamente.', true));
										}
								//}
									
			}
							
							
							
                   /* }else{

                        $dataArchivo['Archivo'] = array(
                        'usuario_id_usuario' =>$this->data['Video']['usuario_id_usuario'],
                        'tipodispositivo_file' => $this->data['Video']['tipodispositivo_file'],
                        'path_id_path' => $this->data['Video']['path_id_path'],
						'nombre_file'=>$this->data['Video']['nombre_file'],
                        'embedthumb'=>$this->data['Video']['vidthumbnail']
						
                        );
						if($this->data['Video']['nombre_file']['name'] != null)
							$dataArchivo['Archivo']['nombre_file'] = $this->data['Video']['nombre_file'];
						
						if(($this->data['Video']['nombre_file']['name'] != null)and($this->data['Video']['vidthumbnail']['name'] != null))
						{
							//pr($dataArchivo);						
							if($this->Archivo->save($dataArchivo)){
							   
								$this->data['Video']['archivos_id_file'] = $this->Archivo->id;
								if ($this->Video->saveAll($this->data)) {
										$this->Session->setFlash(__('El video se ha adjuntado con exito', true));
										//$this->redirect(array('action' => 'index'));
								} else {
										$this->Session->setFlash(__('El video no se pudo guardar. Por favor intenta nuevamente.', true));
								}
							}else{
								//echo $this->Archivo->
								$this->Session->setFlash(__('El video no se pudo guardar. Debes agregar Thumbnails - Por favor intenta nuevamente.', true));
							}
						}else{
						
						
							if(($this->data['Video']['nombre_file']['name'] == null)and($this->data['Video']['vidthumbnail']['name'] == null)){
								$this->Session->setFlash(__('El video no se pudo guardar. Debes subir ambos Thumbnails - Por favor intenta nuevamente.', true));
							}else if($this->data['Video']['vidthumbnail']['name'] == null){
								$this->Session->setFlash(__('El video no se pudo guardar. Debes subir embed thumbnail - Por favor intenta nuevamente.', true));
							}else if($this->data['Video']['nombre_file']['name'] == null){
								$this->Session->setFlash(__('El video no se pudo guardar. Debes subir Thumbnail Destacado - Por favor intenta nuevamente.', true));
							}
						
						}

						
                    }*/

                }
		$archivos = $this->Video->Archivo->find('list');
		$cat2 = $this->Category->find('list');
		
		$this->set(compact('archivos','cat2'));
	}

	function edit($id = null) {
            //  pr($this->data);
                if (!$this->Acl->check(array('model' => 'User', 'foreign_key' => $this->Session->read('Auth.User.id_usuario')), 'editar videos')) {
                    $this->redirect(array('action' => 'index'));
                }
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Video Invalido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
                    if($this->data['Video']['videoembed'] == "")
                    {
			 //$this->Archivo->create();
                        //pr($this->data);
                    $dataArchivo['Archivo'] = array(
                        'usuario_id_usuario' =>$this->data['Video']['usuario_id_usuario'],
                        'tipodispositivo_file' => $this->data['Video']['tipodispositivo_file'],
                        'path_id_path' => $this->data['Video']['path_id_path'],
                        'nombre_file'=>$this->data['Video']['nombre_file'],
                        'id_file'=>$this->data['Video']['id_file'],
                        'vidthumbnail'=>$this->data['Video']['vidthumbnail'],
						'nombre_file'=>$this->data['Video']['nombre_file']
                    );
                        
                        $this->Archivo->save($dataArchivo);
                        /*$this->Video->set(array(
                            'videoembed'=>$this->data['Video']['videoembed'],
                            'id_videos'=>$this->data['Video']['id_videos'],
                            'titulo_video'=>$this->data['Video']['titulo_video'],
                            'descripcion'=>$this->data['Video']['descripcion'],
                            'etiqueta'=>$this->data['Video']['etiqueta'],
                            'destacado' =>$this->data['Video']['destacado'],
                            'usuario_id_usuario'=>$this->data['Video']['usuario_id_usuario'],
                            'archivos_id_file'=>$this->Archivo->id,
                        ));*/

                         //$this->Video->saveAll();
                            if ($this->Video->saveAll($this->data)) {
                                    $this->Session->setFlash(__('El video se ha adjuntado con exito', true));
                                    $this->redirect(array('action' => 'index'));
                            } else {
                                    $this->Session->setFlash(__('El video no se pudo guardar. Por favor intenta nuevamente.', true));
                            }
                    }else{
                        $dataArchivo['Archivo'] = array(
                        'usuario_id_usuario' =>$this->data['Video']['usuario_id_usuario'],
                        'tipodispositivo_file' => $this->data['Video']['tipodispositivo_file'],
                        'path_id_path' => $this->data['Video']['path_id_path'],
						'id_file'=>$this->data['Video']['id_file'],
                        'embedthumb'=>$this->data['Video']['embedthumb'],
						'nombre_file'=>$this->data['Video']['nombre_file']
                        );

                        $this->Archivo->save($dataArchivo);

                           /*$this->Video->set(array(
                            'videoembed'=>$this->data['Video']['videoembed'],
                            'titulo_video'=>$this->data['Video']['titulo_video'],
                            'descripcion' =>$this->data['Video']['descripcion'],
                               'etiqueta'=>$this->data['Video']['etiqueta'],
                               'destacado' =>$this->data['Video']['destacado'],
                               'embedthumb'=>$this->data['Video']['embedthumb'],
                            'id_videos'=>$this->data['Video']['id_videos'],
                            'usuario_id_usuario'=>$this->data['Video']['usuario_id_usuario'],
                            'archivos_id_file'=>null,
                        ));*/

                         //$this->Video->saveAll();
						 $etiqueta=$this->data['Video']['etiqueta'];
						 if($etiqueta=0){$eti=='Equilibrio';}else if($etiqueta=1){$eti=='Videos';}
						 $this->data['Video']['etiqueta']=$eti;
                            if ($this->Video->saveAll($this->data)) {
                                    $this->Session->setFlash(__('El video se ha adjuntado con exito', true));
                                    $this->redirect(array('action' => 'index'));
                            } else {
                                    $this->Session->setFlash(__('El video no se pudo guardar. Por favor intenta nuevamente.', true));
                            }
                    }
                    
		}
		if (empty($this->data)) {
			$this->data = $this->Video->read(null, $id);
                        //pr($this->data);
		}

		$users = $this->Video->User->find('list');
                //$namearchivo = $this->
		//$archivos = $this->Video->Archivo->find('all',array('fields'=>'Archivo.nombre_file','conditions'=>array('Video.id_videos'=>'1')));
                $archivos = $this->Video->find('all',array('fields'=>array('Archivo.id_file,Archivo.nombre_file','Archivo.vidthumbnail','Archivo.embedthumb','Archivo.nombre_file'),'recursive'=>0,'conditions'=>array('Video.id_videos'=>$this->data['Video']['id_videos'])));
                //pr($archivos);
		$categories = $this->Video->Category->find('list');
                $news = $this->Video->News->find('list',array('fields'=>'News.titulo_contennoticias'));
		$this->set(compact('users', 'archivos', 'news','categories','cat2'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('id no valido', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Video->delete($id)) {
			$this->Session->setFlash(__('Video Borrado', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Video no pudo borrarse', true));
		$this->redirect(array('action' => 'index'));
	}
	
		function destacado($id = null) {
		 if (!$id) {
			$this->Session->setFlash(__('Invalid id for Video', true));
			$this->redirect(array('action'=>'index'));
		}
		$tipo = "1";
		if($this->Video->updateAll(array('Video.destacado' =>$tipo), array('Video.id_videos' => $id))) {
			$this->Session->setFlash(__('El Video se modificó correctamente', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El Video no pudo modificarse porfavor intenta nuevamente', true));
			$this->redirect(array('action' => 'index'));
		}
	}
	
		function nodestacado($id = null) {
		 if (!$id) {
			$this->Session->setFlash(__('Invalid id for Video', true));
			$this->redirect(array('action'=>'index'));
		}
		$tipo = "0";
		if($this->Video->updateAll(array('Video.destacado' =>$tipo), array('Video.id_videos' => $id))) {
			$this->Session->setFlash(__('El Video se modificó correctamente', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El Video no pudo modificarse porfavor intenta nuevamente', true));
			$this->redirect(array('action' => 'index'));
		}
	}
	
	
	
}
?>