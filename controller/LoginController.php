<?php
class LoginController extends Controller{

    /**
    *  Action par défault : index  
    **/
    public function index(){
        if ($_SESSION['rang'] != 1){
            Header('Location: http://'.$_SERVER["SERVER_NAME"].'/profil/membre/'.$_SESSION['id']);
        }
        $this->loadModel('Membre');
        $this->check();
    }

    /**
    *  Vérifie si les données sont correctes 
    **/
    private function check(){
        if (isset($_POST['connexion'])){
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $password = htmlspecialchars($_POST['password']);
            if ($this->Membre->verif_compte($pseudo,$password)){
                $membre_info = $this->Membre->query;
                $this->set_session($membre_info);
                Header('Location: http://'.$_SERVER["SERVER_NAME"].'/profil/membre/'.$_SESSION['id']);
            }
        }   
    }

    private function set_session($membre_info){
        $_SESSION['id'] = $membre_info->membre_id;
        $_SESSION['pseudo'] = $membre_info->membre_pseudo;
        $_SESSION['rang'] = $membre_info->membre_rang;
    }


}
?>