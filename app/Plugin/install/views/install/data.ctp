<?php

	$this->set('stateStep0', 'terminee');
	$this->set('stateStep1', 'terminee');
	$this->set('stateStep2', 'terminee');
	$this->set('stateStep3', 'terminee');
	$this->set('stateStep32', 'encours');
	$this->set('stateStep4', 'afaire');
	$this->set('stateStep5', 'afaire');
?>

<p style="margin-top:0px;">Lors de cette étape, l'installeur crée l'ensemble des tables nécessaires à la bonne exécution d'Opencomp.</p>
<p>Cliquez sur "Peupler la base de données" pour démarrer la procédure.</p>
<p class="bottomform" style="margin-bottom:0px;">

<?php
	echo $html->link(__('> Peupler la base de données', true), array(
		'plugin' => 'install',
		'controller' => 'install',
		'action' => 'data',
		'run' => 1,
	));
?>

</p>
