<?php

class PeriodsController extends AppController
{
    function index()
    {
        $this->set('title_for_layout', __('Trimestres',true));
        $this->set('pupils', $this->paginate());
    }
    //Ajout d'un trimestre 
    function add($id = null)
    {

            $this->set('title_for_layout', __('Ajouter un trimestre',true));
     }
    
    //Edition d'un trimestre
      function edit($id = null)
    {
            $this->set('title_for_layout', __('Modifier une trimestre',true));
               
    }
    
    
    //Suppression d'un trimestre
    function delete ($id)
    {
        

    }
    
}
?>
