<div class="maps index">
	<h2><?php echo __('Maps'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('theme_id'); ?></th>
			<th>image</th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($maps as $map): ?>
	<tr>
		<td><?php echo h($map['Map']['id']); ?>&nbsp;</td>
		<td><?php echo h($map['Map']['title']); ?>&nbsp;</td>
		<td><?php echo h($map['Map']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($map['User']['name'], array('controller' => 'users', 'action' => 'view', $map['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($map['Theme']['title'], array('controller' => 'themes', 'action' => 'view', $map['Theme']['id'])); ?>
		</td>
		<?php
			$imagename = h($map['Map']['imagename']);
			if (strlen($imagename) > 0 && file_exists("./img/maps/". $imagename )): 
		?>
			<td><?php echo $this->Html->image(h("maps/". $map['Map']['imagename']), 
				array('alt' => 'Image file')); ?>&nbsp;</td>
		<?php else: ?>
			<td><?php echo $this->Html->image("NoImage.png", array('alt' => 'Image file')); ?>&nbsp;</td>
		<?php endif ?>
		<td><?php echo h($map['Map']['created']); ?>&nbsp;</td>
		<td><?php echo h($map['Map']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $map['Map']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $map['Map']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $map['Map']['id']), array(), __('Are you sure you want to delete # %s?', $map['Map']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Map'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Themes'), array('controller' => 'themes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Theme'), array('controller' => 'themes', 'action' => 'add')); ?> </li>
	</ul>
</div>
