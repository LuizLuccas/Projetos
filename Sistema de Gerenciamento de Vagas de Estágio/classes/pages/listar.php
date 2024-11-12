<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../login.php');
    exit();
}

require_once __DIR__ . '/../Cadastro.php';  
$cadastro = new Cadastro();
$vagas = $cadastro->listarVagas();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Vagas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #007bff, #33ccff);
            color: white;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 900px;
            overflow-x: auto;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            color: #333;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e2e2e2;
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
            width: fit-content;
            margin: 20px auto;
        }

        .btn-voltar:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Vagas de Estágio Cadastradas</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome da Empresa</th>
                    <th>Whatsapp</th>
                    <th>Email</th>
                    <th>Descrição</th>
                    <th>Curso</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vagas as $vaga): ?>
                <tr>
                    <td><?php echo htmlspecialchars($vaga['id']); ?></td>
                    <td><?php echo htmlspecialchars($vaga['nome_empresa']); ?></td>
                    <td><?php echo htmlspecialchars($vaga['numero_whatsapp']); ?></td>
                    <td><?php echo htmlspecialchars($vaga['email_contato']); ?></td>
                    <td><?php echo htmlspecialchars($vaga['descritivo_vaga']) ?: 'Não disponível'; ?></td>
                    <td><?php echo htmlspecialchars($vaga['curso']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="../home.php" class="btn-voltar"><i class="fas fa-arrow-left"></i> Voltar para a Home</a>
    </div>
</body>
</html>
