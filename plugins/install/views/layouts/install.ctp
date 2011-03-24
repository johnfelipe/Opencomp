<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $title_for_layout; ?> - <?php __('Opencomp | Installation'); ?></title>
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
                    <?php
                    echo $session->flash();
                    echo $content_for_layout;
                    ?>
                </div>
	</div>
        
    	<div id="pied_de_page">
            <p style="color:#4A4A4A;">Opencomp est distribué dans l'espoir qu'il sera utile, mais SANS AUCUNE GARANTIE.<br />
            Pour plus d'informations, reportez vous à la licence GNU/AGPL.</p>
        </div>
    </body>
</html>
