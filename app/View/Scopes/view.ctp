<div class="scopes view">
<h2><?php echo __('Scope'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($scope['Scope']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ambito'); ?></dt>
		<dd>
			<?php echo h($scope['Scope']['ambito']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($scope['Scope']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($scope['Scope']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Scope'), array('action' => 'edit', $scope['Scope']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Scope'), array('action' => 'delete', $scope['Scope']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $scope['Scope']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Scopes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Scope'), array('action' => 'add')); ?> </li>
	</ul>
</div>
