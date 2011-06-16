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
                            'on' => 'create',
                            'message' => 'Cette academie existe déja.Veuillez saisir un autre nom!'
                        ),
                        'unique_update' => array(
                            'rule' => 'isUniqueUpdate',
                            'on' => 'update',
                            'message' => 'Le nom de cette academie n\'est pas disponible,Veuillez en choisir un autre !'
                          )
                        ),
                    );
                     
           //-------------------------------------------------------------         
//                 var $validate=array(
//                    'username'=>array(
//                        'longueur'=>array(
//                            'rule'=>array('minLenght',5),
//                                'message'=>'Taille minimum de 5 caractères'
//                        )
//                    )
//                    
//                 );

        }
        
	 



?>
