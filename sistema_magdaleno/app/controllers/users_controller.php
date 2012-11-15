<?php
class UsersController extends AppController {

    var $name = 'Users';
    //var $scaffold;
    //var $components = array('Auth');
    var $helpers = array('Html', 'Form', 'Javascript');
    //var $components = array('RequestHandler');
    var $uses = array('User','Group','Aco','Aro','ArosAco','Locale');
	/*function beforeFilter(){
        $this->Auth->allow('add_vendedor','consulta_codigo','registrado');
    }
*/
    function index1() {
		$this->layout ='admin';
		$this->helpers;
        //print_r($this->helpers);
        $this->set('users',$this->User->find('all'));
    }


    function add() {
	$this->layout ='admin';
        //$this->loadModel('Group');
        $this->set('groups',$this->Group->find('list', array('fields' => 'Group.name_grupos')));
        if (!empty($this->data)) {
			
            if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('El usuario ha sido registrado', null), 'default', array('class' => 'flash_good'));
					$this->redirect(array('action' => 'index1'));
            }
        }
    }
	function add_vendedor() {
	$this->layout ='log';
        //$this->loadModel('Group');
		//pr($this->data);
        $this->set('groups',$this->Group->find('list', array('fields' => 'Group.name_grupos')));
        if (!empty($this->data)) {
			$local=$this->data['User']['locale_id_local'];
			$codigo=$this->data['User']['codigo_uno'];
				if(!empty($local)){
					$this->Locale->updateAll(array('Locale.codigo' => "'$codigo'"), array('Locale.id_local' => $local));
				//Security::hash($password, null, true);
				$this->data['User']['password']=Security::hash($this->data['User']['pass'], null, true);
				if ($this->User->save($this->data)) {
					//$this->Session->setFlash(__('El vendedor ha sido registrado', null), 'default', array('class' => 'flash_good'));
					$this->redirect(array('action' => 'registrado'));
				}
			}
        }
    }
	function registrado(){
		$this->layout ='log';
	}

    function delete($id) {
	$this->layout ='admin';
        $this->User->delete($id);
		$this->Session->setFlash(__('El usuario ha sido eliminado', null), 'default', array('class' => 'flash_good'));
        $this->redirect(array('action'=>'index1'));
    }

    function edit($id) {
	$this->layout ='admin';
        //$this->loadModel('Group');
         $this->User->id_usuario = $id;
        $this->set('groups',$this->Group->find('list', array('fields' => 'Group.name_grupos')));
       if(empty($this->data)) {
            //$this->set('username',$this->User->find('list',array()));
            //$this->set('')
            $this->data = $this->User->read(null, $id);
        }else {
            if($this->User->save($this->data)) {
                $this->Session->setFlash('La edición fue hecha con exito.');
                $this->redirect(array('action' => 'index1'));
            }
        }


        $oldgroupid = $this->User->field('groups_idgrupos');
        if ($oldgroupid !== $this->data['User']['groups_idgrupos']) {
            $aro =& $this->Acl->Aro;
            $user = $aro->findByForeignKeyAndModel($this->data['User']['id_usuario'], 'User');
            $group = $aro->findByForeignKeyAndModel($this->data['User']['groups_idgrupos'], 'Group');

            // Guardar en la tabla ARO
            $aro->id = $user['Aro']['id'];
            $aro->save(array('parent_id' => $group['Aro']['id']));
        }
    }

    function edit_pass($id = null){
	$this->layout ='admin';
       $this->User->id_usuario = $id;
        $usuario = $this->User->read(null, $id);
        ///
        $this->set("user", $usuario);
         if (!empty($this->data)) {
                 $result = $this->User->find('all', array('fields' => array('User.password'), 'conditions' => array('User.id_usuario' => $this->data["User"]["id_usuario"], 'User.password' => $this->Auth->password($this->data["User"]["oldpass"]))));
                 //pr($result);
                 $id = $this->data["User"]["id_usuario"];
                         
             if (!empty($result)) {
                if ($this->data["User"]["newpass"] == $this->data["User"]["newpassconfirm"]) {
                    $this->User->read(null, $id);
                    $this->User->set(array(
                        'password' => $this->Auth->password($this->data["User"]["newpass"])
                    ));
                    $this->User->save();
                    $this->Session->setFlash('Su password ha sido actualizado.');
                    $this->redirect(array('action' => 'index1'));
                } else {
                   $this->Session->setFlash('Los password no son iguales.');
                }
            } else {
                $this->Session->setFlash('El password actual no es igual al que colocó.');
                //$this->redirect(array('action' => 'index1'));
            }
        }
      
    }

    function permission($id = null) {
	$this->layout ='admin';
        if($id != null) {
            $this->User->id_usuario = $id;
            $this->loadModel('Aco');
            $parents = $this->Aco->find('list', array('fields' => 'Aco.alias','conditions'=>array('Aco.parent_id'=>'1','Aco.id >='=>'10')));
            $child = array();
            $permiso = array();
//$arouser = $this->Aro->find('first',array('fields'=>'Aro.id','recursive'=>0,'conditions'=>array('Aro.model'=>'User','Aro.foreign_key'=>$id)));

            
            foreach($parents as $idparent => $alias) {
                $child[$idparent] = $this->Aco->find('list', array('fields' => 'Aco.alias','conditions'=>array('Aco.parent_id'=>$idparent)));
                foreach($child[$idparent] as $idhijo => $aliashijo) {
                    $permiso[$idhijo] = $this->Acl->check(array('model' => 'User', 'foreign_key' => $id), $aliashijo) ;//$this->Aco->query("SELECT * FROM acos as ac left join `aros_acos` as arc on arc.aco_id = ac.id and aro_id=".$arouser['Aro']['id']." where ac.parent_id = ".$idparent);
                }
            }
            $this->set('iduser',$id);
            $this->set('padre',$parents);
            $this->set('hijo',$child);
            $this->set('permiso',$permiso);
           
            //
               
        }else{

           $this->redirect("/");
        }


    }

    function ajax_load() {
        //$statuspermiso = $_POST['edo'];
         $this->layout = 'Ajax';
         $this->set('iduser',$_POST['key']);
         $this->set('hijoalias',$_POST['key2']);
         

          if($_POST['key3'] == 0)
            {
              $permitido = 1;
              $this->Acl->allow(array('model' => 'User', 'foreign_key' => $_POST['key']), $_POST['key2']);
                $this->set('permitido',$permitido);
               
            }else{
                $permitido = 0;
                $this->Acl->deny(array('model' => 'User', 'foreign_key' => $_POST['key']), $_POST['key2']);
                $this->set('permitido',$permitido);
                
            }
   
    }

    function login() {
	$this->layout ='login';
	
    }
	function home(){
		$this->layout ='admin';
        
    }
	function ayuda() {
		$this->layout ='admin';
    }
    function logout() {
		$this->layout ='admin';
		$this->Session->setFlash(__('Haz cerrado la sesion', null), 'default', array('class' => 'flash_good'));
         $this->redirect($this->Auth->logout());
        //$this->redirect($this->Auth->redirect());
    }

    /*function initdb() {
            $group =& $this->User->Group;
    //Allow admins to everything
            $group->id = 1;
            $this->Acl->allow($group, 'controllers');
   
    //allow managers to posts and widgets
            $group->id = 2;
            $this->Acl->deny($group, 'controllers');
            $this->Acl->allow($group, 'controllers/');
            //$this->Acl->allow($group, 'controllers/Widgets');
  
   //allow users to only add and edit on posts and widgets
           $group->id = 3;
           $this->Acl->deny($group, 'controllers');
           $this->Acl->allow($group, 'controllers/users/add');
           $this->Acl->allow($group, 'controllers/users/edit');
   //we add an exit to avoid an ugly "missing views" error message
           echo "all done";
           exit;
        }*/

    /*function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allowedActions = array('index1', 'view');
    }*/

	function pdf($id) {Configure::write('debug',0);
      $this->layout = 'pdf'; //this will use the pdf.ctp layout
		$usuarios = $this->User->find('all',array('conditions' => array('User.id_usuario'=>$id)));
		$this->set(compact('usuarios'));
        $this->render();
    }
	function pdf_completo() {Configure::write('debug',0);
      $this->layout = 'pdf'; //this will use the pdf.ctp layout
		$usuarios = $this->User->find('all');
		$this->set(compact('usuarios'));
        $this->render();
    }
	function consulta_codigo($cod) {
        $this->layout ='ajax';  
		if (!empty($cod)) {
			$locales = $this->Locale->find('all',array('conditions'=>array('codigo'=>$cod)));
				if(!empty($locales)){
					$cod=$locales[0]['Locale']['id_local'];
					echo $cod;
				}else{
					echo 0;
				} 
		}
	}
}
?>