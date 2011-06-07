<?php
class AcademiesUsersController extends AppController
{
    function index()
    {
        $this->set('title_for_layout', __('Liste des Administrateur d\'Academie',true));
        $this->set('academies_users', $this->paginate());
    }
    //----------------------------------------------
    //Ajout d'un Administrateur d'Academie   
    function add($id = null)
    {
        $this->set('title_for_layout', __('Ajouter un Administrateur d\'Academie',true));
    }
    
    //Edition d'un Administrateur d'Academie
      function edit($id = null)
    {
        $this->set('title_for_layout', __('Modifier un Administrateur d\'Academie',true));
    }
    
    
    //Suppression d'un Administrateur d'Academie
    function delete ($id)
    {
    
        
    }
     
}
?>
