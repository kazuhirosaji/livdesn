<div class="maps">
	<h2><?php echo __('Maps'); ?></h2>
	<table class="table table-striped">
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
		<td>
			<?php
				if (!empty($map['Map']['created'])) {
					$created = new DateTime(h($map['Map']['created']));
					echo date_format($created, 'Y-m-d');
				}
			?>
			&nbsp;
		</td>
		<td>
			<?php
				if (!empty($map['Map']['modified'])) {
					$modified = new DateTime(h($map['Map']['modified']));
					echo date_format($modified, 'Y-m-d');
				}
			?>
			&nbsp;
		</td>
		<td class="actions">
			<?php echo $this->element('button_actions', array("target_id" => $map['Map']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
