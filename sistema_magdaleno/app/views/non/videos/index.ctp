<h1>Videos Creados</h1>
<h1><?php echo $html->link('Agregar Videos', array('action' => 'add'))?></h1>
     <table>
        <tr>
            <th>Id</th>
            <th>Fecha</th>
       </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($videos as $video): ?>
        <tr>
        <td><?php echo $video['Video']['id_videos']; ?></td>
       
        <td><?php echo $video['Video']['fechacre_videos']; ?></td>
        <td>
             <?php echo $html->link('Delete', array('action' => 'delete', $video['Video']['id_videos']), null, 'Estas seguro?' )?>
        </td>
        <td>
             <?php echo $html->link('Editar', array('action' => 'edit' , $video['Video']['id_videos']))?>
        </td>
         

        </tr>
     <?php endforeach; ?>

 </table>