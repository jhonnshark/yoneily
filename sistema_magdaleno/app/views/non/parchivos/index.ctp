<h1>Subir Archivos</h1>
<h1><?php echo $html->link('Añadir', array('action' => 'add',$pagina))?></h1>
<h1><?php echo $html->link('Volver', array('controller'=>'paginas','action' => 'index'))?></h1>
<h1><?php echo $html->link('Logout', array('controller'=>'users','action' => 'logout'))?></h1>
<table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Tamaño</th>
            <th>Fecha</th>
     </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($parchivos as $parchivo): ?>
        <tr>
        <td><?php echo $parchivo['Parchivo']['id']; ?></td>
        <td>
             <?php
                //echo $html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id']));
             echo $parchivo['Parchivo']['name'];
             ?>
        </td>
        <td><?php echo $parchivo['Parchivo']['mimetype']; ?></td>
        <td><?php echo $parchivo['Parchivo']['filesize']; ?></td>
        <td><?php echo $parchivo['Parchivo']['created']; ?></td>
       <td>
             <?php echo $html->link('Delete', array('action' => 'delete', $parchivo['Parchivo']['id'],$parchivo['Parchivo']['id_pagina']), null, 'Estas seguro?' )?>
        </td>
        <td>
             <?php echo $html->link('Editar', array('action' => 'edit' , $parchivo['Parchivo']['id']))?>
        </td>
        </tr>
     <?php endforeach; ?>

 </table>