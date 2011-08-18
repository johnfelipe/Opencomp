<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php __('Opencomp | '); ?>
        <?php echo $title_for_layout; ?>
    </title>

    <?php

        echo $this->Html->meta('icon');

        echo $this->Html->css('opencomp.generic');
        echo $this->Html->css('opencomp.buttons');
        echo $this->Html->css('opencomp.jqueryui');
        echo $this->Html->css('chosen');

        echo $this->Html->css('http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin');

        echo $this->Html->script('jquery');
        echo $this->Html->script('jquery-ui');
        echo $this->Html->script('chosen.jquery.min.js');
    ?>

    <script type="text/javascript">
    <?php

    $haveMessageToDeliver = $session->read('Message.flash.message');

    if (isset($haveMessageToDeliver))
    {
    ?>
    $(document).ready(function() {
        $( "#message" ).delay(10000).hide( 'highlight', { times:5 }, 1000);
    });
    <?php
    }

    ?>


    $(document).ready(function() {
        $(".chzn-select").chosen();
    });

    $(function() {
    $(".sortable").sortable({
        placeholder: "fond",
        update : function(){
        var order = $(".sortable").sortable("serialize");
        $(".maj").load("ajax.php?",order);
        }
    })
    $(".sortable").disableSelection();
    });
    </script>
</head>
<body>
    <div id="wrap">

        <div id="en_tete">

                <?php echo $html->image('logo.png', array('alt' => 'Opencomp logo', 'class' => 'logo_entete'))?>

                <div class="titre_entete">Opencomp</div>
                <div class="description_entete"><?php echo __('Gestion de résultats scolaires par navigateur',true); ?><span class ="description_entete" style="font-size:x-small"><?php echo __('et bien plus encore !',true); ?></span></div>

                <div class="info-connect_entete">

                    <?php
                    function datefr()
                    {
                            $jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
                            $mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
                            $datefr = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");
                            return __('Nous sommes le ',true). $datefr;
                    }
                    ?>
                    <span style="float:right;"><?php echo datefr(); ?></span><br />
                    <div style="padding-top:5px;"><?php echo __('Bienvenue,',true); ?> <?php echo $session->read('Auth.User.first_name').' '. $session->read('Auth.User.name') ?> | <?php echo $html->link(__('Se déconnecter',true),array('controller'=>'users', 'action'=>'logout')) ?></div>
                </div>

        </div>

        <ul id="tabnav">
            <?php
            if($this->params['controller'] == 'pages')
                echo '<li class="active">';
            else
                echo '<li class="tab1">';

            echo $this->Html->link(__('Tableau de bord',true),array(
                    'controller'=>'pages',
                    'action'=>'display',
                    'home')); ?>
            </li>
        <?php
            if($this->params['controller'] == 'academies')
                echo '<li class="active">';
            else
                echo '<li class="tab2">';
            ?>
                <?php echo $this->Html->link(__('Académies',true),array(
                    'controller'=>'academies',
                    'action'=>'index')); ?>
            </li>
        <?php
            if($this->params['controller'] == 'establishments')
                echo '<li class="active">';
            else
                echo '<li class="tab2">';
            ?>
                <?php echo $this->Html->link(__('Établissements scolaires',true),array(
                    'controller'=>'establishments',
                    'action'=>'index')); ?>
            </li>
            <?php
            if($this->params['controller'] == 'pupils')
                echo '<li class="active">';
            else
                echo '<li class="tab2">';
            ?>
                <?php echo $this->Html->link(__('Élèves et classes',true),array(
                    'controller'=>'pupils',
                    'action'=>'index')); ?>
            </li>
            <?php
            if($this->params['controller'] == 'competences')
                echo '<li class="active">';
            else
                echo '<li class="tab3">';

            echo $this->Html->link(__('Référentiel de compétences',true),array(
                    'controller'=>'competences',
                    'action'=>'index')); ?>
            </li>
            <?php
            if($this->params['controller'] == 'users')
                echo '<li class="active">';
            else
                echo '<li class="tab4">';

            echo $this->Html->link(__('Utilisateurs',true),array(
                    'controller'=>'users',
                    'action'=>'index')); ?>
            </li>
        </ul>

        <div id="corps" class="clearfix">

            <h2><?php echo $title_for_layout; ?></h2>

            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Session->flash('auth'); ?>
            <?php echo $content_for_layout; ?>


        </div>
    </div>

    <div id="footer">
        <p style='position:relative; top:7px; left:10px;'><?php echo __('Opencomp est distribué sous licence',true); ?> <a href ='http://www.gnu.org/licenses/agpl-3.0-standalone.html'>GNU/AGPL</a>.<br /><a href='http://zolotaya.isa-geek.com/redmine/projects/gnote'><?php echo __('Forge du projet Opencomp',true); ?></a> - <a href='http://zolotaya.isa-geek.com/redmine/projects/gnote/issues/new'><?php echo __('rapporter une anomalie',true) ?></a></p><div style='float:right; position:relative; bottom:18px; right:10px;'><?php echo __('Page générée en',true); ?> $tps <?php echo __('seconde requêtes exécutées.',true) ?></div>

    </div>

    <?php //echo $this->element('sql_dump');
              echo $this->Js->writeBuffer();   ?>
</body>
</html>
