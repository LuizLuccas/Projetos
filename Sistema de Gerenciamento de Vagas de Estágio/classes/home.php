<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo - Sistema de Gerenciamento de Vagas de Estágio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4b6cb7, #182848); /
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 40px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin: 20px 0; 
        }

        ul li a {
            text-decoration: none;
            font-size: 1.2rem;
            color: white;
            padding: 15px 25px; 
            background-color: #007bff;
            border-radius: 5px;
            display: inline-block;
            width: 250px; 
            text-align: center; 
            transition: background-color 0.3s ease;
        }

        ul li a:hover {
            background-color: #0056b3;
        }

        .logout-btn {
            background-color: #dc3545;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <div>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Vagas de Estágio</h1>
        <p>Selecione uma opção abaixo:</p>

        <ul>
            <li><a href="pages/cadastro.php">Cadastrar Vaga</a></li>
            <li><a href="pages/remover.php">Remover Vaga</a></li>
            <li><a href="pages/listar.php">Visualizar Vagas</a></li>
            <li><a href="logout.php" class="logout-btn">Logout</a></li>
        </ul>
    </div>

</body>
</html>
