<div class="headquarters index">
	<h2><?php echo __('Headquarters'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('sede'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($headquarters as $headquarters): ?>
	<tr>
		<td><?php echo h($headquarters['Headquarters']['id']); ?>&nbsp;</td>
		<td><?php echo h($headquarters['Headquarters']['sede']); ?>&nbsp;</td>
		<td><?php echo h($headquarters['Headquarters']['created']); ?>&nbsp;</td>
		<td><?php echo h($headquarters['Headquarters']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $headquarters['Headquarters']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $headquarters['Headquarters']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $headquarters['Headquarters']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $headquarters['Headquarters']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Headquarters'), array('action' => 'add')); ?></li>
	</ul>
</div>
