<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../login.php');
    exit();
}

require_once __DIR__ . '/../Cadastro.php';  
$cadastro = new Cadastro();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cadastro->cadastrarVaga($_POST['nome_empresa'], $_POST['whatsapp'], $_POST['email'], $_POST['descricao'], $_POST['curso']);
    echo "<div class='success-message'>Vaga cadastrada com sucesso!</div>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Vaga</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #1e90ff, #87cefa);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        label {
            font-size: 1rem;
            margin-bottom: 5px;
            display: block;
        }

        input, textarea, select, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            background-color: #ffffff;
            color: #333;
            font-size: 1rem;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button {
            background-color: #1e90ff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #007bff;
        }

        .success-message {
            background-color: #4caf50;
            padding: 10px;
            border-radius: 8px;
            color: white;
            text-align: center;
            margin-top: 20px;
        }

        .error-message {
            background-color: #f44336;
            padding: 10px;
            border-radius: 8px;
            color: white;
            text-align: center;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #1e90ff;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Cadastrar Vaga</h1>

        <form method="POST">
            <label for="nome_empresa">Nome da Empresa:</label>
            <input type="text" name="nome_empresa" id="nome_empresa" required>

            <label for="whatsapp">Número Whatsapp:</label>
            <input type="text" name="whatsapp" id="whatsapp" required>

            <label for="email">E-mail Contato:</label>
            <input type="email" name="email" id="email" required>

            <label for="descricao">Descritivo da Vaga:</label>
            <textarea name="descricao" id="descricao" required></textarea>

            <label for="curso">Curso:</label>
            <select name="curso" id="curso" required>
                <option value="1">DSM</option>
                <option value="2">GE</option>
            </select>

            <button type="submit">Cadastrar Vaga</button>
        </form>

        <a href="../home.php" class="back-link">Voltar à página inicial</a>

    </div>

</body>
</html>
