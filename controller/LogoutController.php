<?php
class LogoutController extends Controller{

    public function index(){

        $_SESSION = array();
        session_destroy();
        if(isset($_SERVER["HTTP_REFERER"])){
            Header('Location: '.$_SERVER["HTTP_REFERER"]);
        }
        else {
            Header('Location: http://'.$_SERVER["SERVER_NAME"].'/home');
        }
    }
}
?>