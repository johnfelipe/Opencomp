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
  <li class="active"><?php echo $this->Html->link(__('Évaluations'), array('controller' => 'classrooms', 'action' => 'viewtests', $classroom['Classroom']['id'])); ?></li>
  <li><?php echo $this->Html->link(__('Items non évalués'), array('controller' => 'classrooms', 'action' => 'viewunrateditems', $classroom['Classroom']['id'])); ?></li>
  <li><?php echo $this->Html->link(__('Bulletins'), array('controller' => 'results', 'action' => 'parambul', $classroom['Classroom']['id'])); ?></li>
</ul>

<div class="page-title">
    <h3><?php echo count($classroom['Evaluation']).' '.__('évaluation(s) associée(s) à cette classe'); ?></h3>
    <?php echo $this->Html->link('<i class="icon-plus"></i> '.__('ajouter une évaluation'), '/evaluations/add/classroom_id:'.$classroom['Classroom']['id'], array('class' => 'ontitle btn btn-success', 'escape' => false)); ?>
    <div class="btn-group ontitle">
	  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
	    <i class="icon-filter"></i> Filtrer
	    <span class="caret"></span>
	  </a>
	  <ul class="dropdown-menu">
	    <li><?php echo $this->Html->link('<i class="icon-reorder"></i> '.__('afficher toutes les périodes'), '/classrooms/viewtests/'.$classroom['Classroom']['id'].'/periods:all', array('escape' => false)); ?></li>
	  </ul>
	</div>
</div>

<?php if (!empty($classroom['Evaluation'])): ?>
<table class="table table-striped table-condensed">
<tr>
	<th><?php echo __('Identifiant'); ?></th>
	<th><?php echo __('Titre de l\'évaluation'); ?></th>
	<th><?php echo __('Évalué par'); ?></th>
	<th class="actions"><?php echo __('Progression de la saisie'); ?></th>
	<th class="actions"><?php echo __('Actions'); ?></th>
</tr>
<?php
	$i = 0;
	foreach ($classroom['Evaluation'] as $evaluation): ?>
	<tr>
		<td><?php echo '#'.$evaluation['id']; ?></td>
		<td><?php echo $this->Html->link($evaluation['title'], array('controller' => 'evaluations', 'action' => 'attacheditems', $evaluation['id'])); ?></td>
		<td><?php echo $evaluation['User']['first_name'].' '.$evaluation['User']['name']; ?></td>
		<td class="actions" style="padding-right:40px">
			<?php 
				$total = count($evaluation['Item'])*count($evaluation['Pupil']);
				if($total != 0){
					$progress = (count($evaluation['Result'])*100)/$total; 
				}else{
					$progress = 0; 
				}
			?>
			<div style="height:10px; margin-top:4px; margin-bottom:0px;" class="progress active"><div class="bar" style="font-size: 10px; vertical-align:top; width: <?php echo $progress; ?>%;"><span style="position:relative; top: -4px;"><?php if(intval($progress) > 10) echo intval($progress).'%'; ?></span></div></div>
		</td>
		<td class="actions">
			<div class="btn-group">
	          <button class="btn btn-mini dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i> Actions <span class="caret"></span></button>
	          <ul class="dropdown-menu">
	            <li><li><?php echo $this->Html->link('<i class="icon-list"></i> '.__('Associer des items'), array('controller' => 'evaluations', 'action' => 'attacheditems', $evaluation['id']), array('escape' => false)); ?></li></li>
	            <?php if($progress > 0 && count($evaluation['Item']) > 0): ?>
	            <li><li><?php echo $this->Html->link('<i class="icon-bar-chart"></i> '.__('Poursuivre la saisie des résultats'), array('controller' => 'evaluations', 'action' => 'manageresults', $evaluation['id']), array('escape' => false)); ?></li></li>
	            <?php elseif($progress == 0 && count($evaluation['Item']) > 0): ?>
	            <li><li><?php echo $this->Html->link('<i class="icon-bar-chart"></i> '.__('Commencer la saisie des résultats'), array('controller' => 'evaluations', 'action' => 'manageresults', $evaluation['id']), array('escape' => false)); ?></li></li>
	            <?php endif; ?> 
	            <li class="divider"></li>
	            <li><?php echo $this->Html->link('<i class="icon-pencil"></i> '.__('Modifier'), array('controller' => 'evaluations', 'action' => 'edit', $evaluation['id']), array('escape' => false)); ?></li>
	            <li><?php echo $this->Form->postLink('<i class="icon-trash"></i> '.__('Supprimer'), array('controller' => 'evaluations', 'action' => 'delete', $evaluation['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $evaluation['id'])); ?></li>

	          </ul>
	        </div>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>