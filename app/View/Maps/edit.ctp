<?php echo $this->Form->create('Map', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Map'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('user_id');
		echo $this->Form->input('theme_id');
		echo $this->Form->input('file', array('type' => 'file', 'label' => '画像'));
		$imagename = h($this->Form->value('Map.imagename'));
		if (strlen($imagename) > 0 && file_exists("./img/maps/". $imagename )){
			echo $this->Html->image(h("maps/". $imagename),  array('alt' => 'Image file'));
		}
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
