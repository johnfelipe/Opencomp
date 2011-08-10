<?php

/**
  * classroom.php
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
 * Modèle de gestion des classes.
 *
 * @category Model
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class Classroom extends AppModel
{
    var $displayField = 'title';

    var $hasMany = array(
        'Pupil' => array(
            'className' => 'Pupil',
            'foreignKey' => 'classroom_id',
            'dependent' => false,
        )
    );
}

?>
