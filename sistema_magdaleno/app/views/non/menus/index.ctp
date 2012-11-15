<h1>Menus Creados</h1>
<h1><?php echo $html->link('Añadir Menus', array('action' => 'add'))?></h1>
     <table>
        <tr>
            <th>Id</th>
            <th>Nombre del Menu</th>
            <th>Fecha de Creación</th>
     </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     
        <?php foreach ($menus as $menu): ?>
        <tr>
        <td><?php echo $menu['Menu']['id_menus']; ?></td>
        <td>
             <?php
                //echo $html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id']));
             echo $menu['Menu']['name_menus'];
             ?>
        </td>
        <td><?php echo $menu['Menu']['fechacre_menus']; ?></td>
         <td>
             <?php echo $html->link('Ver Links', array('action' => 'links' ,$menu['Menu']['id_menus']))?>
        </td>
        <td>
             <?php echo $html->link('Delete', array('action' => 'delete', $menu['Menu']['id_menus']), null, 'Estas seguro?' )?>
        </td>
        <td>
             <?php echo $html->link('Editar', array('action' => 'edit' , $menu['Menu']['id_menus']))?>
        </td>
        
        </tr>
     <?php endforeach; ?>

 </table>
