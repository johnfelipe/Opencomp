<?php

/**
  * Classroom.php
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
    var $displayField = array("%s (%s %s - %s)", "{n}.Classroom.title", "{n}.User.first_name", "{n}.User.name", "{n}.Year.title");
    
    var $belongsTo = array(
      'Year',
      'User',
      'Establishment');

    var $hasAndBelongsToMany = array(
        'Pupil' =>
            array(
                'className'              => 'Pupil',
                'joinTable'              => 'classrooms_pupils',
                'foreignKey'             => 'classroom_id',
                'associationForeignKey'  => 'pupil_id',
                'unique'                 => true
            )
    );
}

?>
