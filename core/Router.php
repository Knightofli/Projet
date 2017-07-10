<?php
class Router {

    /** 
    * Permet de parser une url
    * @param $url Url à parser
    * @return tableau contenant les paramètres
    **/

    static function parse($url,$request){
        // Enlève les "//" en début et fin de l'url
        $url = trim($url,'/');
        // $params : tableau contenant les paramètres du lien 
        $params = explode ('/',$url);
        $request -> controller = $params[0];
        $request -> action = isset ($params[1]) ? $params[1] : 'index';
        // Définir les autres paramètres dans un tableau secondaire 
        $request -> params = array_slice($params,2);
        return true;

    }

}

?>