<ul class="onglets-hor mB">

    <li><a class="home" href="<?php echo $html->url(array('controller'=>'users','action'=>'index'),true)?>">Usuarios</a>
        <ul>
            <li><a class="" href="<?php echo $html->url(array('controller'=>'users','action'=>'add'),true)?>">Añadir</a></li>
            <li><a class="" href="<?php echo $html->url(array('controller'=>'groups','action'=>'index'),true)?>">Ver Grupos</a></li>
        </ul>
    </li>
    <li><a class="home" href="<?php echo $html->url(array('controller'=>'users','action'=>'logout'),true)?>">Logout</a></li>
	
</ul>