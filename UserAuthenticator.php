<?php

require_once 'UserEntity.php';

class UserAuthenticator
{

    private $connection;
    private $stmt;
    private UserEntity $user;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function verifyLogin($email, $password)
    {
        try {
            $query = 'SELECT correo, contraseña FROM registro WHERE registro.correo = :email AND registro.contraseña = :password';
            $this->stmt = $this->connection->prepare($query);
            $this->stmt->bindValue(':email', $email);
            $this->stmt->bindValue(':password', $password);
            $this->stmt->execute();

        if ($this->stmt->rowCount() > 0) $this->startSession();
        } catch (Exception $th) {
            die($th->getMessage());
        }
    }

    private function startSession()
    {
        try {
            $row = $this->stmt->fetch(PDO::FETCH_ASSOC);
            $this->user = new UserEntity($row['correo'], $row['contraseña']);
            $userData = json_encode($this->user);
            header("Location: ../view/sistema.html?usuario=$userData");
            // header('Content-Type: application/json');
            exit;
        } catch (Exception $th) {
            die($th->getMessage());
        }
    }
    
}
