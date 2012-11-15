<?php
/* User Fixture generated on: 2010-09-20 14:09:08 : 1284994688 */
class UserFixture extends CakeTestFixture {
	var $name = 'User';

	var $fields = array(
		'id_usuario' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nombre_usuario' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'email_usuario' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'clave_usuario' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'perfil_usuario' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'fecharreg_usuario' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id_usuario', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id_usuario' => 1,
			'nombre_usuario' => 'Lorem ipsum dolor sit amet',
			'email_usuario' => 'Lorem ipsum dolor sit amet',
			'clave_usuario' => 'Lorem ipsum dolor sit amet',
			'perfil_usuario' => 'Lorem ipsum dolor sit amet',
			'fecharreg_usuario' => '2010-09-20'
		),
	);
}
?>