<div class="headquarters view">
<h2><?php echo __('Headquarters'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($headquarters['Headquarters']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sede'); ?></dt>
		<dd>
			<?php echo h($headquarters['Headquarters']['sede']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($headquarters['Headquarters']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($headquarters['Headquarters']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Headquarters'), array('action' => 'edit', $headquarters['Headquarters']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Headquarters'), array('action' => 'delete', $headquarters['Headquarters']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $headquarters['Headquarters']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Headquarters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Headquarters'), array('action' => 'add')); ?> </li>
	</ul>
</div>
