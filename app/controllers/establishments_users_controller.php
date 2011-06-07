<?php

class EstablismentsUsersController extends AppController
{
    function index()
    {
        $this->set('title_for_layout', __('Liste des Directeurs',true));
        $this->set('establishments_users', $this->paginate());
    }
    
    //Ajout d'un directeur
    function add($id = null)
    {
        $this->Academie->id = $id;
            $this->data = $this->Academie->read();

            $this->set('title_for_layout', __('Ajouter un directeur',true));
            

        
    }
    
    //Edition d'une academie
      function edit($id = null)
    {

        
        
        
            $this->Academie->id = $id;
            $this->data = $this->Academie->read();

            $this->set('title_for_layout', __('Modifier un directeur',true));
            

        
    }
    
    
    //Suppression d'un directeur
    function delete ($id)
    {
        

    }
    
}
?>
