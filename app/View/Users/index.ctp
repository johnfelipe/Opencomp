<?php 

echo $this->Html->link(
    '<span class="user icon"></span>'.__('Ajouter un utilisateur',true),
    array('controller'=>'users', 'action'=>'edit'),
    array('class'=>'left primary button positive', 'escape' => false)
);

echo $this->Html->link(
    '<span class="book icon"></span>'.__('Aide',true),
    array('controller'=>'users', 'action'=>'edit'),
    array('class'=>'right button', 'escape' => false)
);

echo '<p>'.$this->Paginator->numbers().'</p>';

echo '<table>';

echo $this->Html->tableHeaders(array(
    $this->Paginator->sort(__('Prénom',true), 'User.first_name'),
    $this->Paginator->sort(__('Nom',true), 'User.name'),
    $this->Paginator->sort(__('Identifiant',true), 'User.username'),
    $this->Paginator->sort(__('Adresse de courriel',true), 'User.email'),
    __('Modifier',true),
    __('Supprimer',true)));

foreach ($listedesutilisateurs as $lstusr){
    
    $prenom = $lstusr['User']['first_name'];
    $nom = $lstusr['User']['name'];
    $username = $lstusr['User']['username'];
    $email = $lstusr['User']['email'];
    $id = $lstusr['User']['id'];

    echo $this->Html->tableCells(array(
    array($prenom, $nom, $username, $email,
        $this->Html->link(
            $this->Html->image("user_edit.png", array("alt" => __('Editer',true).' '.$prenom.' '.$nom)), 
            array(
                'controller' => 'users',
                'action' => 'edit',
                $id
                ),
            array('escape'=>false)),
        
        $this->Html->link(
            $this->Html->image("user_delete.png", array("alt" => __('Supprimer',true).' '.$prenom.' '.$nom)), 
            array(
                'controller' => 'users',
                'action' => 'delete',
                $id
                ),
            array('escape'=>false),
            __('Êtes-vous sûr de vouloir supprimer',true).' '.$prenom.' '.$nom)
    ),
    ));
}

echo '</table>';

?>
