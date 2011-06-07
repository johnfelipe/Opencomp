<?php

class EstablishmentsController extends AppController
{function index()
    {
        $this->set('title_for_layout', __('Liste des Etablissements',true));
        $this->set('establishments', $this->paginate());
    }
    //Ajout un etablissement 
    function add($id = null)
    {
        $this->set('title_for_layout', __('Ajouter un établissement',true));
    }
    
    //Edition d'un établissement
      function edit($id = null)
    {
        $this->set('title_for_layout', __('Modifier un établissement',true));
            
    }
    
    
    //Suppression d'un établissement
    function delete ($id)
    {
    
        
    }
    
}
    ?>