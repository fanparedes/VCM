<div class="centrals view">
<h2><?php echo __('Central'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($central['Central']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($central['Central']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($central['Central']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($central['Central']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Central'), array('action' => 'edit', $central['Central']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Central'), array('action' => 'delete', $central['Central']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $central['Central']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Centrals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Central'), array('action' => 'add')); ?> </li>
	</ul>
</div>
