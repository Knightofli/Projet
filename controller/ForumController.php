<?php
class ForumController extends Controller{

    var $req;


    public function index(){
        $this->loadModel('Categorie');
        $categorie = $this->Categorie->find($this->req);
        $this->loadModel('Sous_categorie');
        $sous_categorie = $this->Sous_categorie->find($this->req);
        print_r($categorie);
        print_r($sous_categorie);
    }

    public function categorie(){
        
    }

    public function sous_categorie(){
        $this->loadModel('Sous_categorie');
    }

    public function topic(){
        $this->loadModel('Topic');

    }
}

?>