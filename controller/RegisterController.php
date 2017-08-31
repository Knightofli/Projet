<?php
class RegisterController extends Controller{

    public $erreur; 

    public function index(){
        $this->loadModel('Membre');
        $this->check();
        

    }

    private function check(){
        if(isset($_POST['forminscription'])) {

            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mail = htmlspecialchars($_POST['mail']);
            $mail2 = htmlspecialchars($_POST['mail2']);
            $password = htmlspecialchars($_POST['password']);
            $password2 = htmlspecialchars($_POST['password2']);
            $password2 = Password::hash_password($password2);

            $this->check_pseudo($pseudo);           
            $this->check_mail($mail,$mail2);
            $this->check_password($password, $password2);

            if (!isset($this->erreur)){

                $this->Membre->insert([
                    'membre_pseudo' => $pseudo,
                    'membre_mail' => $mail,
                    'membre_password' => $password2
                ]);
                if(isset($_SERVER["HTTP_REFERER"])){
                    Header('Location: '.$_SERVER["HTTP_REFERER"]);
                }
                else {
                    Header('Location: http://'.$_SERVER["SERVER_NAME"].'/home');
                }
            }
        }
    }


    private function check_pseudo($pseudo){
        if(strlen($pseudo) >= 20) {
        $this->erreur[] = "Votre pseudo ne doit pas dépasser 20 caractères !";
        }
        if($this->Membre->verif_pseudo($pseudo) != 0){
            $this->erreur[] = "Pseudo déjà utilisé !";
        }

    }
    private function check_mail($mail, $mail2){
        if($mail != $mail2 OR !preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {
                $this->erreur[] = "Vos adresses mail ne correspondent pas !";
        }else{
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                if($this->Membre->verif_mail($mail) != 0) {
                    $this->erreur[] = "Adresse mail déjà utilisée !";
                }
            }else{
                $this->erreur[] = "Votre adresse mail n'est pas valide !";
            }
        }  
    }

    private function check_password($password, $password2){
        if(!password_verify($password, $password2)) {
            $this->erreur[] = "Vos mots de passes ne correspondent pas !";
        }
    }    
}
?>