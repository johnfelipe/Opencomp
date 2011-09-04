<?php

$this->set('stateStep0', 'terminee');
$this->set('stateStep1', 'terminee');
$this->set('stateStep2', 'terminee');
$this->set('stateStep3', 'encours');
$this->set('stateStep32', 'afaire');
$this->set('stateStep4', 'afaire');
$this->set('stateStep5', 'afaire');

    echo $form->create('Install', array('url' => array('plugin' => 'install', 'controller' => 'install', 'action' => 'database')));
    echo $form->input('Install.driver', array(
        'label' => __('Moteur de base de donnée',true),
        'value' => 'mysql',
        'empty' => false,
        'options' => array(
            'mysql' => 'mysql',
            /*'mysqli' => 'mysqli',
            'sqlite' => 'sqlite',
            'postgres' => 'postgres',
            'mssql' => 'mssql',
            'db2' => 'db2',
            'oracle' => 'oracle',
            'firebird' => 'firebird',
            'sybase' => 'sybase',
            'odbc' => 'odbc',*/
        ),
    ));
    echo $form->input('Install.host', array('label' => __('Hôte',true), 'value' => 'localhost'));
    echo $form->input('Install.login', array('label' => __('Identifiant',true), 'value' => 'root'));
    echo $form->input('Install.password', array('label' => __('Mot de passe',true)));
    echo $form->input('Install.database', array('label' => __('Nom de la base',true), 'value' => 'opencomp'));
    echo $form->input('Install.port', array('label' => __('Port (ne pas compléter si inconnu)',true)));
    echo $session->flash();
    echo $form->end(__('> Suivant',true));
?>
