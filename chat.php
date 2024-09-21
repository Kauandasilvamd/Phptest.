<?php
// Inclui a conexão com o banco de dados
include("bd_conect.php"); // Corrigido de "bd conect.php" para "bd_conect.php"

// Consulta ao banco de dados
$sql = $pdo->query("SELECT * FROM cha1"); // Corrigido "cha1" para "chat"

// Exibe os resultados
foreach ($sql->fetchAll() as $key) {
    echo "<h3>" . htmlspecialchars($key['nome']) . "</h3>"; // htmlspecialchars para evitar XSS
    echo "<p>" . htmlspecialchars($key['mensagem']) . "</p>";
}
?>