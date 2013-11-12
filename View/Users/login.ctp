<?php

echo $this->Form->create('User', array(
    'class'=>'form-signin',
    'inputDefaults' => array(
        'div'=>'',
        'class' => 'form-control',
        'wrapInput' => '',
    )
));

echo $this->Form->input('username',array(
    'label' =>false,
    'autocomplete'=>'off',
    'placeholder'=>"Nom d'utilisateur",
    'class'=>'form-control top',
    'beforeInput' => '<div class="input-group"><span class="input-group-addon top"><i class="icon-user icon-2x"></i></span>',
    'afterInput' => '</div>'
));

echo $this->Form->input('password',array(
    'label'=>false,
    'autocomplete'=>"off",
    'placeholder'=>"Mot de passe",
    'value'=>"",
    'beforeInput' => '<div class="input-group"><span class="input-group-addon bottom"><i class="icon-lock icon-2x"></i></span>',
    'afterInput' => '</div>'
)); ?>

<div class="spacer"></div>

<?php echo $this->Form->input('yubikeyOTP',array(
    'label' =>false,
    'autocomplete'=>"off",
    'placeholder'=>"YubikeyOTP",
    'value'=>"",
    'beforeInput' => '<div class="input-group"><span class="input-group-addon">'.$this->Html->image("yubikey.png", array("height"=>30,"alt" => "Yubikey logo")).'</span>',
    'afterInput' => '</div>'
));

echo $this->Form->button('<i class="icon-signin"></i>   '.__('Se connecter'), array('type' => 'submit','class'=>'btn btn-lg btn-primary btn-block submit'));
echo $this->Form->end();

?>