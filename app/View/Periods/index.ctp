<div class="periods index">
	<h2><?php echo __('Periods'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('begin'); ?></th>
			<th><?php echo $this->Paginator->sort('end'); ?></th>
			<th><?php echo $this->Paginator->sort('year_id'); ?></th>
			<th><?php echo $this->Paginator->sort('establishment_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($periods as $period): ?>
	<tr>
		<td><?php echo h($period['Period']['id']); ?>&nbsp;</td>
		<td><?php echo h($period['Period']['begin']); ?>&nbsp;</td>
		<td><?php echo h($period['Period']['end']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($period['Year']['title'], array('controller' => 'years', 'action' => 'view', $period['Year']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($period['Establishment']['name'], array('controller' => 'establishments', 'action' => 'view', $period['Establishment']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $period['Period']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $period['Period']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $period['Period']['id']), null, __('Are you sure you want to delete # %s?', $period['Period']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
		<li><?php echo $this->Html->link(__('New Period'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Years'), array('controller' => 'years', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Year'), array('controller' => 'years', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Establishments'), array('controller' => 'establishments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Establishment'), array('controller' => 'establishments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add')); ?> </li>
	</ul>
</div>
