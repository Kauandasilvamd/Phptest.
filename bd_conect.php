<?php
try {
    $dsn = "mysql:dbname=chatsuport;host=10.0.2.178"; // Corrigido 'dns' para 'dsn' e adicionado '='
    $user = "root";
    $pass = "root";
    $pdo = new PDO($dsn, $user, $pass); // Adicionado '=' para atribuição e corrigido 'dns' para 'dsn'
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Definindo o modo de erro para exceções
} catch (PDOException $e) {
    echo "Falha: " . $e->getMessage();
    exit(); // Sai do script se ocorrer um erro de conexão
}
?>