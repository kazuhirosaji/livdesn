<div class="maps view">
<h2><?php echo __('Map'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($map['Map']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($map['Map']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($map['Map']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($map['User']['name'], array('controller' => 'users', 'action' => 'view', $map['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Theme'); ?></dt>
		<dd>
			<?php echo $this->Html->link($map['Theme']['title'], array('controller' => 'themes', 'action' => 'view', $map['Theme']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php
				$imagename = h($map['Map']['imagename']);
				if (strlen($imagename) > 0 && file_exists("./img/maps/". $imagename )): 
			?>
				<td><?php echo $this->Html->image(h("maps/". $map['Map']['imagename']), 
					array('alt' => 'Image file')); ?>&nbsp;</td>
			<?php else: ?>
				<td><?php echo $this->Html->image("NoImage.png", array('alt' => 'Image file')); ?>&nbsp;</td>
			<?php endif ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($map['Map']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($map['Map']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<?php 
	if (!empty($map['User'])) {
		$mapsusers = array();
		foreach ($map['User'] as $user) {
			if (is_array($user['MapsUser'])) {
				$mapsusers[] = $user;
			}
		}
	}
	if (!empty($mapsusers)):
	?>
	<h3><?php echo count($mapsusers) . " voted users" ?></h3>
	<?php
		foreach ($mapsusers as $user) {
			echo $this->Html->link($user['name'], array('controller' => 'Users', 'action' => 'view', $user['id']), array('class' => 'label'));
		}
	?>
	<?php endif; ?>
</div>
<BR><BR>