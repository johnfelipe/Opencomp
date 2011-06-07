<?php

class TutorsController extends AppController
{
    function index()
    {
        $this->set('title_for_layout', __('Liste des Tuteurs',true));
        $this->set('tutors', $this->paginate());
    }
    
    //Ajout d'un tuteur 
    function add($id = null)
    {
        $this->set('title_for_layout', __('Ajouter un tuteur',true));
    }
    
    //Edition d'un tuteur
      function edit($id = null)
    {
        $this->set('title_for_layout', __('Modifier un tuteur',true));
    }
    
    
    //Suppression d'un tuteur
    function delete ($id)
    {
        
    }
    
    
}
?>
