<div class="maps form">
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
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Map.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Map.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Maps'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Themes'), array('controller' => 'themes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Theme'), array('controller' => 'themes', 'action' => 'add')); ?> </li>
	</ul>
</div>
