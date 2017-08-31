<?php
class ProfilController extends Controller{

    public $profil;
    private $id;
    public $erreur;
    private $req;

    public function index($id = 0){
        $this->id = intval($id);
        if ($id === 0){
           Header('Location: http://'.$_SERVER["SERVER_NAME"].'/home');
        }
        $this->profil = $this->get_profil();
        if (!$this->profil){
            $message = 'Ce profil n\'existe pas.'; 
            $this->error($message); 
        }
    }

    public function membre($id){
        $this->index($id);
    }

    public function edit(){
        if ($_SESSION['id'] === 0){
            Header('Location: http://'.$_SERVER["SERVER_NAME"].'/home');
        }
        $this->id = $_SESSION['id'];
        $this->profil = $this->get_profil();

        if(isset($_POST['edit_profil'])){

            if (!empty($_POST['membre_nom'])){
                $this->req['membre_nom'] =  htmlspecialchars($_POST['membre_nom']);
            }

            if (!empty($_POST['membre_prenom'])){
                $this->req['membre_prenom'] =  htmlspecialchars($_POST['membre_prenom']);
            }

            if (!empty($_POST['membre_password']) AND !empty($_POST['password2'])){
                if ($_POST['membre_password'] == $_POST['password2']){
                    $this->req['membre_password'] = Password::hash_password(htmlspecialchars($_POST['membre_password']));
                }    
            }

            $this->avatar();

            if (!empty($_POST['membre_signature'])){
                $this->req['membre_signature'] = htmlspecialchars($_POST['membre_signature']);
            }
            if (isset($this->req)){
                $this->loadModel('Membre');
                $condition = "membre_id = ".$_SESSION['id'];
                $this->Membre->update($this->req,$condition);
                
            }
            Header('Location: http://'.$_SERVER["SERVER_NAME"].'/profil/membre/'.$_SESSION['id']);
            
        }
    }



    private function get_profil(){
        $this->loadModel('Membre');
        return $this->Membre->find(array(
            'conditions' => " membre_id = ".$this->id,
            'return' => 'fetch'
        ));
    }

    private function avatar(){
        //Vérification de l'avatar :
        if (!empty($_FILES['avatar']['size'])){
            //On définit les variables :
            $maxsize = 3000000; //Poid de l'image
            $maxwidth = 100; //Largeur de l'image
            $maxheight = 100; //Longueur de l'image
            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' ); //Liste des extensions valides

            if ($_FILES['avatar']['error'] > 0){
                $this->erreur['file'][] = "Erreur lors du transfert de l'avatar : ";
            }

            if ($_FILES['avatar']['size'] > $maxsize){
                $this->erreur['file'][] = "Le fichier est trop gros : (<strong>".$_FILES['avatar']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
            }

            /*$image_sizes = getimagesize($_FILES['avatar']['tmp_name']);
            if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight){
                $this->erreur[] = "Image trop large ou trop longue : (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre <strong>".$maxwidth."x".$maxheight."</strong>)";
            }*/
            
            $extension_upload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'),1));

            if (!in_array($extension_upload,$extensions_valides) ) {
                $this->erreur['file'][] = "Extension de l'avatar incorrecte";
            }
            $this->nomavatar = $this->move_avatar($_FILES['avatar']); 
            if (isset($this->profil->membre_avatar)){
                unlink("images/avatars/".$this->profil->membre_avatar);
            }
            
            if (!isset($this->erreur['file'])){
                $this->req['membre_avatar'] = $this->nomavatar;
            }
        }
    }

    public function move_avatar($avatar)
    {
        $extension_upload = strtolower(substr(strrchr($avatar['name'], '.'),1));
        $name = time();
        $nomavatar = str_replace(' ','',$name).".".$extension_upload;
        $file = "images/avatars/".str_replace(' ','',$name).".".$extension_upload;
        move_uploaded_file($avatar['tmp_name'],$file);
        return $nomavatar;
    }
    
}
?>