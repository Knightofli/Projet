<?php
//--------------------//
//  class Controller  //
//--------------------//

class Controller
{

    public $request;                 // Objet Request
    public $vars= array();           // Variables à passer à la vue
    public $layout= 'default';       // Layout à utiliser pour rendre la vue
    private $rendered = false;       // Si le rendu à été fait ou pas ?

     function __construct($request){
        $this->request = $request;   // On stock la requête dans l'instance
        
    }

    /**
    * Permet de rendre une vue
    * @param $view Fichier à rendre ( chemin depuis view ou nom de la vue)
    * $this->vars message du dispatcher 
    **/
    public function render($view){
        // Si la vue est rendue ou pas
        if($this->rendered){
            return false;
        }
    
        if(strpos($view,'/') === 0 || $view === 'errors/404' ){
            $view = ROOT.DS.'view'.DS.$view.'.php';
        }
        else { 
            $view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
        }
        ob_start();
        require($view);
        $content_for_layout = ob_get_clean();
        require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
        $this->rendered = true;
    }

    /**
    * @param $controller permettant d'appeler les méthodes set et render
    * @param $message Le message d'erreur à faire apparaître en vue
    **/
    public function error($message){
        //header("HTTP/1.0 404 Not Found");
        $this->set('message',$message);
        $this->render('errors/404');
        die();
    }

    /**
    * Permet de passer une ou plusieurs variable à la vue
    * @param $key nom de la variable Ou tableau de variables
    * @param $value Valeur de la variable
    **/
    public function set($key,$value=null){
        if(is_array($key)){
            $this->vars += $key;
        }
        else {
            $this->vars[$key]= $value; 
        }
        
        
    }

    /**
    * Permet de charger un modèle
    * @param $name Le nom du model 
    * Ex: Post 
    * Ex: $this->Post->add();
    **/
    public function loadModel($name){
        $file = ROOT.DS.'model'.DS.$name.'.php';
        require_once($file);
        if (!isset($this->$name)){
            $this->$name =  new $name();
        }   
    }



    
}

?>