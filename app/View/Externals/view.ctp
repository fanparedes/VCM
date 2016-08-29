<div class="externals view">
<h2><?php echo __('External'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($external['External']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publicoexterno'); ?></dt>
		<dd>
			<?php echo h($external['External']['publicoexterno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($external['External']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($external['External']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit External'), array('action' => 'edit', $external['External']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete External'), array('action' => 'delete', $external['External']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $external['External']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Externals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New External'), array('action' => 'add')); ?> </li>
	</ul>
</div>
