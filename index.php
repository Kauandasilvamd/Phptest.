<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }

        #chat {
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            padding: 15px;
            height: 400px;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            position: relative;
        }

        .message.user {
            background-color: #d1e7dd;
            text-align: right;
        }

        .message.admin {
            background-color: #f8d7da;
            text-align: left;
        }

        form {
            display: flex;
            gap: 10px;
        }

        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <script type="text/javascript">
        function ajax() {
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('chat').innerHTML = req.responseText;
                }
            };
            req.open('GET', 'chat.php', true);
            req.send();
        }

        // Atualiza o conteúdo do chat a cada 1 segundo
        setInterval(function(){ ajax(); }, 1000);
    </script>
</head>
<body>
    <div id="chat">
        <!-- As mensagens do chat serão carregadas aqui -->
    </div>

    <!-- Formulário para enviar mensagem -->
    <form method="post" action="index.php">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="mensagem" placeholder="Mensagem" required>
        <input type="submit" value="Enviar">
    </form>

    <?php
    // Conexão com o banco de dados
    include("bd_conect.php");

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $mensagem = $_POST['mensagem'];

        // Proteção contra SQL Injection
        $nome = $pdo->quote($nome);
        $mensagem = $pdo->quote($mensagem);

        // Insere a mensagem no banco de dados
        $pdo->query("INSERT INTO cha1 (nome, mensagem) VALUES ($nome, $mensagem)");
    }
    ?>
</body>
</html>