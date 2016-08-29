<div class="beginnings view">
<h2><?php echo __('Beginning'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($beginning['Beginning']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Principio'); ?></dt>
		<dd>
			<?php echo h($beginning['Beginning']['principio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($beginning['Beginning']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($beginning['Beginning']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($beginning['Beginning']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Beginning'), array('action' => 'edit', $beginning['Beginning']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Beginning'), array('action' => 'delete', $beginning['Beginning']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $beginning['Beginning']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Beginnings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Beginning'), array('action' => 'add')); ?> </li>
	</ul>
</div>
