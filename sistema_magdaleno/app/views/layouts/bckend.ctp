<?php
/**
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
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php __('Agropecuaria :'); ?>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');

        echo $scripts_for_layout;

        ?>
    
        <script src="<?php echo $html->url('/',true)?>js/jquery-1.4.2.min.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/tiny_mce/tiny_mce.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/menuBox.js" type="text/javascript"></script>
        <script src="<?php echo $html->url('/',true)?>js/jquery.validate.js" type="text/javascript"></script>
		<script src="<?php echo $html->url('/',true)?>js/prueba.js" type="text/javascript"></script>
		
        <?php
        //echo $this->Html->meta('icon');
        echo $html->css('screen', 'stylesheet', array("media" => "screen, projection")) . "\n";
        echo $html->css('print', 'stylesheet', array("media" => "print")) . "\n";
        ?>

        <?php echo $html->css(array('main','jquery-ui-1.8.9.custom','menu'));?>
        <!--[if IE]>
        <?php
        echo $html->css('ie', 'stylesheet', array("media" => "screen, projection")) . "\n";
        ?>
       <![endif]-->

        <script>$(function()
            {
                $('.mB').menuBox();
            });
        </script>

    </head>
    <body class="bodybckend">
        <div class="fondobckend">
            <div id="container">
                <div id="header" class="span-24 last" style="height:105px">
                   <a href="<?php echo $html->url(array('controller'=>'users','action'=>'index'),true)?>"><img src="<?php echo $html->url('/', true); ?>header.jpg" width="950px" height="105px" alt="Header" style="margin: 0px"/></a>
                </div>
                <div id="menu" class="span-24 last" style="padding:12px 20px 0 0;background:url(<?php echo $html->url('/',true)?>menu/menufondogris.gif) repeat-x;">
                    <?php echo $this->element('admin_menu');?>
                </div>

                <div id="content" class="span-24 last">

                     <div style=" font-size: 14px;color: #FF0000; margin-top:15px; font-weight: normal;padding-left:145px;"><?php echo $this->Session->flash(); ?></div>

                    <?php echo $session->flash('auth');?>

                    <?php echo $content_for_layout; ?>
                          

                </div>
                <div id="footer" class="span-24 last">
                    <?php echo $this->element('footer');?>
                </div>
            </div>
        </div>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>