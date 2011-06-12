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
    function view($id)
    {
	//On transmet le titre à la vue.
	$this->set('title_for_layout', __('Affichage d\'une académie', true));

	if (!$id)
	{
	    $this->redirect(array('action' => 'index'));
	}

	//On essayes de récupérer dans $infoPupil les informations de la
	//classe pour laquelle l'id a été passé en paramètre.
	//Si l'élève n'existe pas (mauvais id), alors, la variable sera vide.
	$infoAcademy = $this->Academy->read(null, $id);

	//Avant d'afficher la page, on teste si $infoPupil est vide, si c'est
	//le cas, on cours-circuite l'affichage en redirigeant l'utilisateur vers
	//la liste des classe en affichant un message d'erreur.
	if (!empty($infoAcademy))
		$this->set('academy', $infoAcademy);
	else
	{
		$this->Session->setFlash(__('L\'élève que vous souhaitez afficher n\'existe pas.', true), 'message_erreur');
		$this->redirect(array('action' => 'index'));
	}
    }
}
?>
