<?php
class User extends AppModel {
	var $name = 'User';
	var $primaryKey = 'id_usuario';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $validate = array(
			'groups_idgrupos'=>array(
                'rule' => array('notEmpty'),
                'message' => '* Requerido'
            ),
			'username' => array(
                'userrule1' => array(
                    'rule' => array('minLength', 4),
                    'message' => 'Este campo debe tener minimo 4 caracteres'
                ),
                'userrule3' => array(
                    'rule' => array('notEmpty'),
                    'message' => '* Requerido'
                )
            ),
			'perfil_usuario'=>array(
                'rule' => array('notEmpty'),
                'message' => '* Requerido'
            ),
			'email_usuario'=>array(
				/*'userrule1' => array(
                    //'rule' => array('email',true),
                    'message' => 'Debes igresar un correo valido'
                ),*/
                'userrule3' => array(
                    'rule' => array('notEmpty'),
                    'message' => '* Requerido'
                )
            ),
			/*'password' => array(
               'rule' => array('between', 4, 10),
               'message' => 'Paswords debe estar entre 4 y 6 caracteres.'
			),
			'confpassword' => array(
				   'rule' => array('equalTo', 'password'),
				   'message' => 'Debes colocar el mismo password.'
			),
			'password'=>array(
                'userrule1' => array(
                    'rule' => array('minLength', 4),
                    'message' => 'Este campo debe tener minimo 4 caracteres'
                ),
                'userrule3' => array(
                    'rule' => array('notEmpty'),
                    'message' => '* Requerido'
                )
            ),
			'confpassword'=>array(
                    'userrule1' => array(
                    'rule' => array('minLength', 4),
                    'message' => 'Este campo debe tener minimo 4 caracteres'
                 )
             ),*/
            'newpass'=>array(
                    
                    'rule' => array('minLength', 4),
                    'message' => 'Este campo debe tener minimo 4 caracteres'
                 
             ),
            'newpassconfirm'=>array(
                   
                    'rule' => array('minLength', 4),
                    'message' => 'Este campo debe tener minimo 4 caracteres'
                
             )
	);
	var $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'groups_idgrupos',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)/*,
		'Locale' => array(
			'className' => 'Locale',
			'foreignKey' => 'locale_id_local',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)*/
	);

        var $actsAs = array('Acl' => array('requester'));

         function parentNode() {
             if (!$this->id && empty($this->data)) {
                   return null;
             }
                $data = $this->data;
             if (empty($this->data)) {
                $data = $this->read();
             }
             if (!$data['User']['groups_idgrupos']) {
                return null;
             } else {
                return array('Group' => array('idgrupos' => $data['User']['groups_idgrupos']));
             }
         }
}
?>