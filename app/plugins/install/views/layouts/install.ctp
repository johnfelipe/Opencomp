<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php __('Opencomp | Installation '); ?>- <?php echo $title_for_layout; ?></title>
    <?php
        echo $html->css('/install/css/style');
        echo $scripts_for_layout;
    ?>
</head>

    <body>
        <div id="page">
                <div id="en_tete">
   	    	    <p>Installation automatisée de Opencomp ...</p>
    			</div>

                <div id="corps">

                    <div id="menu">
                    <fieldset>
                        <legend>Étapes</legend>
    	    			<ul>
                            <li class=<?php echo $stateStep0 ?>>Bienvenue</li>
                            <li class=<?php echo $stateStep1 ?>>Licence utilisateur</li>
                            <li class=<?php echo $stateStep2 ?>>Configuration minimale</li>
                            <li class=<?php echo $stateStep3 ?>>Connexion à la <acronym title="Base de données">BDD</acronym></li>
                            <li class=<?php echo $stateStep4 ?>>Identifiant administrateur</li>
                            <li class=<?php echo $stateStep5 ?>>Fin de l'installation</li>
                        </ul>
                    </fieldset>
                	</div>

    	    	<fieldset style="padding:15px;">
		            <legend><?php echo $title_for_layout; ?></legend>
                    <?php
                    echo $content_for_layout;
                    ?>
	    	    </fieldset>
            	</div>
	</div>

    	<div id="pied_de_page">
            <p style="color:#4A4A4A;">Opencomp est distribué dans l'espoir qu'il sera utile, mais SANS AUCUNE GARANTIE.<br />
            Pour plus d'informations, reportez vous à la licence GNU/AGPL.</p>
        </div>
    </body>
</html>
