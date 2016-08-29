<div class="reviews index">
	<h2><?php echo __('Reviews'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('puntuacionarea'); ?></th>
			<th><?php echo $this->Paginator->sort('involucramientoarea'); ?></th>
			<th><?php echo $this->Paginator->sort('puntuacionplazo'); ?></th>
			<th><?php echo $this->Paginator->sort('cumplimientoplazos'); ?></th>
			<th><?php echo $this->Paginator->sort('puntuacionobjetivo'); ?></th>
			<th><?php echo $this->Paginator->sort('cumplimientoobjetivos'); ?></th>
			<th><?php echo $this->Paginator->sort('puntuacionobjetivos'); ?></th>
			<th><?php echo $this->Paginator->sort('puntuacionprincipios'); ?></th>
			<th><?php echo $this->Paginator->sort('cumplimientoprincipios'); ?></th>
			<th><?php echo $this->Paginator->sort('puntuacionpublico'); ?></th>
			<th><?php echo $this->Paginator->sort('publicoactividad'); ?></th>
			<th><?php echo $this->Paginator->sort('puntuacionaprendizaje'); ?></th>
			<th><?php echo $this->Paginator->sort('puntuacionextension'); ?></th>
			<th><?php echo $this->Paginator->sort('extensionaprendizaje'); ?></th>
			<th><?php echo $this->Paginator->sort('entidadesrelacionadas'); ?></th>
			<th><?php echo $this->Paginator->sort('entidades'); ?></th>
			<th><?php echo $this->Paginator->sort('presupuesto'); ?></th>
			<th><?php echo $this->Paginator->sort('contratacionequipohumano'); ?></th>
			<th><?php echo $this->Paginator->sort('instalacion'); ?></th>
			<th><?php echo $this->Paginator->sort('otrosgastos'); ?></th>
			<th><?php echo $this->Paginator->sort('justificacionhitos'); ?></th>
			<th><?php echo $this->Paginator->sort('comentariosactividad'); ?></th>
			<th><?php echo $this->Paginator->sort('relevancia'); ?></th>
			<th><?php echo $this->Paginator->sort('pertinencia'); ?></th>
			<th><?php echo $this->Paginator->sort('abordo'); ?></th>
			<th><?php echo $this->Paginator->sort('activity_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($reviews as $review): ?>
	<tr>
		<td><?php echo h($review['Review']['id']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['puntuacionarea']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['involucramientoarea']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['puntuacionplazo']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['cumplimientoplazos']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['puntuacionobjetivo']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['cumplimientoobjetivos']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['puntuacionobjetivos']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['puntuacionprincipios']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['cumplimientoprincipios']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['puntuacionpublico']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['publicoactividad']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['puntuacionaprendizaje']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['puntuacionextension']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['extensionaprendizaje']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['entidadesrelacionadas']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['entidades']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['presupuesto']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['contratacionequipohumano']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['instalacion']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['otrosgastos']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['justificacionhitos']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['comentariosactividad']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['relevancia']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['pertinencia']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['abordo']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['activity_id']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['user_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $review['Review']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $review['Review']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $review['Review']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $review['Review']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Review'), array('action' => 'add')); ?></li>
	</ul>
</div>
