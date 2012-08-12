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
  <li class="active"><?php echo $this->Html->link(__('Items évalués'), array('controller' => 'evaluations', 'action' => 'attacheditems', $evaluation['Evaluation']['id'])); ?></li>
  <li><?php echo $this->Html->link(__('Résultats'), array('controller' => 'evaluations', 'action' => 'manageresults', $evaluation['Evaluation']['id'])); ?></li>
</ul>

<div class="page-title">
    <h3><?php echo __('Items associés à cette évaluation'); ?></h3>
    <?php echo $this->Html->link('<i class="icon-plus"></i> '.__('ajouter un item évalué'), '/competences/attachitem/evaluation_id:'.$evaluation['Evaluation']['id'], array('class' => 'ontitle btn btn-success', 'escape' => false)); ?>
</div>

<?php if (!empty($items)): ?>
	<table class="table table-stripped table-condensed">
	<tr>
		<th><?php echo __('Libellé de l\'item évalué'); ?></th>
		<th class="actions"><?php echo __('Déplacer').' '; echo $this->Html->link('<i class="icon-question-sign"></i>', '#myModal', array('data-toggle' => 'modal', 'escape' => false)); ?></th>
		<th class="actions"><?php echo __('Action'); ?></th>
	</tr>
	<?php
		$nbitems = count($items);
		foreach ($items as $item): ?>	
		<tr>
			<td><?php echo $item['Item']['title']; ?></td>
			<td class="actions">
				<?php if($item['EvaluationsItem']['position'] == 1) $style = 'padding-left: 54px;'; else $style = null; ?>
				<?php if($item['EvaluationsItem']['position'] != 1) echo $this->Html->link('<i class="icon-arrow-up"></i> '.__('Monter'), '/evaluationsitems/moveup/evaluation_id:'.$item['EvaluationsItem']['evaluation_id'].'/item_id:'.$item['EvaluationsItem']['item_id'], array('escape' => false)); ?>&nbsp;&nbsp;
				<?php if($item['EvaluationsItem']['position'] != $nbitems) echo $this->Html->link('<i class="icon-arrow-down"></i> '.__('Descendre'), '/evaluationsitems/movedown/evaluation_id:'.$item['EvaluationsItem']['evaluation_id'].'/item_id:'.$item['EvaluationsItem']['item_id'], array('style' => $style, 'escape' => false)); ?>
			</td>
			<td class="actions">
				<?php echo $this->Form->postLink('<i class="icon-trash"></i> '.__('Supprimer'), array('controller' => 'evaluationsitems', 'action' => 'unlinkitem', 'item_id' => $item['EvaluationsItem']['item_id'], 'evaluation_id' => $evaluation['Evaluation']['id']), array('escape' => false), __('Êtes vous sûr(e) de vouloir dissocier cet item de cette évaluation ?', $item['EvaluationsItem']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php else: ?>
<div class="alert alert-info">
    <i class="icon-info-sign"></i> Pour le moment, vous n'avez associé aucun item à cette évaluation.<br />
    Vous devriez commencer par <?php echo $this->Html->link('<i class="icon-plus"></i> '.__('ajouter un item'), '/competences/attachitem/evaluation_id:'.$evaluation['Evaluation']['id'], array('class' => 'btn btn-mini btn-success', 'escape' => false)); ?> à cette évaluation.
</div>
<?php endif; ?>

<div class="modal fade hide" id="myModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>À propos de la fonction déplacer</h3>
  </div>
  <div class="modal-body">
    <p>La fonction déplacer vous permet de modifier l'ordre dans lequel les items sont affichés dans cet écran de l'application et lors de la saisie des résultats. Vous pouvez modifier cet ordre à tout moment en cliquant sur monter où descendre.</p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">J'ai bien compris</a>
  </div>
</div>