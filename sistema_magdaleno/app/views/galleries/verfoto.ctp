<h1>Galerias</h1>
<h1><?php echo $html->link('volver', array('action' => '/'))?></h1>
     <table>
        <tr>
            <th>id_galeria</th>
            <th>Nombre del archivo</th>
            
       </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($archivos as $archivo): ?>
        
        <?php for($x=0;$x<count($archivo['Archivo']);$x++)
              {
        

        ?>
        <tr>
        <td><?php echo $archivo['Gallery']['id_galeria']; ?></td>
        <td><?php echo $archivo['Archivo'][$x]['nombre_thumb']; ?></td>
         <td>
             <?php echo $html->link('Delete', array('action' => 'deleteimg', $archivo['Gallery']['id_galeria'],$archivo['Archivo'][$x]['id_file']), null, 'Estas seguro?' )?>
        </td>
        <td>
             <?php echo $html->link('Ver Imagen', array('action' => 'edit' , $archivo['Gallery']['id_galeria']))?>
        </td>


        </tr>
        <?php
              }
        ?>
       
     <?php endforeach; ?>

 </table>