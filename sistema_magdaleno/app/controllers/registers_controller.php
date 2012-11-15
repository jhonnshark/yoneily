<?php
App::import('Vendor' ,'convertidor', array('file' => 'SimpleImage.php'));
class RegistersController extends AppController {

	var $name = 'Registers';
        var $helpers = array('Html', 'Form', 'Javascript');
        var $uses = array('Estado','Ciudade','Paise','Register','Phone','Archivo','Venta');
        //var $component = array('Email','PasswordHelper');



        function beforeFilter() {
        //$this->Auth->authError = "Lo sentimos no tienes permiso para acceder a este sitio.";
        $this->Auth->allow('loginequi','add','acceso','recordar','finregistro','verpais','loginfacebook','miperfil','actualizardatos','salir','add_cliente');
        /*$this->Auth->allow('compevenmail');
        $this->Auth->allow('accedercorreo');
        $this->Auth->allow('recibir');*/
    }
       function loginequi()
        {
            $this->layout = 'log';
        }

        function acceso(){
            $this->layout = 'ajax';
                $corre = $_POST['ema'];
                $pass = $_POST['pass'];

               
            $this->set('lo',$corre);
            $this->set('pa',$pass);
            $reglogin = $this->Register->find('all',array('conditions'=>array('Register.correo'=>$corre,'Register.password'=>$pass)));
            //pr($reglogin);
           if(!empty($reglogin)){
               $usersesion =   $this->Session->write('nombreusuario', $reglogin[0]['Register']['nombreape']);
               $id = $this->Session->write('keyus',$reglogin[0]['Register']['idregistro']);
               $this->set('mensaje',$this->Session->read('nombreusuario'));
               $this->set('id',$this->Session->read('keyus'));
               $this->set('flag',1);
           }else{
               $this->set('flag',0);
               //$this->set('mensaje','El usuario no esxiste en la base de datos');
           }

        }

        function fbadd(){
            $this->layout = "ajax";

            
            
        }

    function miperfil($id=null){
        $this->layout = 'nuevo';
		if(empty($this->data)) {
            $this->data = $this->Register->read(null, $id);
        }else {
            if($this->Register->save($this->data)) {
				$this->Session->setFlash(__('La edición fue hecha con exito', null), 'default', array('class' => 'flash_good'));
                $this->redirect(array('controller'=>'registers','action' => 'miperfil',$id));
            }
        }
		$codtele = $this->Phone->find('all');
            for($i=0;$i<count($codtele);$i++){
                $codigos[$codtele[$i]['Phone']['cod']] = $codtele[$i]['Phone']['cod'];
            }
            $this->set('cod',$codigos);
    }

        

	/*function index() {
		$this->layout = 'admin';
		//$this->Register->recursive = 0;
		$this->set('registers', $this->paginate('Register'));
	}*/
	function index() {
	$this->layout ='admin';
		$this->helpers;
		$user=$this->Session->read('Auth.User.locale_id_local');
		if(!empty($user)){
			$this->paginate = array('conditions'=>array('Register.status'=>0),'limit' => 10,'order'=> 'fechanac DESC');
			$this->set('registers', $this->paginate('Register'));
		}else{
			$this->paginate = array('limit' => 10,'order'=> 'fechanac DESC');
			$this->set('registers', $this->paginate('Register'));
		}
    }
	function index_compras() {
	$this->layout ='admin';
		$this->helpers;
		$user=$this->Session->read('Auth.User.locale_id_local');
		if(!empty($user)){
			$this->paginate = array('conditions'=>array('Venta.locale_id_local'=>$user),'limit' => 10,'order'=> 'fecha DESC');
			$this->set('registers', $this->paginate('Venta'));
		}else{
			$this->paginate = array('limit' => 10,'order'=> 'fecha DESC');
			$this->set('registers', $this->paginate('Venta'));
		}
    }
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id invalido', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('register', $this->Register->read(null, $id));
	}

	function add($pais=null) {
		$this->layout = 'log';
        //pr($this->data);
		if (!empty($this->data)) {
			$correo=$this->data['Register']['correo'];
			$consulta = $this->Register->find('all',array('conditions'=>array('Register.correo'=>$correo)));
			//pr($consulta);
			if(empty($consulta)){
				$this->data['Register']['puntuacion_positiva'] = 0;
					$this->data['Register']['puntuacion_negativa'] = 0;
							$codigo = $this->data['Register']['codi'];
							$celu = $codigo.$this->data['Register']['telefono'];                        
							$this->data['Register']['telefono'] = $celu;
							$mayus = ucwords($this->data['Register']['nombreape']);
							$this->data['Register']['nombreape'] = $mayus;
						   $this->Register->set($this->data);
							if ($this->Register->validates()) {
							   if ($this->Register->save($this->data)) {
									/*$nom_pic = $this->Register->read();
									//Thumbnails
									var_dump("direccion ".dirname(__FILE__));
									$file = $nom_pic['Register']['foto'];
									// The directory where our images will be stored
									$file_directory = dirname(__FILE__)."/../webroot/files/usuarios/otras/";
									$conversion = dirname(__FILE__)."/../webroot/files/usuarios/thumbnails/";
									// The path to the original image file on our web server
									$original_file_path = $file_directory.$file;
									$conversion=$conversion.$file;
									//Imagen del uploadbloqueado
									$image = new SimpleImage();
									$image->load($original_file_path);
									if($image->getWidth() > 96){
										$image->resizeToWidth(96);
									}
									if($image->getHeight() > 76){
										$image->resizeToHeight(76);
									}
									$image->save($conversion);
								*/
								//$this->_sendEmail($this->data);
										$this->Session->setFlash(__('Los datos han sido guardados con exito', null), 'default', array('class' => 'flash_good'));
										
										$this->redirect(array('controller'=>'registers','action' => 'finregistro'));
								} else {
										//$this->Session->setFlash(__('No se pudo guardar su registro porfavor intente nuevamente.', true));
								}

							} else {
								$errors = $this->Register->invalidFields();
								//pr($errors);
								$this->Session->setFlash($errors['correo']);
								//$this->redirect(array('controller'=>'registers','action' => 'finregistro'));
								//$this->redirect(array('controller'=>'registers','action' => 'add'));
						   }
			} else {
				$this->Session->setFlash(__('Ya existe un usuario con esa cuenta de correo', null), 'default', array('class' => 'flash_bad'));
            }
		}
                $codtele = $this->Phone->find('all');
                for($i=0;$i<count($codtele);$i++)
                {
                       $codigos[$codtele[$i]['Phone']['cod']] = $codtele[$i]['Phone']['cod'];
                }
                
                $this->set('cod',$codigos);
	}
	function add_cliente($pais=null) {
		$this->layout = 'admin';
        //pr($this->data);
		if (!empty($this->data)) {
				$this->data['Register']['puntuacion_positiva'] = 0;
				$this->data['Register']['puntuacion_negativa'] = 0;
                        $codigo = $this->data['Register']['codi'];
                        $celu = $codigo.$this->data['Register']['telefono'];                        
                        $this->data['Register']['telefono'] = $celu;
                        $mayus = ucwords($this->data['Register']['nombreape']);
                        $this->data['Register']['nombreape'] = $mayus;
                       $this->Register->set($this->data);
                        if ($this->Register->validates()) {
                           if ($this->Register->save($this->data)) {
                            //$this->_sendEmail($this->data);
									$this->Session->setFlash(__('Los datos han sido guardados con exito', null), 'default', array('class' => 'flash_good'));
									
                                    $this->redirect(array('controller'=>'registers','action' => 'finregistro'));
                            } else {
								$this->Session->setFlash(__('No se pudo guardar su registro, por favor intente nuevamente', null), 'default', array('class' => 'flash_bad'));
                            }

                        } else {
                            $errors = $this->Register->invalidFields();
                            //pr($errors);
                            $this->Session->setFlash($errors['correo']);
                            //$this->redirect(array('controller'=>'registers','action' => 'finregistro'));
                            //$this->redirect(array('controller'=>'registers','action' => 'add'));
                       }
		}
                $codtele = $this->Phone->find('all');
                for($i=0;$i<count($codtele);$i++)
                {
                       $codigos[$codtele[$i]['Phone']['cod']] = $codtele[$i]['Phone']['cod'];
                }
                
                $this->set('cod',$codigos);
	}
	

        function loginfacebook($id){
            $this->layout = 'ajax';
            //$idface = $_POST['idfb'];
            $datosface = $this->Register->find('all',array('fields'=>array('idregistro','nombreape','fbookid'),'conditions'=>array('fbookid'=>$id)));
            pr($datosface);
            $this->set('keyfacebook',$datosface);
           if(!empty($datosface)){
               $usersesion =   $this->Session->write('nombreusuario', $datosface[0]['Register']['nombreape']);
               $id = $this->Session->write('keyus',$datosface[0]['Register']['idregistro']);
               $this->set('mensaje',$this->Session->read('nombreusuario'));
               $this->set('flag',1);
           }else{
               $this->set('flag',0);
               //$this->set('mensaje','El usuario no esxiste en la base de datos');
           }


        }

        function verpais(){
            $this->layout = 'ajax';
            $frase = $_REQUEST['term'];
            $paises = $this->Paise->find('all',array('fields'=>array('Paise.nombre'),'conditions'=>array('Paise.nombre LIKE'=>'%'.$frase.'%')));
               $nompais = array();
               
           // pr($paises);
            for($i=0;$i<count($paises);$i++)
                    {
                        $nompais[$i]['id'] = $paises[$i]['Paise']['nombre'];
                        $nompais[$i]['value'] = $paises[$i]['Paise']['nombre'];

                    }

              //pr($nompais);

                /*for($j=1;$j<count($paises);$j++)
                {
                       $nompais[$paises[$j]['Paise']['nombre']] = $paises[$j]['Paise']['nombre'];
                }*/
                $this->set('pais',$nompais);
        }

	function edit($id=null) {
            $this->layout = 'admin';
        if(empty($this->data)) {
            $this->data = $this->Register->read(null, $id);
        }else {
            if($this->Register->save($this->data)) {
				$this->Session->setFlash(__('La edición fue hecha con exito', null), 'default', array('class' => 'flash_good'));
                $this->redirect(array('action' => 'index'));
            }
        }
		$codtele = $this->Phone->find('all');
                for($i=0;$i<count($codtele);$i++)
                {
                       $codigos[$codtele[$i]['Phone']['cod']] = $codtele[$i]['Phone']['cod'];
                }
                
                $this->set('cod',$codigos);
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id invalido', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Register->delete($id)) {
			$this->Session->setFlash(__('Registro eliminado con exito', null), 'default', array('class' => 'flash_good'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('No se pudo eliminar intente nuevamente', null), 'default', array('class' => 'flash_bad'));
		$this->redirect(array('action' => 'index'));
	}

        function recordar() {
        $this->layout = 'log';
        $this->set("enviado", false);
        if (!empty($this->data)) {
            $this->set("enviado", true);
            //$result = $this->Register->find('all', array('fields' => array('Register.correo', 'Register.nombreape', 'Register.idregistro'), 'recursive' => 0, 'conditions' => array('Register.correo' => $this->data["Register"]["confcorreo"], 'comfirm' => 1)));
            $result = $this->Register->find('all', array('fields' => array('Register.correo', 'Register.nombreape', 'Register.idregistro'), 'recursive' => 0, 'conditions' => array('Register.correo' => $this->data["Register"]["confcorreo"])));
            if (!empty($result)) {
                //pr($result);
                $newPass = $this->PasswordHelper->generatePassword();
                $this->_sendUserNewPassword($result, $newPass);
                $this->Register->read(null, $result[0]["Register"]["idregistro"]);
                $this->Register->set(array(
                    'password' => $newPass,
                    'rpass'=>$newPass
                ));
                $this->Register->save();
				$this->Session->setFlash(__('Se ha enviado un correo eletr&oacute;nico con su contraseña', null), 'default', array('class' => 'flash_good'));
            }else{
				$this->Session->setFlash(__('Ha ocurrido un error estamos trabajando en solucionarlo, por favor intenta mas tarde', null), 'default', array('class' => 'flash_bad'));
            }
        }
    }

    function finregistro()
    {
        $this->layout = 'log';
		$this->Session->setFlash('Gracias por registrarte');
    }

    function _sendUserNewPassword($User, $newPass) {
        $this->Email->to = $User[0]['Register']['correo'];
        $this->Email->subject = 'Solicitud de cambio de password.';
        $this->Email->from = 'equilibrio <euilibrio@equilibrio.net>';
        $this->Email->template = 'password'; // note no '.ctp'
        //Send as 'html', 'text' or 'both' (default is 'text')
        $this->Email->sendAs = 'both'; // because we like to send pretty mail
        //Set view variables as normal
        $User['Register']['newpass'] = $newPass;
        $this->set('User', $User);
        //Do not pass any args to send()
        $this->Email->send();
    }

    function _sendEmail($data){
        //pr($data);
        $this->Email->to = $data['Register']['correo'];
        $this->Email->subject = 'Bienvenido a Equilibrio';
        $this->Email->from = 'equilibrio <euilibrio@equilibrio.net>';
        $this->Email->template = 'sendemail'; // note no '.ctp'
        //Send as 'html', 'text' or 'both' (default is 'text')
        $this->Email->sendAs = 'both'; // because we like to send pretty mail
        //Set view variables as normal
        $this->set('datos', $data);
        //Do not pass any args to send()
        $this->Email->send();

    }
	function salir(){
        if ($this -> Session -> valid())
        {
            $this -> Session -> destroy();
             $this->redirect(array('controller'=>'pages','action' => 'home'));
        }
    }
	function desactiva($id = null) {
		 if (!$id) {
			$this->Session->setFlash(__('Id invalido', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action'=>'index'));
		}
		
		if($this->Register->updateAll(array('Register.status' => '0'), array('Register.idregistro' => $id))) {
			$this->Session->setFlash(__('El cliente se desactivo correctamente', null), 'default', array('class' => 'flash_good'));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El cliente no pudo desactivarse, por favor intenta nuevamente', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index'));
		}
	}
	
	function activa($id = null) {
		 if (!$id) {
			$this->Session->setFlash(__('Invalid id for promocion', true));
			$this->Session->setFlash(__('Id invalido', null), 'default', array('class' => 'flash_bad'));
		}
		
		if($this->Register->updateAll(array('Register.status' => '1'), array('Register.idregistro' => $id))) {
			$this->Session->setFlash(__('El cliente se activo correctamente', null), 'default', array('class' => 'flash_good'));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El cliente no pudo activarse correctamente, por favor intenta nuevamente', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index'));
		}
	}
	function pdf($id) {Configure::write('debug',0);
      $this->layout = 'pdf'; //this will use the pdf.ctp layout
	  //echo "es ".$id;
		/*$this->paginate = (array(
			  'conditions' => array('Register.idregistro'=>$id),
			  //'recursive'=>1
			  ));
			  $this->set('clientes', $this->paginate());*/
		/*$clientes = $this->Register->find('all',array('conditions' => array('Register.idregistro'=>$id)));
		$this->set(compact('clientes'));*/
		$clientes = $this->Venta->find('all',array('conditions' => array('Venta.id_venta'=>$id)));
		$this->set(compact('clientes'));
        $this->render();
    }
	function pdf_cliente($id) {Configure::write('debug',0);
      $this->layout = 'pdf'; //this will use the pdf.ctp layout
		$clientes = $this->Register->find('all',array('conditions' => array('Register.idregistro'=>$id)));
		$this->set(compact('clientes'));
        $this->render();
    }
	function pdf_completo() {Configure::write('debug',0);
      $this->layout = 'pdf'; //this will use the pdf.ctp layout
		/*$clientes = $this->Register->find('all');
		$this->set(compact('clientes'));*/
		$clientes = $this->Venta->find('all');
		$this->set(compact('clientes'));
        $this->render();
    }
	function pdf_completo_cliente() {Configure::write('debug',0);
      $this->layout = 'pdf'; //this will use the pdf.ctp layout
		$clientes = $this->Register->find('all');
		$this->set(compact('clientes'));
        $this->render();
    }
	function Finalizar_compra($id = null) {
		 if (!$id) {
			$this->Session->setFlash(__('Id de Compra Invalido', true));
			$this->Session->setFlash(__('Id invalido', null), 'default', array('class' => 'flash_bad'));
		}
		$suma=0;
		if($this->Venta->updateAll(array('Venta.status' => '1'), array('Venta.id_venta' => $id))) {
			$venta = $this->Venta->find('all',array('conditions'=>array('Venta.id_venta ='=>$id)));
			$id_cliente=$venta[0]['Venta']['register_idregistro'];
			$cliente = $this->Register->find('all',array('conditions'=>array('Register.idregistro ='=>$id_cliente)));
			$puntuacion_positiva=$cliente[0]['Register']['puntuacion_positiva'];
			$suma=$puntuacion_positiva + 1;
			$this->Register->updateAll(array('Register.puntuacion_positiva' => "'$suma'"), array('Register.idregistro' => $id_cliente));
			$this->Session->setFlash(__('La compra se Finalizo correctamente', null), 'default', array('class' => 'flash_good'));
			$this->redirect(array('action' => 'index_compras'));
		} else {
			$this->Session->setFlash(__('No se pudo finalizar la compra correctamente, por favor intenta nuevamente', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index_compras'));
		}
	}
	function compra_falla($id = null) {
		 if (!$id) {
			$this->Session->setFlash(__('Id de Compra Invalido', true));
			$this->Session->setFlash(__('Id invalido', null), 'default', array('class' => 'flash_bad'));
		}
		$suma=0;
		if($this->Venta->updateAll(array('Venta.status' => '2'), array('Venta.id_venta' => $id))) {
			$venta = $this->Venta->find('all',array('conditions'=>array('Venta.id_venta ='=>$id)));
			$id_cliente=$venta[0]['Venta']['register_idregistro'];
			$cliente = $this->Register->find('all',array('conditions'=>array('Register.idregistro ='=>$id_cliente)));
			$puntuacion_negativa=$cliente[0]['Register']['puntuacion_negativa'];
			$suma=$puntuacion_negativa + 1;
			$this->Register->updateAll(array('Register.puntuacion_negativa' => "'$suma'"), array('Register.idregistro' => $id_cliente));
			$this->Session->setFlash(__('La compra se Finalizo correctamente', null), 'default', array('class' => 'flash_good'));
			$this->redirect(array('action' => 'index_compras'));
		} else {
			$this->Session->setFlash(__('No se pudo finalizar la compra correctamente, por favor intenta nuevamente', null), 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index_compras'));
		}
	}
}
?>