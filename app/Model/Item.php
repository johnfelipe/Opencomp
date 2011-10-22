<?php

/**
  * Item.php
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
 * Modèle de gestion des items.
 *
 * @category Model
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class Item extends AppModel
{
    var $belongsTo = array('Competence');
    
    //Avec ces deux règles de validation,
    //on s'assure que tous les champs sont complétés
    var $validate = array(           
        'competence_id' => array(
            'rule' => array('notEmpty'),
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Séléctionnez la compétence à laquelle se rattache cet item'
        ),
        'title' => array(
            'rule' => array('notEmpty'),
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Vous devez compléter ce champ !'
        )
    );

}
?>

