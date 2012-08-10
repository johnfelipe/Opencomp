<?php

echo $this->Form->create('User');
echo $this->Form->input('username',array('label' => __('Identifiant',true)));
echo $this->Form->input('password',array('label' => __('Mot de passe',true)));

echo $this->Form->end(__('Se connecter',true));

?>