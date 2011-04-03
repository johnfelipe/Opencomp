<?php

$this->set('stateStep0', 'terminee');
$this->set('stateStep1', 'terminee');
$this->set('stateStep2', 'encours');
$this->set('stateStep3', 'afaire');
$this->set('stateStep4', 'afaire');
$this->set('stateStep5', 'afaire');
?>

<p style="margin-top:0;">L'installateur va maintenant déterminer si certains dossiers de Opencomp sont accessibles en écriture. Si les dossiers qui doivent-être inscriptibles ne le sont pas, vous devrez changer leurs droits d'accès manuellement.</p>

<?php
    $check = true;

    // tmp is writable
    if (is_writable(TMP))
    {
        echo '<p class="succes message">' . __('Le répertoire tmp est inscriptible.', true) . '</p>';
    }
	else
	{
        $check = false;
        echo '<p class="erreur message">' . __('Votre répertoire tmp N\'EST PAS inscriptible.', true) . '</p>';
    }

    // config is writable
    if (is_writable(APP.'config'))
    {
        echo '<p class="succes message">' . __('Le répertoire config est inscriptible.', true) . '</p>';
    }
	else
    {
        $check = false;
        echo '<p class="erreur message">' . __('Le répertoire config N\'EST PAS inscriptible.', true) . '</p>';
    }

    // php version
    if (phpversion() > 5)
    {
        echo '<p class="succes message">' . sprintf(__('Version de PHP %s > 5', true), phpversion()) . '</p>';
    }
	else
	{
        $check = false;
        echo '<p class="erreur message">' . sprintf(__('Version de PHP %s < 5', true), phpversion()) . '</p>';
    }

    if ($check)
    {
		echo'<p class="bottomform" style="margin-bottom:0px;">';
			echo $html->link(__('> Suivant', true), array('action' => 'database'));
		echo'</p>';
    }
	else
	{
        echo '<p>' . __('L\'installation ne peut pas continuer tant que les prérequis n\'auront pas été satisfaits !', true) . '</p>';
		echo'<p class="bottomform" style="margin-bottom:0px;">';
			echo $html->link(__('Vérifier de nouveau', true), array('action' => 'database'));
		echo'</p>';
    }
?>
