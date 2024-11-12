<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../login.php');
    exit();
}

require_once __DIR__ . '/../Cadastro.php';  
$cadastro = new Cadastro();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cadastro->removerVaga($_POST['id']);
    echo "Vaga removida com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Vaga</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #007bff, #33ccff);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="number"], button {
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }

        input[type="number"] {
            background-color: #fff;
            color: #333;
        }

        button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-voltar {
            text-decoration: none;
            background-color: #6c757d;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            display: block;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .btn-voltar:hover {
            background-color: #5a6268;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Remover Vaga</h1>
        <form method="POST">
            <label for="id">ID da Vaga:</label>
            <input type="number" name="id" required>
            <button type="submit">Remover Vaga</button>
        </form>
        <a href="../home.php" class="btn-voltar"><i class="fas fa-arrow-left"></i> Voltar para a Home</a>
    </div>
</body>
</html>



