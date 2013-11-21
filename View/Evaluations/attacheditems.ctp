<?php echo $this->element('EvaluationBase'); ?>

<ul class="nav nav-pills">
  <li class="active"><?php echo $this->Html->link(__('1. Définir les items évalués'), array('controller' => 'evaluations', 'action' => 'attacheditems', $evaluation['Evaluation']['id'])); ?></li>
  <li><?php echo $this->Html->link(__('2. Saisir les résultats'), array('controller' => 'evaluations', 'action' => 'manageresults', $evaluation['Evaluation']['id'])); ?></li>
  <li class="info" rel="tooltip" data-placement="bottom" data-original-title="Bientôt ..."><?php echo $this->Html->link(__('3. Analyser les résultats'), array('controller' => 'evaluations', 'action' => 'attacheditems', $evaluation['Evaluation']['id'])); ?></li>
</ul>

<div class="page-title">
    <h3><?php echo __('Items associés à cette évaluation'); ?></h3>
    <?php echo $this->Html->link('<i class="icon-plus"></i> '.__('ajouter un item évalué'), '/competences/attachitem/evaluation_id:'.$evaluation['Evaluation']['id'], array('class' => 'ontitle btn btn-success', 'escape' => false)); ?>
</div>

<?php if (!empty($items)): ?>
	<table class="table table-stripped table-condensed">
	<tr>
		<th><?php echo __('Libellé de l\'item évalué'); ?></th>
		<th class="actions"><?php echo __('Déplacer').' '; echo $this->Html->link('<i class="icon-question-sign"></i>', '#aboutMoveFunc', array('data-toggle' => 'modal', 'escape' => false)); ?></th>
		<th class="actions"><?php echo __('Action'); ?></th>
	</tr>
	<?php
		$nbitems = count($items);
		foreach ($items as $item): ?>	
		<tr>
			<td><?php echo $item['Item']['title']; ?></td>
			<td class="actions">
				<?php if($item['EvaluationsItem']['position'] == 1) $style = 'padding-left: 54px;'; else $style = null; ?>
				<?php if($item['EvaluationsItem']['position'] != 1) echo $this->Html->link('<i class="icon-arrow-up"></i> '.__('Monter'), '/evaluationsItems/moveup/evaluation_id:'.$item['EvaluationsItem']['evaluation_id'].'/item_id:'.$item['EvaluationsItem']['item_id'], array('escape' => false)); ?>&nbsp;&nbsp;
				<?php if($item['EvaluationsItem']['position'] != $nbitems) echo $this->Html->link('<i class="icon-arrow-down"></i> '.__('Descendre'), '/evaluationsItems/movedown/evaluation_id:'.$item['EvaluationsItem']['evaluation_id'].'/item_id:'.$item['EvaluationsItem']['item_id'], array('style' => $style, 'escape' => false)); ?>
			</td>
			<td class="actions">
				<?php echo $this->Form->postLink('<i class="icon-trash"></i> '.__('Supprimer'), array('controller' => 'evaluationsItems', 'action' => 'unlinkitem', 'item_id' => $item['EvaluationsItem']['item_id'], 'evaluation_id' => $evaluation['Evaluation']['id']), array('escape' => false), __('Êtes vous sûr(e) de vouloir dissocier cet item de cette évaluation ?', $item['EvaluationsItem']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php else: ?>
<div class="alert alert-info">
    <i class="icon-info-sign"></i> Pour le moment, vous n'avez associé aucun item à cette évaluation.<br />
    Vous devriez commencer par <?php echo $this->Html->link('<i class="icon-plus"></i> '.__('ajouter un item'), '/competences/attachitem/evaluation_id:'.$evaluation['Evaluation']['id'], array('class' => 'btn btn-xs btn-success', 'escape' => false)); ?> à cette évaluation.
</div>
<?php endif; ?>

<div class="modal fade" id="aboutMoveFunc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">À propos de la fonction déplacer</h4>
            </div>
            <div class="modal-body">
                <p>La fonction déplacer vous permet de modifier l'ordre dans lequel les items sont affichés dans cet écran de l'application et lors de la saisie des résultats. Vous pouvez modifier cet ordre à tout moment en cliquant sur monter où descendre.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">J'ai bien compris</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->