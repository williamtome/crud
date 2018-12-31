<?php
class Contato {
	
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=crud_oo;host=localhost", "will", "will");
        //echo "Conectou!";
    }

    // Criar novo contato.
    public function create($email, $nome = ''){
        
        if (!$this->hasEmail($email)) {
            $sql = "insert into contatos (nome, email)"
                    . "values (:nome, :email);";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();
            
            return true;
        } else {
            return false;
        }
        
    }
    
    // Listar um contato específico.
    public function getNome($email){
        $sql = "select nome from contatos where email = :email;";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();
            return $info['nome'];
        } else {
            return '';
        }
    }
    
    // Listar todos os contatos.
    public function getAll(){
        $sql = "select * from contatos;";
        $sql = $this->pdo->query($sql);

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return '<h1>Nenhum contato adicionado.</h1>';
        }
    }
    
    // Editar contato.
    public function edit($nome, $email, $id){
        if($this->existContact($id)){
            $sql = "update contatos set nome = :nome, email = :email where id = :id;";
            $sql = $this->pdo->prepare($sql);      
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':id', $id);
            $sql->execute();
            return true;
        } else {
            return false;
        }
    }
    
    // Remover contato.
    public function delete($email) {
        if($this->hasEmail($email)){
            $sql = "delete from contatos where email = :email;";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();
            return true;            
        } else {
            return false;
        }
    }

    private function hasEmail($email){
        $sql = "select * from contatos where email = :email;";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
    
    private function existContact($id){
        $sql = "select * from contatos where id = :id;";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

}