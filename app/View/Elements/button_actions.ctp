<?php echo $this->Html->link(__('View'), array('action' => 'view', $target_id), array('class' => 'btn btn-mini')); ?>
<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $target_id), array('class' => 'btn btn-mini')); ?>
<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $target_id), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $target_id)); ?>
