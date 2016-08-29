<div class="ui three column grid">
  <div class="row">
    <div class="column"><h2><i class="icon users ui"></i>Listado de Usuarios</h2></div>
    <div class="column right floated">
				<?php echo $this->Html->link('<i class="plus layout icon"></i> Crear Usuario', array(
						'controller' => 'usuarios',
						'action' => 'add'),
						array(
							'class' => 'ui mini labeled icon button small green right floated',			
							'escape' => false
						)
					);
				?>	
  </div>
  </div>
</div>
<div class="ui grid">	
	<div class="ui column">
		<table class="ui celled table">
		  <thead>
			<tr><th>id</th>
			<th>Activo</th>
			<th>
				<?php 	echo $this->Paginator->sort('nombre', 'Nombre'); 
						$orden = $this->Paginator->params['paging']['Usuario']['options'];
						if ((isset($orden['sort'])) &&('nombre' == $orden['sort'])){							
							if ($orden['direction'] == 'asc') {
								echo '<i class="icon caret down flechita"></i>';
							}
							else {
								echo '<i class="icon caret up flechita"></i>';
							}
						}
				?>				
			</th>
			<th>
				<?php 	echo $this->Paginator->sort('apellidos', 'Apellidos'); 
						$orden = $this->Paginator->params['paging']['Usuario']['options'];
						if ((isset($orden['sort'])) &&('apellidos' == $orden['sort'])){					
							if ($orden['direction'] == 'asc') {
								echo '<i class="icon caret down flechita"></i>';
							}
							else {
								echo '<i class="icon caret up flechita"></i>';
							}
						}
				?>
			</th>
			<th><?php 	echo $this->Paginator->sort('username', 'Username'); 
						$orden = $this->Paginator->params['paging']['Usuario']['options'];
						if ((isset($orden['sort'])) &&('username' == $orden['sort'])){						
							if ($orden['direction'] == 'asc') {
								echo '<i class="icon caret down flechita"></i>';
							}
							else {
								echo '<i class="icon caret up flechita"></i>';
							}
						}
				?>
			</th>
			<th><?php 	echo $this->Paginator->sort('role', 'Perfil'); 
						$orden = $this->Paginator->params['paging']['Usuario']['options'];
						if ((isset($orden['sort'])) &&('role' == $orden['sort'])){							
							if ($orden['direction'] == 'asc') {
								echo '<i class="icon caret down flechita"></i>';
							}
							else {
								echo '<i class="icon caret up flechita"></i>';
							}
						}
				?>
			</th>
			<th>
				Escuelas
			</th>
			<th>
				<?php echo $this->Paginator->sort('created', 'Creado'); 
						$orden = $this->Paginator->params['paging']['Usuario']['options'];
						if ((isset($orden['sort'])) &&('created' == $orden['sort'])){							
							if ($orden['direction'] == 'asc') {
								echo '<i class="icon caret down flechita"></i>';
							}
							else {
								echo '<i class="icon caret up flechita"></i>';
							}
						}
				?>
			</th>
			<th>
				<?php echo $this->Paginator->sort('modified', 'Modificado'); 
						$orden = $this->Paginator->params['paging']['Usuario']['options'];
						if ((isset($orden['sort'])) &&('modified' == $orden['sort'])){							
							if ($orden['direction'] == 'asc') {
								echo '<i class="icon caret down flechita"></i>';
							}
							else {
								echo '<i class="icon caret up flechita"></i>';
							}
						}
				?></th>
			<th>Acciones</th>
		  </tr></thead>
		  <tbody>
		  <?php foreach ($usuarios as $usuario): ?>
			<tr <?php if ($usuario['Usuario']['activo'] <> '1'): echo 'class="error"'; endif; ?>>
				<td><?php echo $usuario['Usuario']['id']; ?></td>
				<td class="center aligned"><?php if ($usuario['Usuario']['activo'] == '1'): echo '<i class="circle green icon"></i>'; else: echo '<i class="icon circle red"></i>'; endif; ?></td>
				<td><?php echo $usuario['Usuario']['nombre']; ?></td>
				<td><?php echo $usuario['Usuario']['apellidos']; ?></td>
				<td><?php echo $usuario['Usuario']['username']; ?></td>
				<td><?php echo $usuario['Usuario']['role']; ?></td>
				<td>
					<?php 
						$escuelas = array();
						foreach ($usuario['Escuela'] as $escuela){
							echo $escuela['nombre'].' ';
								
						}
					?>
				</td>
				<td><?php echo $this->Ingenia->formatearFecha($usuario['Usuario']['created']); ?></td>
				<td><?php echo $this->Ingenia->formatearFecha($usuario['Usuario']['modified']); ?></td>				
				<td>
					<div class="ui">
						<?php 
							echo $this->Html->link('<i class="edit icon large"></i>', array(
								'controller' => 'usuarios',
								'action' => 'edit',
								$usuario['Usuario']['id'],
								),
								array(
									'class' => 'ui',			
									'escape' => false
								)
							);
						?>
						<?php 
							echo $this->Html->link('<i class="trash icon large"></i>', array(
								'controller' => 'usuarios',
								'action' => 'delete',
								$usuario['Usuario']['id'],
								),
								array(
									'class' => 'ui borrar',			
									'escape' => false,
									'data-id' => $usuario['Usuario']['id'],
									'data-nombre' => $usuario['Usuario']['username'],
								)
							);
						?>
					</div>
				</td>				
			</tr>
			<?php endforeach;?>
		  </tbody>
		</table>
	</div>
</div>
<!-- Modal Borrado -->
<?php echo $this->Form->create('Usuario',array('url'=>'/usuarios/delete/'));?>
<?php echo  $this->Form->input('id', array('type' => 'hidden', 'id' => 'deleteId', 'value' => '1')); ?>
<div class="ui basic modal">
  <i class="close icon"></i>
  <div class="header">
    Borrar Usuario
  </div>
  <div class="image content">
    <div class="image">
      <i class="remove user icon"></i>
    </div>
    <div class="description">
      <h5>¿Estás seguro de querer borrar este usuario? <span id="nombreUsuario"></span></h5>
	  <p>La acción es irreversible</p>
    </div>
  </div>
  <div class="actions">
    <div class="two fluid ui inverted buttons">
      <div class="ui red basic close inverted button">
        <i class="close icon"></i>
        <span class="close">No</span>
      </div>
      <div class="ui green basic inverted button enviar">       
			<i class="checkmark icon"></i>
			Sí	
		
      </div>
    </div>
  </div>
 </div>
</form>
<!-- Fin Modal Borrado -->
<script>
$( ".borrar" ).click(function() {
  $('.ui.modal')
  .modal('show');
  var id = $(this).data('id');
  var nombre = $(this).data('nombre');
  console.log(id);
  $('#deleteId').val(id)
  $('#nombreUsuario').html(nombre);
  return false;
;
});
$(".enviar").click(function() {	
	$('#UsuarioListadoForm').submit();
;
});
</script>