<?php

class ResultsController extends AppController
{
    function index()
    {
        $this->set('title_for_layout', __('Les Résultats',true));
        $this->set('results', $this->paginate());
    }
    
    //Ajout d'un résultat
    function add($id = null)
    {
        $this->set('title_for_layout', __('Ajouter un résultat',true));
    }
    
    //Edition d'un résultat
      function edit($id = null)
    {
        $this->set('title_for_layout', __('Modifier un résultat',true));
    }
    
    
    //Suppression d'un résultat
    function delete ($id)
    {
        

    }
    
}
?>
