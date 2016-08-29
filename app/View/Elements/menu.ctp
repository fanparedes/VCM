<div class="menuPrincipal">
	<div class="ui floating labeled icon dropdown button orange">
	  <i class="home icon"></i>
	  <span class="text">Inicio</span>
		<div class="menu">
		<div class="item">
		  <i class="left dropdown icon"></i>
		  <span class="text">Left</span>
		  <div class="left menu">
			<div class="item">1</div>
			<div class="item">2</div>
			<div class="item">3</div>
		  </div>
		</div>
	  </div>
	</div>
	<?php echo $this->Html->link('<i class="users layout icon"></i> Usuarios', array(
						'controller' => 'usuarios',
						'action' => 'listado'),
						array(
							'class' => 'ui mini labeled icon button small orange',			
							'escape' => false
						)
					);
	?>	
	<?php 
	echo $this->Html->link('<i class="icon sign out"></i>', array(
			'controller' => 'usuarios',
			'action' => 'logout'),
			array(
				'class' => 'ui floating icon button red right floated',			
				'escape' => false
			)
		);
	?>
</div>