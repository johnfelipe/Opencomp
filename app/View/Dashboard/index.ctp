<div class="page-title">
    <h2><?php echo __('Synthèse, votre tableau de bord personnel'); ?></h2>
</div>

<div class="row-fluid">
    <div class="span4">
    	<div class="well">
	    	<?php echo $this->Html->image('logo-opencomp.png', array('style' => 'height:100px; float: left;','alt' => 'Logo Opencomp')); ?>
	    	<div style="margin-top:25px; margin-bottom:20px;">Vous trouverez dans cette page l'essentiel pour vous permettre de démarrer rapidement avec Opencomp !</div>
    	</div>
    	
    	<h3 style="margin-bottom:20px;"><?php echo __('Vos classes'); ?></h3>	
    	
    	<?php if(!empty($classrooms)):
	    	foreach($classrooms as $classroom):
		    	echo '<div class="page-title"><h4>'.$classroom['Classroom']['title'].' à '.$classroom['Establishment']['name'].'</h4></div>'; ?>
			    <div class="row-fluid">
			    	<div class="span6"><?php echo $this->Html->link('<i class="icon-eye-open"></i> '.__('Voir les évaluations'), array('controller' => 'classrooms', 'action' => 'viewtests', $classroom['Classroom']['id']), array('class' => 'btn btn-large', 'escape' => false)); ?></div>
			    	<div class="span6"><?php echo $this->Html->link('<i class="icon-plus"></i> '.__('Nouvelle évaluation'), array('controller' => 'evaluations', 'action' => 'add', 'classroom_id' => $classroom['Classroom']['id']), array('class' => 'btn btn-large btn-success', 'style'=>'font-weight:normal;', 'escape' => false)); ?></div>
			    </div>
			    
	    	<?php endforeach;
    	endif; ?>    
    </div>
    
    <div class="span8">

    </div>
</div>