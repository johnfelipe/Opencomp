<?php

/**
  * Level.php
  * 
  * PHP version 5
  *
  * @category Model
  * @package  Opencomp
  * @author   Jean Traullé <jtraulle@gmail.com>
  * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
  * @link     http://www.opencomp.fr
  */

/**
 * Modèle de gestion des niveaux scolaires.
 *
 * @category Model
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class Level extends AppModel
{
    var $belongsTo = 'Cycle';

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

