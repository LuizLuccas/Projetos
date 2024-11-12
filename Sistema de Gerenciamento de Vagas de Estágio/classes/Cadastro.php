<?php
class Cadastro {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=vagas", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    }

    public function __destruct() {
        $this->pdo = null;
    }

    public function cadastrarVaga($nomeEmpresa, $whatsapp, $email, $descricao, $curso) {
        $sql = "INSERT INTO vagas (nome_empresa, numero_whatsapp, email_contato, descritivo_vaga, curso) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nomeEmpresa, $whatsapp, $email, $descricao, $curso]);
    }

    public function removerVaga($id) {
        $sql = "DELETE FROM vagas WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function listarVagas() {
        $sql = "SELECT * FROM vagas";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
