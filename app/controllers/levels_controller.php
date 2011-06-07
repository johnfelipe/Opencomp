<?php

class LevelsController extends AppController
{
    
    function index()
    {
        $this->set('title_for_layout', __('Niveaux',true));
        $this->set('levels', $this->paginate());
    }
    //Ajout d'un niveau
    function add($id = null)
    {
        $this->set('title_for_layout', __('Ajouter un niveau',true));
    }
    
    //Edition d'une évaluation
      function edit($id = null)
    {
        $this->set('title_for_layout', __('Modifier un niveau',true));
    }
    
    
    //Suppression d'une évaluation
    function delete ($id)
    {
        

    }
    
}
?>
