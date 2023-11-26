<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Filme</title>
</head>
<body>


<div class="login">
    <form action="adicionar_filme.php" method="post">
    <h2>Adicionar Filme</h2>
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br>

        <label for="resumo">Resumo:</label>
        <input type="text" name="resumo" required><br>

        <label for="ano">Ano de Lançamento:</label>
        <input type="date" name="ano" required><br>

        <label for="data">Data que viu o Filme:</label>
        <input type="date" name="data" required><br>

        <label for="id_genero">Gênero:</label>
        <select name="id_genero">
            <?php
            include '../conexao.php';

            $sql_generos = "SELECT id, Genero FROM genero";
            $result_generos = $conexao->query($sql_generos);

            while ($row_genero = $result_generos->fetch_assoc()) {
                echo "<option value='" . $row_genero["id"] . "'>" . $row_genero["Genero"] . "</option>";
            }

            $conexao->close();
            ?>
        </select><br>

        <label for="visto_ou_não">status do filme</label>
        <input type="text" name="visto_ou_não" required><br>


        <input type="submit" value="Adicionar Filme">
    </form>
</div>

</body>
</html>
<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $resumo = $_POST["resumo"];
    $ano = $_POST["ano"];
    $data = $_POST["data"];
    $id_genero = $_POST["id_genero"];
    $visto_ou_não = $_POST["visto_ou_não"];

    
    $sql_verificar_genero = "SELECT * FROM genero WHERE id = '$id_genero'";
    $result_verificar_genero = $conexao->query($sql_verificar_genero);

    if ($result_verificar_genero->num_rows > 0) {
       
        $sql = "INSERT INTO filmes (titulo, Resumo_do_filme, ano_de_lancamento, Quando_vi_o_filme, id_genero, visto_ou_não)
                VALUES ('$titulo', '$resumo', '$ano', '$data', '$id_genero', '$visto_ou_não')";

        if ($conexao->query($sql) === TRUE) {
            header("Location: listar_com_join.php");
        } else {
            echo "Erro ao adicionar filme: " . $conexao->error;
        }
    } else {
        echo "Gênero não encontrado.";
    }
}

$conexao->close();
?>
