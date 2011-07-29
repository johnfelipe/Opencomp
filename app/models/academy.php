<?php

class Academy extends AppModel
{

    var $validate = array(
	
	//Nom de l'academie
	'name' => array(
	    'longueur' => array(
		'rule' => array('minLength', 3),
		'message' => 'Taille minimum de 3 caractères'
		),
	    'unique_create' => array(
		'rule' => 'isUnique',
		'message' => 'Cette académie existe déjà, veuillez saisir un autre nom.'
		)
	    ),
	'type' => array(
	    'requis' => array(
		'rule' => array('inList', array('0', '1')),
		'message' => 'Vous devez sélectionner un type d\'académie.'
	    )
	)
    );
}

?>
