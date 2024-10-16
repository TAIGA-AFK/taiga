<?php

session_start();
require_once 'UserEntity.php';
require_once 'DBConnectionManager.php';
require_once 'UserAuthenticator.php';

$dbConnectionManager = new DBConnectionManager();
$connection = $dbConnectionManager->openConnect();
$userAuthenticator = new UserAuthenticator($connection);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$userAuthenticator->verifyLogin($email, $password);
$dbConnectionManager->closeConnection();

$db = new DBConnectionManager();

$conn = $db->openConnect();
$auth = new UserAuthenticator($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["email"];
    $password = $_POST['password'];

    $auth->verifyLogin($name, $password);
}else{
    echo "Verificación incorrecta";
}
