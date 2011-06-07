<?php

class CyclesController extends AppController
{
    function index()
    {
        $this->set('title_for_layout', __('Les Cycles',true));
        $this->set('cycles', $this->paginate());
        
        function add($id = null)
    {
        $this->set('title_for_layout', __('Ajouter un cycle',true));
    }
    
    //Edition d'un cycle
      function edit($id = null)
    {

        
        
        
           

            $this->set('title_for_layout', __('Modifier un cycle',true));
            

        
    }
    
    
    //Suppression d'un cycle
    function delete ($id)
    {
        

    }
    }
    
}
?>
