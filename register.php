<?php
// Arquivo: register.php
session_start();
require 'db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = $_POST['password'];


if (empty($username) || empty($email) || empty($password)) {
die('Preencha todos os campos.');
}


$password_hash = password_hash($password, PASSWORD_DEFAULT);


$stmt = $pdo->prepare('INSERT INTO usuarios (username, email, senha) VALUES (?, ?, ?)');
try {
$stmt->execute([$username, $email, $password_hash]);
$_SESSION['message'] = 'Cadastro realizado com sucesso!';
header('Location: login.html');
exit;
} catch (PDOException $e) {
die('Erro: ' . $e->getMessage());
}
}
?>




    