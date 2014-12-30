<?php echo $this->Form->create('Map', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Map'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('user_id');
		echo $this->Form->input('theme_id');
		echo $this->Form->input('file', array('type' => 'file', 'label' => '画像'));
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>