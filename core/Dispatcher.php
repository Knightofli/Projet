<?php

//--------------------//
//  class Dispatcher  //
//--------------------//

class Dispatcher
{
    /**
    * @var $request La requête de l'url
    **/
    var $request;

    /**
    * @var $controller Le controller appelé 
    **/
    var $controller;


    function __construct(){
        // Création d'une nouvelle instance de la class Request 
        // Objet contenant la requête de l'utilisateur
        $this->request = new Request();

        // Parse l'URL et 
        // Retourne dans $this->request le tableau contenant [0] = controller , [1] = action , [2] = array(paramètres)
        Router::parse($this->request->url,$this->request);

        // $this->controller : instance de la class du controller appelé
        $this->controller = $this->loadController();

        // Envoi une page d'erreur si le controller existe pas 
        if (!is_subclass_of($this->controller, 'Controller')){
            $message = 'Le controller '.$this->request->controller.' n\'existe pas .';
            $this->controller->error($message);
        }

        // Envoi une page d'erreur si l'action existe pas 
        if(!in_array($this->request->action, array_diff(get_class_methods($this->controller),get_class_methods('Controller')))){
            $message = 'Le controller '.$this->request->controller.' n\'a pas de méthode '.$this->request->action;
            $this->controller->error($message);
        }
        
        // Execute la méthode(action) de la classe(controller) en passant les arguments(paramètres)
        call_user_func_array(array($this->controller,$this->request->action),$this->request->params);
        
        $this->controller->render($this->request->action);
    }

    /**
    * @return $name($this->request) La class du controller appelé s'il existe,
    * sinon 
    * @return Controller($this->request)
    **/
    public function loadController(){
        
        // ucfirst() : Met la première lettre de la chaine en majuscule 
        $name = ucfirst ($this ->request->controller).'Controller'; 
        // Charge le controlleur  '/controller/$name.php' 
        $file = ROOT.DS.'controller'.DS.$name.'.php'; 
        // return une instance du controlle si celui-ci existe 
        if (file_exists ($file)) {
            require $file;
            return new $name($this->request);
        }
        // sinon return le controller parent 
        else {
            return new Controller($this->request);
        }
    }
}

?>