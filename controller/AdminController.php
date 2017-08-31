<?php
class AdminController extends Controller{



    public function index(){
        if ($_SESSION['rang'] != ADMIN){
            Header('Location: http://'.$_SERVER["SERVER_NAME"].'/home');
        }
        
    }

    public function lesson(){
        if ($_SESSION['rang'] != ADMIN){
            Header('Location: http://'.$_SERVER["SERVER_NAME"].'/home');
        }
    }

    public function forum(){
        if ($_SESSION['rang'] != ADMIN){
            Header('Location: http://'.$_SERVER["SERVER_NAME"].'/home');
        }

        
    }
}
?>