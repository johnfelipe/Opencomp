<div class="page-title">
    <h2><?php echo __('Associer un item à une évaluation'); ?></h2>
    <div class="btn-toolbar">
		<div class="btn-group ontitle">
			<?php echo $this->Html->link('<i class="icon-resize-full"></i> '.__('Déplier l\'arbre'), '#', array('class' => 'btn', 'escape' => false, 'onclick' => "$('#demo1').jstree('open_all', -1, true);")); ?>
			<?php echo $this->Html->link('<i class="icon-resize-small"></i> '.__('Replier l\'arbre'), '#', array('class' => 'btn', 'escape' => false, 'onclick' => "$('#demo1').jstree('close_all', -1, true);")); ?>
		</div>
		<?php echo $this->Html->link('<i class="icon-arrow-left"></i> '.__('retour à l\'évaluation'), 'index', array('class' => 'ontitle btn', 'escape' => false)); ?>
	</div>
</div>

<div class="alert alert-info">
  Vous êtes sur le point d'ajouter un item évalué à l'évaluation “<strong><?php echo h($eval['Evaluation']['title']) ?></strong>”.<br /><br />

  	Pour ajouter un item, dépliez les branches de l'arbre jusqu'à atteindre l'item souhaité et cliquez sur <span style="color:blue;"><i class="icon-ok"></i> ajouter à l'évaluation.</span><br />
  	Si l'item que vous avez évalué n'est pas encore présent dans l'arbre dépliez les branches jusqu'à atteindre la compétence souhaitée et cliquez sur <span style="color:green;"><i class="icon-plus"></i> nouvel item</span>.

</div>

<div id="demo1" class="jstree-default">
<?php echo $this->Tree->generate($stuff, array('element' => 'competences_attachitem'));  ?>
</div>