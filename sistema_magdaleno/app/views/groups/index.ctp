<h1>Grupos Creados</h1>
<h1><?php echo $html->link('Añadir Grupo', array('action' => 'add'))?></h1>
     <table>
        <tr>
            <th>Id</th>
            <th>Nombre del Grupo</th>
            <th>Titulo</th>
            <th>Fecha de Creación</th>
     </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($groups as $group): ?>
        <tr>
        <td><?php echo $group['Group']['idgrupos']; ?></td>
        <td>
             <?php
                //echo $html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id']));
             echo $group['Group']['name_grupos'];
             ?>
        </td>
        <td><?php echo $group['Group']['titulo_grupos']; ?></td>
        <td><?php echo $group['Group']['fechacrea_grupo']; ?></td>
        <td>
             <?php echo $html->link('Delete', array('action' => 'delete', $group['Group']['idgrupos']), null, 'Estas seguro?' )?>
        </td>
        <td>
             <?php echo $html->link('Editar', array('action' => 'edit' , $group['Group']['idgrupos']))?>
        </td>
        <td>
             <?php echo $html->link('Permisos de Grupo', array('action' => 'permission' , $group['Group']['idgrupos']))?>
        </td>
        </tr>
     <?php endforeach; ?>

 </table>