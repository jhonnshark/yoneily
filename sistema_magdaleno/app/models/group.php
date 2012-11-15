<?php
class Group extends AppModel {
	var $name = 'Group';
	var $primaryKey = 'idgrupos';

        var $actsAs = array('Acl' => array('requester'));

        function parentNode()
        {
           return null;
        }
        
}
?>