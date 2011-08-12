<?php

/**
  * year.php
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
 * Modèle de gestion des années scolaires.
 *
 * @category Model
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class Year extends AppModel
{
    var $displayField = 'year';

    var $validate = array(
        'year' => array(
            'masque' => array(
                'rule' => '/^[0-9]{4,4}\/[0-9]{4,4}$/i',
                'message' => 'Saisissez une année scolaire de la forme aaaa/aaaa'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Cette année scolaire existe déjà, veuillez saisir une année différente.'
            )
        )
    );
}

?>
