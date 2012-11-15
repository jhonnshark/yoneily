<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
		Router::connect ('/', array('controller'=>'pages', 'action'=>'home'));
		Router::connect ('/quienes/*', array('controller'=>'pages', 'action'=>'quienes'));
		Router::connect ('/contactanos/*', array('controller'=>'pages', 'action'=>'contactanos'));
		Router::connect ('/mision/*', array('controller'=>'pages', 'action'=>'mision'));
		Router::connect ('/productos/*', array('controller'=>'pages', 'action'=>'productos'));
		Router::connect ('/promociones/*', array('controller'=>'pages', 'action'=>'promociones'));
		Router::connect ('/add/*', array('controller'=>'registers', 'action'=>'add'));
		Router::connect ('/misreclamos/*', array('controller'=>'ventas', 'action'=>'misreclamos'));
		
        Router::connect ('/', array('controller'=>'users', 'action'=>'index'));
