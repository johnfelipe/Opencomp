<div class="page-title">
    <h2><?php echo __('Visualiser un établissement'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-pencil"></i> '.__('modifier'), 'edit/'.$establishment['Establishment']['id'], array('class' => 'ontitle btn btn-primary', 'escape' => false)); ?>
    <?php echo $this->Html->link('<i class="icon-arrow-left"></i> '.__('académie de l\'établissement'), 'index', array('class' => 'ontitle btn', 'escape' => false)); ?>
</div>

<div class="row">
    <div class="span6">
        <div class="well">
        	<dl class="dl-horizontal">
        		<dt><?php echo __('Nom de l\'école'); ?></dt>
        		<dd>
        			<?php echo h($establishment['Establishment']['name']); ?>
        			&nbsp;
        		</dd>
        		<dt><?php echo __('Adresse'); ?></dt>
        		<dd>
        			<?php echo h($establishment['Establishment']['address']); ?>
        			&nbsp;
        		</dd>
        		<dt><?php echo __('Code postal'); ?></dt>
        		<dd>
        			<?php echo h($establishment['Establishment']['postcode']); ?>
        			&nbsp;
        		</dd>
        		<dt><?php echo __('Ville'); ?></dt>
        		<dd>
        			<?php echo h($establishment['Establishment']['town']); ?>
        			&nbsp;
        		</dd>
        		<dt><?php echo __('Direction'); ?></dt>
        		<dd>
        			<?php echo $this->Html->link('<i class="icon-user"></i> '.$establishment['User']['first_name'].' '.$establishment['User']['name'], array('controller' => 'users', 'action' => 'view', $establishment['User']['id']), array('escape' => false)); ?>
        			&nbsp;
        		</dd>
        		<dt><?php echo __('Académie'); ?></dt>
        		<dd>
        			<?php echo $this->Html->link('<i class="icon-link"></i> '.$establishment['Academy']['name'], array('controller' => 'academies', 'action' => 'view', $establishment['Academy']['id']), array('escape' => false)); ?>
        			&nbsp;
        		</dd>
        	</dl>
        </div>
    </div>
    <div class="span6">
        <div class="page-title">
            <h3><?php echo __('Périodes de cet établissement'); ?></h3>
            <?php echo $this->Html->link('<i class="icon-plus"></i> '.__('ajouter une période'), '#myModal', array('data-toggle' => 'modal', 'class' => 'ontitle btn btn-success', 'escape' => false)); ?>
        </div>
    </div>
</div>

<div class="related">
	<h3><?php echo __('Related Classrooms'); ?></h3>
	<?php if (!empty($establishment['Classroom'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Year Id'); ?></th>
		<th><?php echo __('Establishment Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($establishment['Classroom'] as $classroom): ?>
		<tr>
			<td><?php echo $classroom['id']; ?></td>
			<td><?php echo $classroom['title']; ?></td>
			<td><?php echo $classroom['user_id']; ?></td>
			<td><?php echo $classroom['year_id']; ?></td>
			<td><?php echo $classroom['establishment_id']; ?></td>
			<td><?php echo $classroom['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'classrooms', 'action' => 'view', $classroom['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'classrooms', 'action' => 'edit', $classroom['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'classrooms', 'action' => 'delete', $classroom['id']), null, __('Are you sure you want to delete # %s?', $classroom['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Classroom'), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="related">
	<h3><?php echo __('Related Periods'); ?></h3>
	<?php if (!empty($establishment['Period'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Begin'); ?></th>
		<th><?php echo __('End'); ?></th>
		<th><?php echo __('Year Id'); ?></th>
		<th><?php echo __('Establishment Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($establishment['Period'] as $period): ?>
		<tr>
			<td><?php echo $period['id']; ?></td>
			<td><?php echo $period['begin']; ?></td>
			<td><?php echo $period['end']; ?></td>
			<td><?php echo $period['year_id']; ?></td>
			<td><?php echo $period['establishment_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'periods', 'action' => 'view', $period['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'periods', 'action' => 'edit', $period['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'periods', 'action' => 'delete', $period['id']), null, __('Are you sure you want to delete # %s?', $period['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>



<div class="modal fade hide" id="myModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3><?php echo __('Ajouter une période à cet établissement'); ?></h3>
  </div>
  <div class="modal-body">
    <?php
    echo $this->Form->create('Establishment', array(
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'div' => array('class' => 'control-group'),
            'between' => '<div class="controls">',
            'after' => '</div>',
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline'))
            )
        )
    );
    
    echo $this->Form->input('begin', array(
        'between' => '<div class="controls"><div class="input-append date datepicker" data-date="'.date('Y-m-d').'" data-date-format="yyyy-mm-dd">',
        'after' => '<span class="add-on"><i class="icon-calendar"></i></span></div></div>',
        'class' => 'span2',
        'readonly' => 'readonly',
        'label' => array(
            'text' => 'Date de début',
            'class' => 'control-label'
        )
    )); 
    
    echo $this->Form->input('end', array(
        'between' => '<div class="controls"><div class="input-append date datepicker" data-date="'.date('Y-m-d').'" data-date-format="yyyy-mm-dd">',
        'after' => '<span class="add-on"><i class="icon-calendar"></i></span></div></div>',
        'class' => 'span2',
        'readonly' => 'readonly',
        'label' => array(
            'text' => 'Date de fin',
            'class' => 'control-label'
        )
    ));  
    
    echo $this->Form->input('year_id', array(
        'label' => array(
            'text' => 'Année scolaire',
            'class' => 'control-label'
            )
        )
    );
    
    echo $this->Form->hidden('establishment_id', array('value' => $establishment['Establishment']['id']));
    
    ?>
    
  </div>
  <div class="modal-footer">
    <?php echo $this->Form->button('Ajouter', array('type' => 'submit', 'class' => 'btn btn-success')); ?>
  </div>
</div>
