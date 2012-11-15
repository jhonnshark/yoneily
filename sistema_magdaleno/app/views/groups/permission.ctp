<?php //echo $javascript->link(array('jquery-1.4.2.min','jquery-ui-1.8.5.custom.min','prueba'));?>
<?php //echo $html->css(array('main','jquery-ui-1.8.5.custom'));?>
<h1>Asignar Permisos de Grupo</h1>
<div>
    <h1 id="usu"><?php echo $html->link('Volver a la vista de consulta',array('action' => '/'));?></h1>
</div>

<div>
    <table cellpadding="0" cellspacing="0">
    <?php
        //$roleTitles = array_values($roles);
        //$roleIds   = array_keys($roles);

        

       /* $currentController = '';
        foreach ($acos AS $id => $alias) {
            $class = '';
            $opc[]  = $alias;
            $row = array(
                $id,
                $html->div($class, $alias),
            );
            //echo $html->tableCells(array($row));
        }*/

        /*foreach ($controlador AS $id => $aliasgrp) {
                 $grp[] = $aliasgrp;
        }*/

        //echo $tableHeaders;
    ?>
    </table>
</div>

<div class="demo">

<div id="accordion">
        <?php
         
        foreach ($padre AS $cod => $nodopadre) {
                  
        ?>
    <h3><a href='#'><?php echo $nodopadre;?></a></h3>
            <div>
                
                <p id="enviar">
                    <table>
                    <?php
                     $permisosflag;
                    foreach($hijo[$cod] as $idhijo => $hijoalias){
                        echo "<tr>";
                        echo "<td>".$hijoalias."</td>";
                        if(!$permiso[$idhijo])
                        {
                           $permisosflag = 0;
                          
                           echo "<td class='texto'>Este Grupo no tiene permisos</td>";
                            //echo "<td>".$this->Html->link(array('action' => '/'),$this->Html->image('Cross.png'))."</td>";
                            echo "<td id='enviar'>".
                                    $this->Html->image("Cross.png", array("alt" => 'key='.$idgrupo.'&key2='.$hijoalias.'&key3='.$permisosflag ,"style" =>"display:inline;","class"=>"tilde")).
                                    $this->Html->image("ajax-loader.gif", array("style" =>"display:none;","class"=>"cargador")).
                                    "</td>";
                           }else{
                            $permisosflag = 1;
                            
                             echo "<td class='texto'>Este Grupo tiene permisos</td>";
                             echo "<td id='enviar'>".
                                    $this->Html->image("Green_tick.png", array("alt" => 'key='.$idgrupo.'&key2='.$hijoalias.'&key3='.$permisosflag ,"style" =>"display:inline;","class"=>"tilde")).
                                    $this->Html->image("ajax-loader.gif", array("style"=>"display:none;")).
                                     "</td>";                            

                        }
                       }

                       


                    
                       //echo $hijo[$cod];
                    ?>
                    </table>
                </p>
               
                <!--<div id="destino"></div>-->
                
            </div>
         <?php
          }
         ?>
   
     
</div>

</div><!-- End demo -->




