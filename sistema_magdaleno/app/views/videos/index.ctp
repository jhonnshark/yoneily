<fieldset style="margin-left:5px;" >
<center><img src="<?php echo $html->url('/')?>images/videos_registrados.png"/></center>
     <table style="margin-left:5px;" class="index">
        <tr>
            <th><center>Id</center></th>
			<th><center>Título</center></th>
            <th><center>Fecha</center></th>
			<th><center>Categoria</center></th>
			<th><center>Destacado</center></th>
			<th><center>Eliminar</center></th>
			<th><center>Editar</center></th>
			<th><center>Status</center></th>
       </tr>
     <!-- Aqui se hace el ciclo que recorre nuestros arreglo $posts , imprimiendo la información de cada post-->
     <?php foreach ($videos as $video): ?>
        <tr>
        <td><?php echo $video['Video']['id_videos']; ?></td>
        <td><?php echo $video['Video']['titulo_video']; ?></td>
       
        <td><?php echo $video['Video']['fechacre_videos']; ?></td>
		<td><center>
		<?php 
			if($video['Video']['video_home']=='1')
			{
				echo "<font color='green'><b>Videos</b></font>";
			}
			else
			{
				echo "<font color='red'><b>Home</b></font>";
			}
		?>
		</center></td>
		<td><center>
		<?php 
			if($video['Video']['destacado']=='1')
			{
				echo "<font color='green'><b>Si</b></font>";
			}
			else
			{
				echo "<font color='red'><b>No</b></font>";
			}
		?>
		</center></td>
        <td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/delete.png">', array('action' => 'delete', $video['Video']['id_videos']), array('escape' => false), 'Estas seguro?' )?></center>
        </td>
        <td>
			<center><?php echo $html->link('<img src="'.$html->url('/',true).'procesos/edit.png">', array('plugin' => 0,'action' => 'edit' , $video['Video']['id_videos']), array('escape' => false))?></center>
        </td>
		<td>
			<?php 

				if($video['Video']['destacado']=='1')
				{
					echo $html->link('<img src="'.$html->url('/',true).'procesos/activo.png"><font size=2> No Destacado</font>', array('plugin' => 0,'action' => 'nodestacado' , $video['Video']['id_videos']), array('escape' => false));
				}else{
					echo $html->link('<img src="'.$html->url('/',true).'procesos/desactivo.png"><font size=2> Destacado', array('plugin' => 0,'action' => 'destacado' , $video['Video']['id_videos']), array('escape' => false));
				}
			?>
        </td>
         <?php //pr($video) ?>

        </tr>
     <?php endforeach; ?>
         <?php echo $this->Paginator->numbers(); ?>
<!-- Shows the next and previous links -->
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>
<!-- prints X of Y, where X is current page and Y is number of pages -->
<?php echo $this->Paginator->counter(); ?>

 </table>
 </fieldset>