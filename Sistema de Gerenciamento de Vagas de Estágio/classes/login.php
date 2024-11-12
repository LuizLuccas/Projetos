<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'estagio' && $password === 'estagio') {
        $_SESSION['login'] = true; 
        header('Location: home.php');  
        exit();
    } else {
        $erro = "Login ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #2575fc, #5c8fff); 
            overflow: hidden;
            color: #fff;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            width: 350px;
            text-align: center;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            animation: fadeIn 1.5s ease-in-out;
        }

        h2 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
            letter-spacing: 1px;
            animation: slideIn 1s ease-out;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #fff; 
            text-align: left;
            font-size: 16px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid #fff;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #5c8fff; 
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #2575fc;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #5c8fff; 
        }

        p {
            margin-top: 10px;
            color: #ff6347;
            font-size: 16px;
            animation: showError 1s ease-in-out;
        }

        .footer {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            margin-top: 20px;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-50px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            0% { opacity: 0; transform: translateX(-50px); }
            100% { opacity: 1; transform: translateX(0); }
        }

        @keyframes showError {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form method="POST">
        <label for="username">Usuário</label>
        <input type="text" name="username" id="username" placeholder="Usuário" required><br>

        <label for="password">Senha</label>
        <input type="password" name="password" id="password" placeholder="Senha" required><br>

        <button type="submit">Entrar</button>
    </form>

    <?php if (isset($erro)) echo "<p>$erro</p>"; ?>
    
    
</div>

</body>
</html>
