<?php
class GroupsController extends AppController {

	var $name = 'Groups';
        //var $scaffold;
         var $helpers = array('Html', 'Form', 'Javascript');
        var $components = array('RequestHandler');
	function index()
        {
          $this->set('groups',$this->Group->find('all'));
        }

	/*function add() {
		if (!empty($this->data)) {
			$this->Group->create();
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash(__('The group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.', true));
			}
		}
		$permissions = $this->Group->Permission->find('list');
		$users = $this->Group->User->find('list');
		$this->set(compact('permissions', 'users'));
	}*/

        function add() {
            //$this->set('groups',$this->Group->find('list', array('fields' => 'Group.name_grupos')));
            if (!empty($this->data)){
                if ($this->Group->save($this->data)) {
                    $this->Session->setFlash('El grupo ha sido creado');
                    $this->redirect(array('action' => 'index'));
                }
             }

             //$permissions = $this->Group->Permission->find('list');
             //$users = $this->Group->User->find('list');
             //$this->set(compact('permissions', 'users'));
        }

	function edit($id = null) {
		if(!$id && empty($this->data)){
			$this->Session->setFlash(__('Grupo invalido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash(__('Has Modificado el grupo', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La modificacion no fue exitosa. Por favor, Intenta de nuevo .', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Group->read(null, $id);
		}
		//$permissions = $this->Group->Permission->find('list');
		//$users = $this->Group->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Group->delete($id)) {
			$this->Session->setFlash(__('Group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

        function permission($id = null) {

        if($id != null) {
            $this->Group->idgrupos = $id;
            $this->loadModel('Aco');
            $parents = $this->Aco->find('list', array('fields' => 'Aco.alias','conditions'=>array('Aco.parent_id'=>'1','Aco.id >='=>'10')));
            $child = array();
            $permiso = array();
//$arouser = $this->Aro->find('first',array('fields'=>'Aro.id','recursive'=>0,'conditions'=>array('Aro.model'=>'User','Aro.foreign_key'=>$id)));


            foreach($parents as $idparent => $alias) {
                $child[$idparent] = $this->Aco->find('list', array('fields' => 'Aco.alias','conditions'=>array('Aco.parent_id'=>$idparent)));
                foreach($child[$idparent] as $idhijo => $aliashijo) {
                    $permiso[$idhijo] = $this->Acl->check(array('model' => 'Group', 'foreign_key' => $id), $aliashijo) ;//$this->Aco->query("SELECT * FROM acos as ac left join `aros_acos` as arc on arc.aco_id = ac.id and aro_id=".$arouser['Aro']['id']." where ac.parent_id = ".$idparent);
                }
            }
            $this->set('idgrupo',$id);
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
              $this->Acl->allow(array('model' => 'Group', 'foreign_key' => $_POST['key']), $_POST['key2']);
                $this->set('permitido',$permitido);

            }else{
                $permitido = 0;
                $this->Acl->deny(array('model' => 'Group', 'foreign_key' => $_POST['key']), $_POST['key2']);
                $this->set('permitido',$permitido);

            }

    }
}
?>