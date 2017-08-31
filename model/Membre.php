<?php 
class Membre extends Model{
    
    public function verif_compte($pseudo,$password){
        $query = $this->database->prepare("SELECT * FROM Membres WHERE membre_pseudo = ?");
        $query->execute(array($pseudo));
        $this->query = $query->fetch();
        if (!isset($this->query)){
            return false;
        }
        if (!password_verify($password,$this->query->membre_password)){
            return false;
        }
        return true;
    }

    public function verif_pseudo($pseudo){
        $query = $this->database->prepare("SELECT * FROM Membres WHERE membre_pseudo = ?");
        $query->execute(array($pseudo));
        return $query->rowCount();
    }

    public function verif_mail($mail){
        $query = $this->database->prepare("SELECT * FROM Membres WHERE membre_mail = ?");
		$query->execute(array($mail));
		return $query->rowCount();
        
    }
}

?>