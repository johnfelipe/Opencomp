<div class="page-title">
    <h2><?php echo __('Synthèse, votre tableau de bord personnel'); ?></h2>
</div>

<div class="row-fluid">
    <div class="span4">
    	<div class="well">
	    	<?php echo $this->Html->image('logo-opencomp.png', array('style' => 'height:100px; float: left;','alt' => 'Logo Opencomp')); ?>
	    	<div style="margin-top:25px; margin-bottom:20px;">Vous trouverez dans cette page l'essentiel pour vous permettre de démarrer rapidement avec Opencomp !</div>
    	</div>
    </div>
    <div class="span2">
    	<div class="well" style="height:105px;">
	    	<?php echo $this->Html->image('logo-opencomp.png', array('style' => 'height:100px; opacity:0.04; margin-left:15px; float: left;','alt' => 'Logo Opencomp')); ?>
    	</div>
    </div>
    <div class="span2">
    	<div class="well" style="height:105px;">
	    	<?php echo $this->Html->image('logo-opencomp.png', array('style' => 'height:100px; opacity:0.06; margin-left:15px; float: left;','alt' => 'Logo Opencomp')); ?>
    	</div>
    </div>
    <div class="span2">
    	<div class="well" style="height:105px;">
	    	<?php echo $this->Html->image('logo-opencomp.png', array('style' => 'height:100px; opacity:0.08; margin-left:15px; float: left;','alt' => 'Logo Opencomp')); ?>
    	</div>
    </div>
    <div class="span2">
    	<div class="well" style="height:105px;">
	    	<?php echo $this->Html->image('logo-opencomp.png', array('style' => 'height:100px; opacity:0.1; margin-left:15px; float: left;','alt' => 'Logo Opencomp')); ?>
    	</div>
    </div>
</div>
	
<?php if(!empty($classrooms)):
	foreach($classrooms as $classroom): ?>

<div class="row-fluid page-title">
	<h3 style='font-family: "Titillium Web",Helvetica,Arial,sans-serif;'>
    	<?php echo $classroom['Classroom']['title'] ?> à <?php echo $classroom['Establishment']['name'] ?>
    </h3>
</div>
<div class="row-fluid">
	<div class="span4">		   	
    	<div class="row-fluid">
	    	<div class="span6">
	    		<?php echo $this->Html->link('<i class="icon-user"></i> '.__('Voir les élèves'), 
	    		array(
    				'controller' => 'classrooms', 
    				'action' => 'view', 
    				$classroom['Classroom']['id']
    			), 
    			array(
    				'class' => 'btn btn-large btn-block', 
    				'escape' => false
    			)); ?>
    		</div>		    	
	    	<div class="span6">
	    		<?php echo $this->Html->link('<i class="icon-cog"></i> '.__('Générer bulletins'), 
	    		array(
		    		'controller' => 'results', 
		    		'action' => 'viewbul', 
		    		'period_id' => 4,
		    		$classroom['Classroom']['id']
	    		), 
	    		array(
		    		'class' => 'btn btn-large btn-block', 
		    		'style'=>'font-weight:normal; margin-bottom:10px;', 
		    		'escape' => false
	    		)); ?>
	    	</div>
	    </div>		    
	    <div class="row-fluid">
	    	<div class="span6">
	    		<?php echo $this->Html->link('<i class="icon-eye-open"></i> '.__('Voir les évaluations'), 
	    		array(
		    		'controller' => 'classrooms', 
		    		'action' => 'viewtests', 
		    		$classroom['Classroom']['id']
	    		), 
	    		array(
		    		'class' => 'btn btn-large btn-block', 
		    		'escape' => false
	    		)); ?>
	    	</div>
	    	
	    	<div class="span6">
		    	<?php echo $this->Html->link('<i class="icon-plus"></i> '.__('Nouvelle évaluation'), 
		    	array(
			    	'controller' => 'evaluations', 
			    	'action' => 'add', 
			    	'classroom_id' => $classroom['Classroom']['id']
		    	), 
		    	array(
			    	'class' => 'btn btn-large btn-block btn-success', 
			    	'style'=>'font-weight:normal; margin-bottom:20px;', 
			    	'escape' => false
		    	)); ?>
	    	</div>
	    </div>
	</div>

		<?php
		foreach ($classroom['Evaluation'] as $evaluation): ?>
		
		<?php 
			$total = count($evaluation['Item'])*count($evaluation['Pupil']);
			$results = count($evaluation['Result']);
			$lines = array();
			if($total != $results){
				$line = '<li style="line-height:23px;">Saisie des résultats incomplète pour <code>'.$evaluation['title'].'</code>';
				$line .= $this->Html->link('<i class="icon-magic"></i>Corriger', 
	    		array(
		    		'controller' => 'evaluations', 
		    		'action' => 'manageresults', 
		    		$evaluation['id']
	    		),
	    		array(
	    			'style' => 'float:right; ',
	    			'escape' => false
	    		));
				$line .= '</li>';
				$lines[] = $line;
			}
		endforeach; ?>
		<?php if(count($lines) > 0): ?>
		<div class="span8">
		<div class="alert alert-error">
		  <h4 style='margin-bottom:10px;'><i class="icon-pushpin"></i><strong> Des éléments nécessitent votre attention !</strong></h4>
		  <ul>
		  	<?php foreach($lines as $line){
			  	echo $line;
		  	}
		  	?>
		  </ul>
		</div>
		<?php else: ?>
		<div class="span8">
		<div class="alert alert-success">
		  <p class="lead" style="margin-bottom:0px;"><i class="icon-ok"></i> Tous les vérifications automatiques ont réussi ;)</p>
		</div>
		<?php endif; ?>
	</div>
</div>	

<?php endforeach;
endif; ?>