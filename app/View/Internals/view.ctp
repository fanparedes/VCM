<div class="internals view">
<h2><?php echo __('Internal'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($internal['Internal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publico'); ?></dt>
		<dd>
			<?php echo h($internal['Internal']['publico']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($internal['Internal']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($internal['Internal']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Internal'), array('action' => 'edit', $internal['Internal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Internal'), array('action' => 'delete', $internal['Internal']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $internal['Internal']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Internals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Internal'), array('action' => 'add')); ?> </li>
	</ul>
</div>
