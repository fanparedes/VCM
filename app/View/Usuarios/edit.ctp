<div class="ui three column grid">
  <div class="row">
    <div class="column"><h2><i class="icon users ui"></i>Editar Usuario</h2></div>
    <div class="column right floated">
				<?php echo $this->Html->link('<i class="reply layout icon black"></i> Volver', array(
						'controller' => 'usuarios',
						'action' => 'listado'),
						array(
							'class' => 'ui mini labeled icon button small yellow right floated',			
							'escape' => false
						)
					);
				?>	
  </div>
  </div>
</div>
<div class="ui grid four column">
	<div class="ui two column">
		<div class="ui form">
			<?php echo $this->Form->create('Usuario', array('class' => 'ui form')); ?>
				<fieldset>					
					<?php 
					echo $this->Form->input('nombre', array('label' => 'Nombre', 'required' => true));
					echo $this->Form->input('apellidos', array('label' => 'Apellidos', 'required' => true));					
					//echo $this->Form->input('password', array('label' => 'Password', 'required' => true, 'type' => 'search'));
					echo $this->Form->input('role', array(
						'options' => array('Administrador' => 'Administrador', 'Analista Instruccional' => 'Analista Instruccional', 'Directivo' => 'Directivo'), 'label' => 'Perfil'
					));
					echo $this->Form->input('activo', array(
						'options' => array('1' => 'Activo', '0' => 'Inactivo'), 'label' => 'Activo'
					));
				?>
				<br>
			<?php 
				echo $this->Form->button('<i class="ui icon save"></i>Guardar', array('type' => 'submit', 'class' => 'button ui green'));					
			?>
			</div>			
	</div>
	<div class="ui two column">
		<div class="ui form">
			<fieldset>
				<div class="ui checkbox" id="escuelas">
					<h5>Escuelas:</h5>
						<?php 
						$selected = array();
						foreach  ($this->request->data['Escuela'] as $seleccionado): array_push($selected, $seleccionado['id']); endforeach; ?>
						<?php echo $this->Form->input('Escuela', array('label' => false, 'options' => $escuelas, 'type' => 'select', 'multiple' => 'checkbox', 'class' => 'checkbox', 'escape' => false, 'selected' => $selected)); ?>	
					</h5>
				</div>
		</div>
			</fieldset>			
	</div>
	<?php echo $this->Form->end(); ?>
</div>
<script>
$('#ayuda_username')
  .popup({   
    hoverable: true,
    position : 'top center',
    delay: {
      show: 300,
      hide: 800
    }
  })
  $('.ui.checkbox')
  .checkbox()
;
 </script>
  <script>
$(function() {
 if ($("#UsuarioRole").val() !== 'Administrador' ){
	  $('#escuelas').show();	  
  }
  else{	  	
	$('#escuelas').hide();
	$('input:checkbox').removeAttr('checked');	
  }   
}); 
$( "#UsuarioRole" ).change(function() {
  if ($("#UsuarioRole").val() !== 'Administrador' ){
	  $('#escuelas').show();	  
  }
  else{	  
	$('input:checkbox').removeAttr('checked');
	$('#escuelas').hide();	  
  }
});
 </script>