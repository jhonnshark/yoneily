<h1>Noticias Creadas</h1>
<h1><?php echo $html->link('Agregar Noticias', array('action' => 'add'))?></h1>
     <table>
        <tr>
            <th>Id</th>
            <th>Titulo de la Noticia</th>
            <th>Sumario</th>
            <th>Texto de la Noticia</th>
            <th>Fecha de Creación</th>
     </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($news as $news): ?>
        <tr>
        <td><?php echo $news['News']['id_contennoticias']; ?></td>
        <td><?php echo $news['News']['titulo_contennoticias']; ?></td>
        <td>
             <?php
                //echo $html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id']));
             echo $news['News']['sumario_contennoticias'];
             ?>
        </td>
        <td><?php echo $news['News']['texto_contennoticias']; ?></td>
        <td><?php echo $news['News']['fechacre_contennoticias']; ?></td>
        <td>
             <?php echo $html->link('Delete', array('action' => 'delete', $news['News']['id_contennoticias']), null, 'Estas seguro?' )?>
        </td>
        <td>
             <?php echo $html->link('Editar', array('action' => 'edit' , $news['News']['id_contennoticias']))?>
        </td>

        </tr>
     <?php endforeach; ?>

 </table>
