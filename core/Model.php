<?php

//---------------//
//  class Model  //
//---------------//

class Model {

    static $connections = array();
    public $table = false;
    public $database;

    public function __construct(){
        Model::connect_pdo(); 
        $this->init_table();
    }

    /**
    * Ouvre la connexion à la base de donnée si celle-ci n'est pas faîte 
    */
    protected function connect_pdo(){
        if(isset(Model::$connections['db'])){
            $this->database = Model::$connections['db'];
            return true;
        }
        try{
            $pdo = new PDO(PDOConfig::$DB_TYPE.':host='.PDOConfig::$DB_HOST.';dbname='.PDOConfig::$DB_NAME.';',PDOConfig::$DB_USER,PDOConfig::$DB_PASS,PDOConfig::$DB_OPTION);
            Model::$connections['db'] = $pdo;
            $this->database = $pdo;
        }catch(PDOException $e){
            if(PDOConfig::$DEBUG >= 1){
                die($e->getMessage());
            }else{
                die('Impossible de se connecter à la base de donnée');
            }
        }
    }

    /**
    * Définir le nom de la table par défault : Nom de la classe 
    **/
    protected function init_table(){
        if($this->table === false){
            $this->table = get_class($this).'s';
        }
    }

    /**
    * Cherche dans la base de donnée les informations de la table
    * @param $req array()
    * ['condition'] L'endroit où cherche 
    * @return Objet 
    **/
    public function find($req){
        $sql = 'SELECT * FROM '.$this->table.' ';
        if(isset($req['conditions'])){
            $sql .= 'WHERE '.$req['conditions'];
        }
        $prepare = $this->database->prepare($sql);
        $prepare->execute();
        if(isset($req['return'])){
            return $prepare->fetch();
        }
        return $prepare->fetchAll();
    }

    /**
    * Insert dans la base de données les informations de la requête
    * @param $req array(
    * [nom de la colonne] => la valeur,
    * )
    **/
    public function insert($req){
        $sql = 'INSERT INTO '.$this->table.' ';
        foreach ($req as $key => $value){
            $colum .= $key.',';
            $nbcolum .= '?,';
        }
        $sql .= '('.trim($colum,',').') VALUES('.trim($nbcolum, ',').')';
        $prepare = $this->database->prepare($sql);
        $prepare->execute(array_values($req));
    }

    /**
    * Change dans la base de données les informations de la requête
    * @param $req array(
    * [nom de la colonne] => la valeur,
    * )
    * @param $condition string 
    **/
    public function update($req,$condition){
        $sql = 'UPDATE '.$this->table.' SET ';

        foreach ($req as $key => $value){
            $sql .= $key. ' = "'.$value.'" ,';
        }
        $sql = substr($sql,0,-1);
        $sql .= " WHERE ".$condition;
        $prepare = $this->database->prepare($sql);
        $prepare->execute();
    }
}