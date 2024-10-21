<?php

class Conexao {

    private $pdo;
    private $host = "localhost";
    private $dbname = "LojaRoupas";
    private $user = "root";
    private $senha = "Mysql12@root";

    public function __construct(){
        try{
            $this->pdo = new PDO("mysql:dbname=".$this->dbname.";host=".$this->host, $this->user, $this->senha);
        }
        catch (PDOException $e){
            echo "ERRO DE CONEXÃO NO PDO: ".$e->getMessage();
            exit();
        }
        catch(Exception $e){
            echo "ERRO não passou de conexão: ".$e->getMessage();
            exit();
        }
    }

    public function insereCliente($user_name, $primeiro_nome, $sobrenome, $sexo, $telefone, $cpf, $email, $senha, $numero, $obs) {
        $insere = $this->pdo->prepare("INSERT INTO Cliente (Nome, Primeiro_nome, Sobrenome, Sexo, Telefone, CPF, Email, Senha, Numero_residencial, Obs) 
                                       VALUES (:nome, :primeiro_nome, :sobrenome, :sexo, :telefone, :cpf, :email, :senha, :numero, :obs)");
        $insere->bindValue(':nome', $user_name);
        $insere->bindValue(':primeiro_nome', $primeiro_nome);
        $insere->bindValue(':sobrenome', $sobrenome);  // Corrigido de Sobrebome para Sobrenome
        $insere->bindValue(':sexo', $sexo);
        $insere->bindValue(':telefone', $telefone);
        $insere->bindValue(':cpf', $cpf);
        $insere->bindValue(':email', $email);
        $insere->bindValue(':senha', $senha);
        $insere->bindValue(':numero', $numero);
        $insere->bindValue(':obs', $obs);

        try {
            $insere->execute();  // Executa a query preparada
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        } catch (PDOException $e) {
            echo "Erro ao inserir dados: " . $e->getMessage();
        }
    }

    public function insereEndereco($cep, $bairro, $rua, $cidade, $uf, $complemento) {
        $insere = $this->pdo->prepare("INSERT INTO Endereco (Cep, Bairro, Rua, Cidade, Uf, Complemento) 
                                       VALUES (:Cep, :Bairro, :Rua, :Cidade, :Uf, :Complemento)");
        $insere->bindValue(':Cep', $cep);
        $insere->bindValue(':Bairro', $bairro);
        $insere->bindValue(':Rua', $rua);
        $insere->bindValue(':Cidade', $cidade);
        $insere->bindValue(':Uf', $uf);
        $insere->bindValue(':Complemento', $complemento);

        try {
            $insere->execute();  // Executa a query preparada
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        } catch (PDOException $e) {
            echo "Erro ao inserir dados: " . $e->getMessage();
        }
    }

    public function insereProduto($cor, $nome, $marca, $tecido) {
        $insere = $this->pdo->prepare("INSERT INTO Produto (Cor, Nome, Marca, Tecido) 
                                       VALUES (:Cor, :Nome, :Marca, :Tecido)");
        $insere->bindValue(':Cor', $cor);
        $insere->bindValue(':Nome', $nome);
        $insere->bindValue(':Marca', $marca);
        $insere->bindValue(':Tecido', $tecido);

        try {
            $insere->execute();  // Executa a query preparada
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        } catch (PDOException $e) {
            echo "Erro ao inserir dados: " . $e->getMessage();
        }
    }
}

?>
