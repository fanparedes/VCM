<div class="reviews form">
<?php echo $this->Form->create('Review'); ?>
	<fieldset>
		<legend><?php echo __('Edit Review'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('puntuacionarea');
		echo $this->Form->input('involucramientoarea');
		echo $this->Form->input('puntuacionplazo');
		echo $this->Form->input('cumplimientoplazos');
		echo $this->Form->input('puntuacionobjetivo');
		echo $this->Form->input('cumplimientoobjetivos');
		echo $this->Form->input('puntuacionobjetivos');
		echo $this->Form->input('puntuacionprincipios');
		echo $this->Form->input('cumplimientoprincipios');
		echo $this->Form->input('puntuacionpublico');
		echo $this->Form->input('publicoactividad');
		echo $this->Form->input('puntuacionaprendizaje');
		echo $this->Form->input('puntuacionextension');
		echo $this->Form->input('extensionaprendizaje');
		echo $this->Form->input('entidadesrelacionadas');
		echo $this->Form->input('entidades');
		echo $this->Form->input('presupuesto');
		echo $this->Form->input('contratacionequipohumano');
		echo $this->Form->input('instalacion');
		echo $this->Form->input('otrosgastos');
		echo $this->Form->input('justificacionhitos');
		echo $this->Form->input('comentariosactividad');
		echo $this->Form->input('relevancia');
		echo $this->Form->input('pertinencia');
		echo $this->Form->input('abordo');
		echo $this->Form->input('activity_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Review.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Review.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Reviews'), array('action' => 'index')); ?></li>
	</ul>
</div>
