<div class="page-title">
    <h2><?php echo __('Détails d\'une évaluation'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-pencil"></i> '.__('modifier'), 'edit/'.$evaluation['Evaluation']['id'], array('class' => 'ontitle btn btn-primary', 'escape' => false)); ?>
    <?php echo $this->Html->link('<i class="icon-arrow-left"></i> '.__('retour à la classe'), '/classrooms/viewtests/'.$evaluation['Classroom']['id'], array('class' => 'ontitle btn', 'escape' => false)); ?>
</div>

<div class="row">
    <div class="span6">
        <div class="well">
        	<dl class="dl-horizontal">
        		<dt><?php echo __('Identifiant'); ?></dt>
        		<dd>
        			<?php echo h('#'.$evaluation['Evaluation']['id']); ?>
        			&nbsp;
        		</dd>
        		<dt><?php echo __('Titre'); ?></dt>
				<dd>
					<?php echo h($evaluation['Evaluation']['title']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Classe'); ?></dt>
				<dd>
					<?php echo $this->Html->link($evaluation['Classroom']['title'], array('controller' => 'classrooms', 'action' => 'view', $evaluation['Classroom']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Évalué par'); ?></dt>
				<dd>
					<?php echo $this->Html->link('<i class="icon-user"></i>&nbsp;'.$evaluation['User']['first_name'].'&nbsp;'.$evaluation['User']['name'], array('controller' => 'users', 'action' => 'view', $evaluation['User']['id']), array('escape' => false)); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Période'); ?></dt>
				<dd>
					<?php echo $this->Html->link($evaluation['Period']['begin'], array('controller' => 'periods', 'action' => 'view', $evaluation['Period']['id'])); ?>
					&nbsp;
				</dd>
           	</dl>
        </div>
    </div>
    <div class="span6">
        <div class="page-title">
            <h3><?php echo __('Élèves ayant commis cette évaluation'); ?></h3>
        </div>
        
        <?php
        	$pupils = '';
        	foreach($evaluation['Pupil'] as $pupil){
	        	$pupils .= $pupil['first_name'].'&nbsp;'.$pupil['name'].', ';
        	}
        	$pupils = substr($pupils, 0, -2);
        	$pupils .= '.';
        	echo $pupils;
        ?>      
        
    </div>
</div>

<ul class="nav nav-pills">
  <li><?php echo $this->Html->link(__('Items évalués'), array('controller' => 'evaluations', 'action' => 'attacheditems', $evaluation['Evaluation']['id'])); ?></li>
  <li class="active"><?php echo $this->Html->link(__('Résultats'), array('controller' => 'evaluations', 'action' => 'manageresults', $evaluation['Evaluation']['id'])); ?></li>
</ul>

<div class="page-title">
    <h3><?php echo __('Résultats de cette évaluation'); ?></h3>
    <?php echo $this->Html->link('<i class="icon-magic"></i> '.__('saisie automagique'), '/results/selectpupil/evaluation_id:'.$evaluation['Evaluation']['id'], array('class' => 'ontitle btn btn-primary', 'escape' => false)); ?>
</div>

<?php if (!empty($evaluation['Pupil'])): ?>
	<table class="table table-stripped table-condensed">
	<tr>
		<th style="width:20%;"><?php echo __('Prénom'); ?></th>
		<th style="width:20%;"><?php echo __('Nom'); ?></th>
		<th style="width:20%;"><?php echo __('Progression de la saisie'); ?></th>
		<th style="width:20%;"><?php echo __('Action'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($evaluation['Pupil'] as $pupil): ?>
		<tr>
			<td><?php echo $pupil['first_name']; ?></td>
			<td><?php echo $pupil['name']; ?></td>
			<td style="padding-right:5%;"><div style="height:10px; margin-top:4px; margin-bottom:0px;" class="progress active"><div class="bar" style="width: 40%;"></div></div></td>
			<td class="actions">
				<?php echo $this->Form->postLink('<i class="icon-pencil"></i> '.__('Compléter ou modifier la saisie'), array('controller' => 'results', 'action' => 'edit', 'pupil_id' => $pupil['id'], 'evaluation_id' => $evaluation['Evaluation']['id']), array('escape' => false)); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>