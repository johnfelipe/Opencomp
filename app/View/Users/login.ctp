<?php

echo $this->Form->create('User');
echo $this->Form->input('username',array('label' => __('Identifiant'),'style'=>'margin-bottom:20px;'));
echo $this->Form->input('password',array('label' => __('Mot de passe'),'style'=>'margin-bottom:10px;'));

echo $this->Form->submit(__('Se connecter'), array('class'=>'submit'));
echo $this->Form->end();

?>