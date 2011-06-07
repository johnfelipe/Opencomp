<?php

class CompetencesUsersController extends AppController
{
    function index()
    {
        
        $this->set('competences_users', $this->paginate());
    }
    //Ajout d'un responsable
    function add($id = null)
    {
        
    }
    
    //Edition d'un responsable
      function edit($id = null)
    {
        
    }
    
    
    //Suppression d'un responsable
    function delete ($id)
    {
    
        
    }
    
}
?>
