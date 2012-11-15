<?php
       
    if($permitido == 0)
    {
        $img = array("permisos"=>'key='.$iduser.'&key2='.$hijoalias.'&key3='.$permitido,"imagen"=>'/backendequilibrio/img/Cross.png',"mensaje"=>"Este Grupo no tiene permisos");
        //echo $this->Html->image("Cross.png", array("alt" => 'key='.$iduser.'&key2='.$hijoalias.'&key3='.$permitido ,"class"=>"tilde"));
        echo json_encode($img);
        //echo 'key='.$iduser.'&key2='.$hijoalias.'&key3='.$permitido;
        // echo 'Este usuario tiene permisos';

    }else{
        $img = array("permisos"=>'key='.$iduser.'&key2='.$hijoalias.'&key3='.$permitido,"imagen"=>'/backendequilibrio/img/Green_tick.png',"mensaje"=>"Este Grupo tiene permisos");
        echo json_encode($img);
        //echo $this->Html->image("Green_tick.png", array("alt" => 'key='.$iduser.'&key2='.$hijoalias.'&key3='.$permitido ,"class"=>"tilde"));
        //echo 'Este usuario tiene permisos';

    }
   //echo $edad;
  
?>
