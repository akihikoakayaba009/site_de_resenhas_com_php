<?php

include '../conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verifica se o usuário existe antes de excluir
    $checkSql = "SELECT id FROM usuarios WHERE id = $id";
    $checkResult = $conexao->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // O usuário existe, então procedemos com a exclusão
        $deleteSql = "DELETE FROM usuarios WHERE id = $id";

        if ($conexao->query($deleteSql) === TRUE) {
            header("Location: listar.php");
            exit();
        } else {
            echo "Erro na exclusão do usuário: " . $conexao->error;
        }
    } else {
        echo "Usuário não encontrado.";
    }
} else {
    echo "ID do usuário não fornecido.";
}

$conexao->close();

?>

    $conexao->close();
?>
