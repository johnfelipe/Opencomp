<?php

class AcademiesController extends AppController
{
    function index()
    {
        $this->set('title_for_layout', __('Liste des Academies',true));
        $this->set('academies', $this->paginate());
    }
    //----------------------------------------------
    //Ajout d'une Academie    
    function add($id = null)
    {
        $this->set('title_for_layout', __('Ajouter une Academie',true));
        
    }
    
    //Edition d'une academie
      function edit($id = null)
    {
        $this->set('title_for_layout', __('Modifier une Academie',true));
    
        
    }
    
    
    //Suppression d'une Academie'
    function delete ($id)
    {
    
        
    }
    function view()
	{
		

	}
}
?>
