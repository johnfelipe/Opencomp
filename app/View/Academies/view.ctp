<div class="academies view">
<h2><?php  echo __('Academy'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($academy['Academy']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($academy['Academy']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($academy['Academy']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Academy'), array('action' => 'edit', $academy['Academy']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Academy'), array('action' => 'delete', $academy['Academy']['id']), null, __('Are you sure you want to delete # %s?', $academy['Academy']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Academies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Academy'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Establishments'), array('controller' => 'establishments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Establishment'), array('controller' => 'establishments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Establishments'); ?></h3>
	<?php if (!empty($academy['Establishment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Postcode'); ?></th>
		<th><?php echo __('Town'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Academy Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($academy['Establishment'] as $establishment): ?>
		<tr>
			<td><?php echo $establishment['id']; ?></td>
			<td><?php echo $establishment['name']; ?></td>
			<td><?php echo $establishment['address']; ?></td>
			<td><?php echo $establishment['postcode']; ?></td>
			<td><?php echo $establishment['town']; ?></td>
			<td><?php echo $establishment['user_id']; ?></td>
			<td><?php echo $establishment['academy_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'establishments', 'action' => 'view', $establishment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'establishments', 'action' => 'edit', $establishment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'establishments', 'action' => 'delete', $establishment['id']), null, __('Are you sure you want to delete # %s?', $establishment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Establishment'), array('controller' => 'establishments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($academy['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($academy['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['first_name']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['role']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
