<div class="pupils view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pupil['Pupil']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nom'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pupil['Pupil']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Prenom'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pupil['Pupil']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sexe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pupil['Pupil']['sex']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date de naissance'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pupil['Pupil']['birthday']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Classe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pupil['Classroom']['title'], array('controller' => 'classrooms', 'action' => 'view', $pupil['Classroom']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editer cet élève', true), array('action' => 'edit', $pupil['Pupil']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Supprimer cet élève', true), array('action' => 'delete', $pupil['Pupil']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pupil['Pupil']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lister les élèves', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvel élève', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lister les classes', true), array('controller' => 'classrooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvelle classe', true), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
	</ul>
</div>
