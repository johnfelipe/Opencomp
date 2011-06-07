<?php

class ItemsLevelsController extends AppController
{
    
    function index()
    {
        
        $this->set('items_levels', $this->paginate());
    }
    
    //Ajout d'une évaluation 
    function add($id = null)
    {
        $this->set('title_for_layout', __('Ajouter une évaluation',true));
    }
    
    //Edition d'une évaluation
      function edit($id = null)
    {
         $this->set('title_for_layout', __('Modifier une évaluation',true));
    }
    
    
    //Suppression d'une évaluation
    function delete ($id)
    {
        

    }
    
}
?>
