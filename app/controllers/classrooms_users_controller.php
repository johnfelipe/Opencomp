<?php

class ClassroomsUsersController extends AppController
{
    function index()
    {
        $this->set('title_for_layout', __('Les Professeurs',true));
        $this->set('classrooms_users', $this->paginate());
    }
    //AJout d'un professeur
    function add($id = null)
    {
        $this->set('title_for_layout', __('Ajouter un professeur',true));
    }
    
    //Edition d'un professeur
      function edit($id = null)
    {
        $this->set('title_for_layout', __('Modifier un professeur',true));
    }
    
    
    //Suppression d'un professeur
    function delete ($id)
    {
        
    }
    
   
}
?>
