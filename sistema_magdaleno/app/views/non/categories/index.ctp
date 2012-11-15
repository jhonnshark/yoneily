<h1>Categorias Creadas</h1>
<h1><?php echo $html->link('Añadir Categorias', array('action' => 'add'))?></h1>
     <table>
        <tr>
            <th>Id</th>
            <th>Padre</th>
            <th>Nombre de la categoria</th>
            <th>Categoria vinculada</th>
            <th>Fecha de Creación</th>
     </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($categories as $category): ?>
        <tr>
        <td><?php echo $category['Category']['id_categorias']; ?></td>
        <td><?php echo $category['Category']['categorias_id_categorias']; ?></td>
        <td>
             <?php
                //echo $html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id']));
             echo $category['Category']['nombre_categorias'];
             ?>
        </td>
        <td><?php echo $category['Category']['link_categorias']; ?></td>
        <td><?php echo $category['Category']['fechacre_categorias']; ?></td>
        <td>
             <?php echo $html->link('Delete', array('action' => 'delete', $category['Category']['id_categorias']), null, 'Estas seguro?' )?>
        </td>
        <td>
             <?php echo $html->link('Editar', array('action' => 'edit' , $category['Category']['id_categorias']))?>
        </td>

        </tr>
     <?php endforeach; ?>

 </table>
