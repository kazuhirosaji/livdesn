<div class="themes form">
<?php echo $this->Form->create('Theme'); ?>
	<fieldset>
		<legend><?php echo __('Add Theme'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Themes'), array('action' => 'index')); ?></li>
	</ul>
</div>
