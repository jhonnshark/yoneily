<h1>Categorias asociadas</h1>
<h2><?php echo $title_for_layout; ?></h2>
<?php ///pr($prueba);?>
<h1><?php echo $html->link('Agregar Link',array('controller'=>'categories','action'=>'add_link',$clave));?></h1>

     <table>
                  
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
      <tr>
        <th><?php echo $this->Paginator->sort('ID', 'id_categorias'); ?></th>
        <th><?php echo $this->Paginator->sort('Nombre de la Categoria', 'nombre_categorias'); ?></th>
        <th><?php echo $this->Paginator->sort('Fecha', 'title'); ?></th>
      </tr>
     
        <?php foreach ($prueba as $link): ?>
        
            <?php 
                for($i=0;$i<count($link['Category']);$i++)
                {
            ?>
        <tr>
        <td><?php echo $link['Category'][$i]['id_categorias']; ?></td>
        <td><?php echo $link['Category'][$i]['nombre_categorias']; ?></td>
        
        <td><?php echo $link['Category'][$i]['fechacre_categorias']; ?></td>
        
        <td>
             <?php echo $html->link('Delete', array('controller'=>'categories','action' => 'delete', $link['Category'][$i]['id_categorias'],$clave), null, 'Estas seguro?' )?>
        </td>
        <td>
             <?php echo $html->link('Editar', array('controller'=>'categories','action' => 'edit',$link['Category'][$i]['id_categorias'],$clave))?>
        </td>
        <?php }?>
        </tr>        
     <?php endforeach; ?>
 </table>
 <div>
        <?php echo $this->Paginator->numbers(); ?>
        <?php echo $this->Paginator->prev('« Atras', null, null, array('class' => 'disabled')); ?>
        <?php echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); ?>
         <?php echo $this->Paginator->counter(); ?>
</div>
