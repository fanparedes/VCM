<div class="reviews view">
<h2><?php echo __('Review'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($review['Review']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Puntuacionarea'); ?></dt>
		<dd>
			<?php echo h($review['Review']['puntuacionarea']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Involucramientoarea'); ?></dt>
		<dd>
			<?php echo h($review['Review']['involucramientoarea']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Puntuacionplazo'); ?></dt>
		<dd>
			<?php echo h($review['Review']['puntuacionplazo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cumplimientoplazos'); ?></dt>
		<dd>
			<?php echo h($review['Review']['cumplimientoplazos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Puntuacionobjetivo'); ?></dt>
		<dd>
			<?php echo h($review['Review']['puntuacionobjetivo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cumplimientoobjetivos'); ?></dt>
		<dd>
			<?php echo h($review['Review']['cumplimientoobjetivos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Puntuacionobjetivos'); ?></dt>
		<dd>
			<?php echo h($review['Review']['puntuacionobjetivos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Puntuacionprincipios'); ?></dt>
		<dd>
			<?php echo h($review['Review']['puntuacionprincipios']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cumplimientoprincipios'); ?></dt>
		<dd>
			<?php echo h($review['Review']['cumplimientoprincipios']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Puntuacionpublico'); ?></dt>
		<dd>
			<?php echo h($review['Review']['puntuacionpublico']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publicoactividad'); ?></dt>
		<dd>
			<?php echo h($review['Review']['publicoactividad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Puntuacionaprendizaje'); ?></dt>
		<dd>
			<?php echo h($review['Review']['puntuacionaprendizaje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Puntuacionextension'); ?></dt>
		<dd>
			<?php echo h($review['Review']['puntuacionextension']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Extensionaprendizaje'); ?></dt>
		<dd>
			<?php echo h($review['Review']['extensionaprendizaje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entidadesrelacionadas'); ?></dt>
		<dd>
			<?php echo h($review['Review']['entidadesrelacionadas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entidades'); ?></dt>
		<dd>
			<?php echo h($review['Review']['entidades']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Presupuesto'); ?></dt>
		<dd>
			<?php echo h($review['Review']['presupuesto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contratacionequipohumano'); ?></dt>
		<dd>
			<?php echo h($review['Review']['contratacionequipohumano']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instalacion'); ?></dt>
		<dd>
			<?php echo h($review['Review']['instalacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Otrosgastos'); ?></dt>
		<dd>
			<?php echo h($review['Review']['otrosgastos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Justificacionhitos'); ?></dt>
		<dd>
			<?php echo h($review['Review']['justificacionhitos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comentariosactividad'); ?></dt>
		<dd>
			<?php echo h($review['Review']['comentariosactividad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Relevancia'); ?></dt>
		<dd>
			<?php echo h($review['Review']['relevancia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pertinencia'); ?></dt>
		<dd>
			<?php echo h($review['Review']['pertinencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Abordo'); ?></dt>
		<dd>
			<?php echo h($review['Review']['abordo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activity Id'); ?></dt>
		<dd>
			<?php echo h($review['Review']['activity_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($review['Review']['user_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Review'), array('action' => 'edit', $review['Review']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Review'), array('action' => 'delete', $review['Review']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $review['Review']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Reviews'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Review'), array('action' => 'add')); ?> </li>
	</ul>
</div>
