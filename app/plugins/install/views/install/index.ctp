<?php
$this->set('stateStep0', 'encours');
$this->set('stateStep1', 'afaire');
$this->set('stateStep2', 'afaire');
$this->set('stateStep3', 'afaire');
$this->set('stateStep4', 'afaire');
$this->set('stateStep5', 'afaire');
?>

<p style="margin-top:0px;">Cet assistant va vous aider à installer Opencomp sur votre serveur.</p>
<p>Dans le cas ou l'installation automatisée échouerait, nous vous invitons à consulter la <a href="http://zolotaya.isa-geek.com/redmine/projects/gnote/wiki">documentation d'Opencomp</a> pour connaître la marche à suivre pour installer l'application manuellement.</p>
<p>Cliquez sur "Suivant" pour démarrer la procédure d'installation.</p>
<p class="bottomform" style="margin-bottom:0px;">
	<?php echo $html->link('> Suivant', array('action' => 'licence')); ?>
</p>