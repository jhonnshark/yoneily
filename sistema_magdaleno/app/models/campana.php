<?php
class Campana extends AppModel {
	var $name = 'Campana';
	var $primaryKey = 'id_campana';

       /* var $validate = array(
           'correo' => array(
             'rule' => 'isUnique',
             'on' => 'create',
             'message' => 'Este correo ya se encuentra registrado'
         )
   );*/



     /*var $validate = array(
           'usuario' => array(
               'rule' => 'alphaNumeric',
               'message' => 'Usuario solo debe tener letras y numeros.'
           ),
         'password' => array(
               'rule' => array('between', 4, 6),
               'message' => 'Paswords debe estar entre 4 y 6 caracteres.'
           ),
         'rpass' => array(
               'rule' => array('equalTo', 'password'),
               'message' => 'Debes colocar el mismo password.'
           )

    );*/

}
?>