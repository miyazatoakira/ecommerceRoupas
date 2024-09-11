<?php

Class Conexao{
    private $pdo;
    private $host = "localhost";
    private $dbname = "LojaRoupas";
    private $user = "root";
    private $senha = "";

        public function __construct(){
            try{
                $this->pdo = new PDO("myskl:dbname=".$this->dbname.";host=".$this->host
                ,$this->user, $this->senha);
            }
            catch (PDOException $e){
                echo "ERRO DE CONEXÃO NO PDO: ".$e->getMessage();
                exit();
            }
            catch(Exception $e){
                echo "ERRO não passou de conexão: ".$e->getMessage();
                exit();
            }
            return $this->pdo;
        }


}
?>