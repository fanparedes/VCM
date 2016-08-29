<div class="headquarters form">
<?php echo $this->Form->create('Headquarters'); ?>
	<fieldset>
		<legend><?php echo __('Add Headquarters'); ?></legend>
	<?php
		echo $this->Form->input('sede');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Headquarters'), array('action' => 'index')); ?></li>
	</ul>
</div>
