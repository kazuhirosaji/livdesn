<div class="btn-group">
	<a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
		<?php echo count($mapsusers) . " voted" ?>    
	</a>
	<ul class="dropdown-menu">
	<?php foreach ($mapsusers as $user): ?>
		<li><?php echo $this->Html->link($user['name'], array('controller' => 'Users', 'action' => 'view', $user['id'])); ?></li>
	<?php endforeach; ?>
	</ul>
</div>
