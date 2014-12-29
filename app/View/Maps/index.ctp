<div class="maps">
	<h2><?php echo __('Maps'); ?></h2>
	<table class="table table-striped">
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
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $map['Map']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $map['Map']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $map['Map']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $map['Map']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
