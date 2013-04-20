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
  <li class="active"><?php echo $this->Html->link(__('Items non évalués'), array('controller' => 'classrooms', 'action' => 'viewunrateditems', $classroom['Classroom']['id'])); ?></li>
  <li><?php echo $this->Html->link(__('Bulletins'), array('controller' => 'classrooms', 'action' => 'viewreports', $classroom['Classroom']['id'])); ?></li>
</ul>

<div class="page-title">
    <h3><?php echo __('Items travaillés mais non évalués'); ?></h3>
    <?php echo $this->Html->link('<i class="icon-plus"></i> '.__('ajouter un item'), '#myModal', array(
    'class' => 'ontitle btn btn-success', 
    'data-toggle' => 'modal',
    'escape' => false
    )); ?>
</div>


<?php if (!empty($classroom['Evaluation'])): ?>
<table class="table table-striped table-condensed">
<tr>
	<th><?php echo __('Période'); ?></th>
	<th><?php echo __('Libellé de l\'item'); ?></th>
	<th class="actions"><?php echo __('Actions'); ?></th>
</tr>
<?php
	$i = 0;
	foreach ($classroom['Evaluation'] as $evaluations): 
	foreach ($evaluations['Item'] as $item):?>
	
	<tr>
		<td><?php echo h($evaluations['Period']['wellnamed']); ?></td>
		<td><?php echo h($item['title']); ?></td>		
		<td class="actions">
			
		</td>
	</tr>
	<?php endforeach; ?>
<?php endforeach; ?>
</table>
<?php endif; ?>




<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Quelle période pour cet item ?</h3>
  </div>
  <div class="modal-body"> <?php
  		echo $this->Form->create(null, array(
		    'url' => array('controller' => 'competences', 'action' => 'attachunrateditem')
		));
		echo $this->Form->input('period_id', array(
		    'label' => array(
		        'text' => 'Période associée',
		        'class' => 'control-label'
		        )
		    )
		);
		echo $this->Form->hidden('classroom_id',array('value' => $classroom['Classroom']['id']));
  ?> </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
    <?php echo $this->Form->submit('Valider', array('class'=>'btn btn-primary', 'div'=>false)); ?>
  </div>
</div>