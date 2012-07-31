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
  <li class="active"><?php echo $this->Html->link(__('Items évalués'), array('controller' => 'evaluations', 'action' => 'attachitems', $evaluation['Classroom']['id'])); ?></li>
  <li><?php echo $this->Html->link(__('Résultats'), array('evaluations' => 'classrooms', 'action' => 'manageresults', $evaluation['Classroom']['id'])); ?></li>
</ul>

<div class="page-title">
    <h3><?php echo __('Items associés à cette évaluation'); ?></h3>
    <?php echo $this->Html->link('<i class="icon-plus"></i> '.__('ajouter un item évalué'), '/competences/attachitem/evaluation_id:'.$evaluation['Evaluation']['id'], array('class' => 'ontitle btn btn-success', 'escape' => false)); ?>
</div>

<?php if (!empty($evaluation['Item'])): ?>
	<table class="table table-stripped table-condensed">
	<tr>
		<th><?php echo __('Libellé de l\'item évalué'); ?></th>
		<th class="actions"><?php echo __('Action'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($evaluation['Item'] as $item): ?>
		<tr>
			<td><?php echo $item['title']; ?></td>
			<td class="actions">
				<?php echo $this->Form->postLink('<i class="icon-trash"></i> '.__('Supprimer'), array('controller' => 'evaluationsitems', 'action' => 'unlinkitem', 'item_id' => $item['id'], 'evaluation_id' => $evaluation['Evaluation']['id']), array('escape' => false), __('Êtes vous sûr(e) de vouloir dissocier cet item de cette évaluation ?', $item['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>