<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $resumo = $_POST['resumo'];
    $ano = $_POST['ano'];
    $data = $_POST['data'];
    $genero = $_POST['genero'];
    $visto_ou_nao = $_POST['visto_ou_nao'];

    $sql = "UPDATE filmes SET 
            titulo = '$titulo',
            Resumo_do_filme = '$resumo',
            ano_de_lancamento = '$ano',
            Quando_vi_o_filme = '$data',
            id_genero = '$genero',
            visto_ou_nao = '$visto_ou_nao'
            WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        header("location: listar_com_join.php");
        exit;  // Adicione esta linha para garantir que o script pare após o redirecionamento
    } else {
        echo "Erro na atualização: " . $conexao->error;
    }

    $conexao->close();
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM filmes WHERE id = $id";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $filme = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Nenhum filme encontrado com o ID fornecido";
        exit;
    }
} else {
    echo "ID não fornecido para edição";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filme</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/formulario_de_editar.css">
</head>
<body>
    <div class="login">
        <form method="post" action="editar_filmes.php">
            ID: <input type="number" name="id" value="<?php echo $filme[0]['id'] ?>" readonly><br>
            Título: <input type="text" name="titulo" value="<?php echo $filme[0]['titulo'] ?>"><br>
            Resumo: <textarea name="resumo"><?php echo $filme[0]['Resumo_do_filme'] ?></textarea><br>
            Ano de Lançamento: <input type="text" name="ano" value="<?php echo $filme[0]['ano_de_lancamento'] ?>"><br>
            Data que viu o Filme: <input type="text" name="data" value="<?php echo $filme[0]['Quando_vi_o_filme'] ?>"><br>
            Gênero: <input type="text" name="genero" value="<?php echo $filme[0]['id_genero'] ?>"><br>
            Status do Filme: <input type="text" name="visto_ou_nao" value="<?php echo $filme[0]['visto_ou_nao'] ?>"><br>
            <input type="submit" value="Salvar">
        </form>
    </div>
</body>
</html>
