<div class="page-title">
    <h2><?php echo __('Visualiser une classe'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-pencil"></i> '.__('modifier'), 'edit/'.$classroom['Classroom']['id'], array('class' => 'ontitle btn btn-primary', 'escape' => false)); ?>
    <?php echo $this->Html->link('<i class="icon-arrow-left"></i> '.__('établissement de la classe'), '/establishments/view/'.$classroom['Establishment']['id'], array('class' => 'ontitle btn', 'escape' => false)); ?>
</div>

<div class="row">
    <div class="span6">
        <div class="well">
        	<dl class="dl-horizontal">
        		<dt><?php echo __('Nom de la classe'); ?></dt>
        		<dd>
        			<?php echo h($classroom['Classroom']['title']); ?>
        			&nbsp;
        		</dd>
        		<dt><?php echo __('Enseignant titulaire'); ?></dt>
        		<dd>
        			<?php echo $this->Html->link('<i class="icon-user"></i> '.$classroom['User']['first_name'].' '.$classroom['User']['name'], array('controller' => 'users', 'action' => 'view', $classroom['User']['id']), array('escape' => false)); ?>
        			&nbsp;
        		</dd>
        		<dt><?php echo __('Établissement'); ?></dt>
        		<dd>
        			<?php echo $this->Html->link('<i class="icon-home"></i> '.$classroom['Establishment']['name'], array('controller' => 'establishments', 'action' => 'view', $classroom['Establishment']['id']), array('escape' => false)); ?>
        			&nbsp;
        		</dd>
        		<dt><?php echo __('Année scolaire'); ?></dt>
        		<dd>
        			<?php echo h($classroom['Year']['title']); ?>
        			&nbsp;
        		</dd>
           	</dl>
        </div>
    </div>
    <div class="span6">
        <div class="page-title">
            <h3><?php echo __('Intervenants de cette classe'); ?></h3>
        </div>
        
        <?php if (!empty($classroom['User'][1])): ?>
		<table class="table table-striped table-condensed">
		<tr>
			<th><?php echo __('Identifiant'); ?></th>
			<th><?php echo __('Prénom'); ?></th>
			<th><?php echo __('Nom'); ?></th>
			<th><?php echo __('Rôle'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($classroom['User'] as $user): 
			if(is_array($user)): ?>		
				<tr>
					<td><?php echo $user['username']; ?></td>
					<td><?php echo $user['first_name']; ?></td>
					<td><?php echo $user['name']; ?></td>
					<td><?php echo $user['role']; ?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
					</td>
				</tr>
			<?php endif; ?>
		<?php endforeach; ?>
		</table>
		<?php else: ?>
		<div class="alert alert-info">
	    	<i class="icon-info-sign"></i> Vous pouvez associer un utilisateur existant à cette classe en la <a href="/Opencomp/classrooms/edit/<?php echo $classroom['Classroom']['id']; ?>">modifiant</a>.
	    </div>
		<?php endif; ?>
        
    </div>  
</div>

<ul class="nav nav-pills">
  <li><?php echo $this->Html->link(__('Élèves'), array('controller' => 'classrooms', 'action' => 'view', $classroom['Classroom']['id'])); ?></li>
  <li><?php echo $this->Html->link(__('Évaluations'), array('controller' => 'classrooms', 'action' => 'viewtests', $classroom['Classroom']['id'])); ?></li>
  <li><?php echo $this->Html->link(__('Items non évalués'), array('controller' => 'classrooms', 'action' => 'viewunrateditems', $classroom['Classroom']['id'])); ?></li>
  <li class="active"><?php echo $this->Html->link(__('Bulletins'), array('controller' => 'results', 'action' => 'parambul', $classroom['Classroom']['id'])); ?></li>
</ul>

<div class="page-title">
    <h3><?php echo __('Générer les bulletins de cette classe'); ?></h3>
</div>

<?php
echo $this->Form->create(null, array(
		    'url' => array('controller' => 'results', 'action' => 'parambul', $classroom['Classroom']['id'])
		));
		echo $this->Form->label('period_id', 'Periode(s) associée(s)');
		echo $this->Form->select('period_id', $periods,
		    array(
		    	'multiple' => 'checkbox', 'required'
		    )
		);
		echo $this->Form->error('Result.period_id'); 
		$options = array(
			'class' => 'btn btn-large btn-primary',
		    'label' => __('Générer'),
		    'escape' => false,
		    'div' => false
		);
		echo $this->Form->end($options);
?>

