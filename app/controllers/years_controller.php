<?php

class YearsController extends AppController
{
    function index()
    {
        $this->set('title_for_layout', __('Liste des années',true));
        $this->set('years', $this->paginate());
       
    }
    
    //Suppression d'une année
    function delete ($id)
    {
        

    }
    
}
?>