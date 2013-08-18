<?php

echo $this->Form->create('User');
echo $this->Form->input('username',array('label' => __('Identifiant'),'style'=>'margin-bottom:20px;', 'autocomplete'=>"off"));
echo $this->Form->input('password',array('label' => __('Mot de passe'),'style'=>'margin-bottom:10px;', 'autocomplete'=>"off", 'value'=>""));
echo $this->Form->input('yubikeyOTP',array('label' => __('YubikeyOTP'),'style'=>'margin-bottom:10px;', 'autocomplete'=>"off", 'value'=>""));

echo $this->Form->submit(__('Se connecter'), array('class'=>'submit'));
echo $this->Form->end();

?>