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


<div class="page-title">
    <h3><?php echo count($ClassroomsPupil).' '.__('élève(s) associé(s) à cette classe'); ?></h3>
    <?php echo $this->Html->link('<i class="icon-plus"></i> '.__('ajouter un élève'), '/classroomspupils/add/classroom_id:'.$classroom['Classroom']['id'], array('class' => 'ontitle btn btn-success', 'escape' => false)); ?>
    <?php echo $this->Html->link('<i class="icon-arrow-down"></i> '.__('importer'), '/classroomspupils/import/classroom_id:'.$classroom['Classroom']['id'], array('class' => 'ontitle btn', 'escape' => false)); ?>
</div>
<?php if (!empty($ClassroomsPupil)): ?>
<table class="table table-striped table-condensed">
<tr>
	<th><?php echo __('Prénom'); ?></th>
	<th><?php echo __('Nom'); ?></th>
	<th><?php echo __('Sexe'); ?></th>
	<th><?php echo __('Date de naissance'); ?></th>
	<th><?php echo __('Niveau scolaire'); ?></th>
	<th class="actions"><?php echo __('Actions'); ?></th>
</tr>
<?php
	$i = 0;
	foreach ($ClassroomsPupil as $pupil): ?>
	<tr>
		<td><?php echo $pupil['Pupil']['first_name']; ?></td>
		<td><?php echo $pupil['Pupil']['name']; ?></td>
		<td><?php if($pupil['Pupil']['sex'] == 'M') echo 'Masculin'; else echo 'Féminin'; ?></td>
		<td><?php echo $this->Time->format("d/m/Y",$pupil['Pupil']['birthday']); ?></td>
		<td><?php echo $pupil['Level']['title']; ?></td>
		<td class="actions">
		<?php 
			echo $this->Html->link(
				'<i class="icon-pencil"></i> Modifier', 
				array(
					'controller' => 'classroomspupils', 
					'action' => 'edit', 
					'classroom_id' => $classroom['Classroom']['id'], 
					$pupil['Pupil']['id']
				), 
				array('escape' => false)
			); 
		?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php 
			echo $this->Html->link(
				'<i class="icon-trash"></i> Supprimer', 
				array(
					'controller' => 'classroomspupils', 
					'action' => 'unlink', 
					'classroom_id' => $classroom['Classroom']['id'], 
					$pupil['Pupil']['id']
				), 
				array('escape' => false),
				__('Êtes vous réellement sûr(e) de vouloir supprimer %s de cette classe ?', $pupil['Pupil']['first_name'].' '.$pupil['Pupil']['name'])
			); 
		 ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php else: ?>
<div class="alert alert-info">
	<i class="icon-info-sign"></i> Cette classe ne comporte encore aucun élève associé.<br />Vous pouvez ajouter des élèves manuellement (bouton vert à droite) ou les importer depuis une classe de l'année précédente.
</div>
<?php endif; ?>







<div class="related">
	<h3><?php echo __('Related Evaluations'); ?></h3>
	<?php if (!empty($classroom['Evaluation'])): ?>
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
		foreach ($classroom['Evaluation'] as $evaluation): ?>
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
<div class="related">
	<h3><?php echo __('Related Items'); ?></h3>
	<?php if (!empty($classroom['Item'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Competence Id'); ?></th>
		<th><?php echo __('Place'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Classroom Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($classroom['Item'] as $item): ?>
		<tr>
			<td><?php echo $item['id']; ?></td>
			<td><?php echo $item['title']; ?></td>
			<td><?php echo $item['competence_id']; ?></td>
			<td><?php echo $item['place']; ?></td>
			<td><?php echo $item['type']; ?></td>
			<td><?php echo $item['user_id']; ?></td>
			<td><?php echo $item['classroom_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'items', 'action' => 'view', $item['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'items', 'action' => 'edit', $item['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'items', 'action' => 'delete', $item['id']), null, __('Are you sure you want to delete # %s?', $item['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>