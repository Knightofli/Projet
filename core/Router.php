<?php

//----------------//
//  class Router  //
//----------------//

class Router{

    /** 
    * Permet de parser une url
    * @param $url url à parser
    * @param $request variable où est stocker les paramètres
    * @return tableau contenant [0] = controller , [1] = action , [2] = array(paramètres)
    **/

    static function parse($url,$request){
        // Enlève les "//" en début et fin de l'url
        $url = trim($url,'/');
        // $params : tableau contenant les paramètres du lien 
        $params = explode ('/',$url);
        $request -> controller = !($params[0] === '') ? $params[0] : 'home';
        $request -> action = isset($params[1]) ? $params[1] : 'index';
        // Définir les autres paramètres dans un tableau secondaire 
        $request -> params = array_slice($params,2);
        return true;

    }
}

?>