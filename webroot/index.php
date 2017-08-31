<?php 

//------------------//
//  Start a sessoin //
//------------------//

session_start();
// Démarre une session pour le visiteur si l'utilisateur n'est pas connecté.

if (!isset($_SESSION['pseudo'])){
    $_SESSION['rang'] = 1; 
    $_SESSION['id'] = 0; 
    $_SESSION['pseudo'] = '';

}



//----------------------------------------------//
//  Définir les constantes des chemins de l'URL //
//----------------------------------------------//

define ('WEBROOT',dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('DS' , DIRECTORY_SEPARATOR);
define('CORE',ROOT.DS.'core');
define('CONFIG',ROOT.DS.'config');
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));

//
define('VISITEUR',0);
define('MEMBRE',2);
define('ADMIN',5);


//-----------------------------------//
//  Charge tous les autres fichiers  //
//-----------------------------------//



require CORE.DS.'Includes.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
//------------------------//
//  Charge le dispatcher  //
//------------------------//

new Dispatcher();

?>

