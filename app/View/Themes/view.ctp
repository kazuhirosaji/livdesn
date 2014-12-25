<div class="themes view">
<h2><?php echo __('Theme'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Theme'), array('action' => 'edit', $theme['Theme']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Theme'), array('action' => 'delete', $theme['Theme']['id']), array(), __('Are you sure you want to delete # %s?', $theme['Theme']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Themes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Theme'), array('action' => 'add')); ?> </li>
	</ul>
</div>
