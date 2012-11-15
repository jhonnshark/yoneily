<h1>Páginas Creadas</h1>
<h1><?php echo $html->link('Añadir', array('action' => 'add'))?></h1>
<h1><?php echo $html->link('Logout', array('controller'=>'users','action' => 'logout'))?></h1>
<table>
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Fondo</th>
            <th>Fecha de Creación</th>
     </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($paginas as $pagina): ?>
        <tr>
        <td><?php echo $pagina['Pagina']['id']; ?></td>
        <td>
             <?php
                //echo $html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id']));
             echo $pagina['Pagina']['titulo'];
             ?>
        </td>
        <td><?php echo $pagina['Pagina']['fondo']; ?></td>
        <td><?php echo $pagina['Pagina']['fecha']; ?></td>
       <td>
             <?php echo $html->link('Delete', array('action' => 'delete', $pagina['Pagina']['id']), null, 'Estas seguro?' )?>
        </td>
        <td>
             <?php echo $html->link('Editar', array('action' => 'edit' , $pagina['Pagina']['id']))?>
        </td>
        <td>
             <?php echo $html->link('Añadir Archivo', array('controller'=>'parchivos','action' => 'add' , $pagina['Pagina']['id']))?>
        </td>
         <td>
             <?php echo $html->link('Ver', array('controller'=>'parchivos','action' => 'index' , $pagina['Pagina']['id']))?>
        </td>
         <td>
             <?php echo $html->link('Link', array('action' => 'link' , $pagina['Pagina']['id']))?>
        </td>
        </tr>
     <?php endforeach; ?>

 </table>