<?php

class ClassroomspupilsController extends AppController
{
    function index()
    {
        $this->set('title_for_layout', __('Historique des éleves',true));
       $this->set('classrooms_pupils', $this->paginate());
    }
    
    //Effacer 
    function delete ($id)
    {
        

    }
     
}
?>
