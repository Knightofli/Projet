<?php
class Request{

    public $url; // URL appellé par l'utilisateur 
 
    function __construct(){
        $this->url = $_SERVER['PATH_INFO'];
        
    }


}
?>