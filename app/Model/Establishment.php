<?php

/**
  * Establishments.php
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
 * Modèle de gestion des établissements scolaires.
 *
 * @category Model
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class Establishment extends AppModel
{
    var $belongsTo = array(
      'User',
      'Academy');

    var $validate = array(
        'name' => array(
            'longueur' => array(
                'rule' => array('minLength', 3),
                'message' => 'Taille minimum de 3 caractères'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Cette établissement existe déjà, veuillez saisir un autre nom.'
            )
        ),
        'address' => array(
            'longueur' => array(
                'rule' => array('minLength', 5),
                'message' => 'Taille minimum de 5 caractères'
            )
        ),
        'postcode' => array(
            'rule' => '/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/',
            'message' => 'Saisissez un code postal valide !'
        ),
        'town' => array(
            'longueur' => array(
                'rule' => array('minLength', 2),
                'message' => 'Taille minimum de 2 caractères'
            )
        )
    );
}

?>
