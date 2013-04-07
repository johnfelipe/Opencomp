<div class="page-title">
    <h2><?php echo __('Modifier les paramètres de génération d\'un bulletin'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-remove"></i> '.__('annuler modification'), '/classrooms/viewreports/'.$classroom_id, array('class' => 'ontitle btn btn-danger', 'escape' => false)); ?>
</div>

<?php

echo $this->Form->create('Report', array(
    'class' => 'form-horizontal')
);

echo $this->Form->input('id');

echo $this->Form->input('title', array(
    'label' => array(
        'text' => 'Titre du bulletin',
        'class' => 'control-label'
    ),
    'after' => '<span style="font-style: italic; margin-top:10px;" class="help-block"><i class="icon-lightbulb"></i> '.__("Le titre vous permet d'identifier le bulletin mais n'est pas utilisé pour la génération du document").'</span>',
));

echo $this->Form->input('period_id', array(
			'error' => array('escape' => false, 'multiple' => '<i class="icon-warning-sign"></i> '.__('Vous devez sélectionner au moins une période !')),
	    	'type' => 'select',
	    	'multiple' => 'checkbox', 
	    	'options' => $periods,
	    	'label' => 'Période(s) à générer'
	    ));

echo $this->Form->input('header', array(
    'label' => array(
        'text' => 'En-tête de première page',
        'class' => 'control-label'
    ),
    'class' => 'input-xxlarge',
    'append' => array('<i class="icon-bolt"></i>', array('wrap' => 'a', 'class' => 'btn', 'onclick'=>'$("#ReportHeader").val("Résultats scolaires du ___ trimestre pour #PRENOM# #NOM#");
')),
    'after' => '<span style="font-style: italic; margin-top:10px;" class="help-block"><i class="icon-lightbulb"></i> '.__("Vous pouvez utiliser #NOM# et #PRENOM# pour insérer le nom et le prénom de l'élève<br />Par exemple, vous pouvez taper : Résultats scolaires du 1er trimestre pour #PRENOM# #NOM#").'</span>',
));

echo $this->Form->input('footer', array(
    'label' => array(
        'text' => 'Pied de page',
        'class' => 'control-label'
    ),
    'class' => 'input-xxlarge',
    'append' => array('<i class="icon-bolt"></i>', array('wrap' => 'a', 'class' => 'btn', 'onclick'=>'$("#ReportFooter").val("Résultats scolaires du ___ trimestre pour #PRENOM# #NOM# - Page ");')),
    'after' => '<span style="font-style: italic; margin-top:10px;" class="help-block"><i class="icon-lightbulb"></i> '.__("Vous pouvez utiliser #NOM# et #PRENOM# pour insérer le nom et le prénom de l'élève.<br />Le numéro de page courante sera automatiquement inséré en fin de ligne.<br />Par exemple, vous pouvez taper : Résultats scolaire du 1er trimestre pour #PRENOM# #NOM# - Page ").'</span>',
));

echo $this->Form->input('page_break', array(
    'label' => array(
        'text' => 'Insérer saut de page avant',
        'class' => 'control-label'
    ),
    'data-placeholder' => 'Cliquez pour choisir les compétences avant lesquelles il faut insérer un saut de page',
    'options' => $competences,
    'multiple' => "multiple",
    'class' => 'input-xxlarge chzn-select',
    'after' => '<span style="font-style: italic; margin-top:10px;" class="help-block"><i class="icon-lightbulb"></i> '.__("Dans certains cas, il peut être utile d'insérer des sauts de pages avants certaines catégories de compétences pour améliorer la mise en page.").'</span>',
));

echo $this->Form->input('duplex_printing', array(
    'label' => array(
        'text' => 'Prêt pour le recto-verso',
        'class' => 'control-label'
    ),
    'class' => 'input-xxlarge',
    'after' => '<span style="font-style: italic; margin-top:30px; margin-left:-17px;" class="help-block"><i class="icon-lightbulb"></i> '.__("Si vous cochez la case, des pages blanches seront insérées automatiquement au PDF pour permettre l'impression recto-vero.").'</span>',
));

echo $this->Form->hidden('classroom_id', array('value' => $classroom_id));


?>

<div class="form-actions">
     <?php echo $this->Form->button('Enregistrer les modifications', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>        
</div>