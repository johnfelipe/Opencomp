<div class="periods view">
<h2><?php  echo __('Period'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($period['Period']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Begin'); ?></dt>
		<dd>
			<?php echo h($period['Period']['begin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h($period['Period']['end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo $this->Html->link($period['Year']['title'], array('controller' => 'years', 'action' => 'view', $period['Year']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Establishment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($period['Establishment']['name'], array('controller' => 'establishments', 'action' => 'view', $period['Establishment']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Period'), array('action' => 'edit', $period['Period']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Period'), array('action' => 'delete', $period['Period']['id']), null, __('Are you sure you want to delete # %s?', $period['Period']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Periods'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Period'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Years'), array('controller' => 'years', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Year'), array('controller' => 'years', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Establishments'), array('controller' => 'establishments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Establishment'), array('controller' => 'establishments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Evaluations'); ?></h3>
	<?php if (!empty($period['Evaluation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Classroom Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Period Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($period['Evaluation'] as $evaluation): ?>
		<tr>
			<td><?php echo $evaluation['id']; ?></td>
			<td><?php echo $evaluation['classroom_id']; ?></td>
			<td><?php echo $evaluation['user_id']; ?></td>
			<td><?php echo $evaluation['period_id']; ?></td>
			<td><?php echo $evaluation['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'evaluations', 'action' => 'view', $evaluation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'evaluations', 'action' => 'edit', $evaluation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'evaluations', 'action' => 'delete', $evaluation['id']), null, __('Are you sure you want to delete # %s?', $evaluation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
