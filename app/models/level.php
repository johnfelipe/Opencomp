<?php

	class Level extends AppModel
	{
		var $validate = array(
	
		'name' => array(
			'longueur' => array(
			'rule' => array('minLength', 2),
			'message' => 'Taille minimum de 2 caractères'
			),
			'unique_create' => array(
			'rule' => 'isUnique',
			'message' => 'Ce niveau existe déjà, veuillez saisir un autre nom.'
			)
		)
		);
	}
		 
?>
