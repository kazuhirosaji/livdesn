<?php echo $this->Form->create('Theme'); ?>
	<fieldset>
		<legend><?php echo __('Add Theme'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>