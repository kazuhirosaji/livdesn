<div class="themes">
	<h2><?php echo __('Themes'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($themes as $theme): ?>
	<tr>
		<td><?php echo h($theme['Theme']['id']); ?>&nbsp;</td>
		<td><?php echo h($theme['Theme']['title']); ?>&nbsp;</td>
		<td><?php echo h($theme['Theme']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->element('button_actions', array("target_id" => $theme['Theme']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
