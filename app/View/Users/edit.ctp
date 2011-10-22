<?php

echo $this->Form->create('User',array(
    'url'=>array(
        'action'=>'edit'
        )
    )
);

echo $this->Form->input('User.first_name', array('label'=>__('Prénom',true)));
echo $this->Form->input('User.name', array('label'=>__('Nom',true)));
echo $this->Form->input('User.email', array('label'=>__('Adresse de courriel',true)));
echo $this->Form->input('User.username', array('label'=>__('Nom d\'utilisateur',true)));

?>

<div class="input password required">
    <label for="UserPasswrd">Mot de passe</label><input id="UserPasswrd" type="password" name="data[User][passwrd]" />
    <?php
        //Si la personne modifie actuellement un utilisateur existant,
        //on indique la marche à suivre pour ne pas modifier le mot de passe.
        if (!empty($this->data['User']['id']))
        {
            echo $this->Html->div('info-message', __('Pour conserver le mot de passe actuel, laissez les champs blancs',true));
        }
    ?>
</div>

<?php

echo $this->Form->input('User.passwrd2', array('label'=>__('Confirmez le mot de passe',true), 'type'=>'password'));
echo $this->Form->hidden('User.id');

$options=array('enseignant'=>__('Enseignant',true),'admin'=>__('Administrateur',true));
echo $this->Form->input('User.role', array('label'=>__('Statut',true), 'options'=>$options));


echo $this->Form->end(__('Envoyer',true));

?>
