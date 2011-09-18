<?php

/**
  * pupil.php
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
 * Modèle de gestion des élèves.
 *
 * @category Model
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class Pupil extends AppModel
{
    var $displayField = 'name';

    var $hasAndBelongsToMany = array(
        'Classroom' =>
            array(
                'className'              => 'Classroom',
                'joinTable'              => 'classrooms_pupils',
                'foreignKey'             => 'pupil_id',
                'associationForeignKey'  => 'classroom_id',
                'unique'                 => true
            )
    );
}

?>
