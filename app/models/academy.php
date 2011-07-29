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
	    )
	);
}

?>
