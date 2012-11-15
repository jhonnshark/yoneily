<div>
	<div id="menu">
		<ul style="margin-right:20px;">
			<li class="current_page_item"><?php echo $html->link('Principal', array('controller' => 'pages', 'action' => 'home')); ?></li>
			<li ><?php echo $html->link('Quienes Somos', array('controller' => 'pages', 'action' => 'quienes')); ?></li>
			<li><?php echo $html->link('Contactanos', array('controller' => 'pages', 'action' => 'contactanos')); ?></li>
			<!--<li><?php //echo $html->link('Misión y Visión', array('controller' => 'pages', 'action' => 'mision')); ?></li>-->
			<li><?php echo $html->link('Promociones', array('controller' => 'pages', 'action' => 'promociones')); ?></li>
			<li><?php echo $html->link('Productos', array('controller' => 'pages', 'action' => 'productos')); ?></li>
			<li>
				
				<?php
					echo $form->create('Page',array('controller'=>'pages','action'=>'buscar'));
					echo "<table class=formayuda><tr>";
					echo "<td>".$form->input('frase', array('label' =>false,'maxlength'=>255,'size'=>'15'))."</td></tr>";
					echo '<tr><td align=center>'.$form->end(' BUSCAR ').'</td>';
					echo "</tr></table>";
				?>
				
			</li>
		</ul>
	</div>
</div>