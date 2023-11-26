<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo_listar_algo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Filmes</title>
</head>
<body>
<body>
        
        <div class="menu">
            <ul>
                <li><a href="../centro/pagina.html">Página Inicial</a></li>
                <!-- Adicione mais itens de menu conforme necessário -->
            </ul>
        </div>
       <center> <h2>Listar Filmes</h2></center>
        <a href="adicionar_filme.php">Adicionar novo Filme</a>
        </body>


<div class="login">
    <?php
    include '../conexao.php';

    $sql = "SELECT filmes.id, filmes.titulo, filmes.Resumo_do_filme, filmes.ano_de_lancamento, filmes.Quando_vi_o_filme, genero.Genero, visto_ou_nao
            FROM filmes
            INNER JOIN genero ON filmes.id_genero = genero.id
            ORDER BY filmes.id DESC";

    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Resumo</th>
                    <th>Ano de Lançamento</th>
                    <th>Data que viu o Filme</th>
                    <th>status do </th>
                    <th>Gênero</th>
                   <th>ações</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["titulo"] . "</td>
                    <td>" . $row["Resumo_do_filme"] . "</td>
                    <td>" . $row["ano_de_lancamento"] . "</td>
                    <td>" . $row["Quando_vi_o_filme"] . "</td>
                    <td>" . $row["Genero"] . "</td>
                    <td>" . $row["visto_ou_nao"] . "</td>
                    <td><a href='editar_filmes.php?id=" . $row["id"] . "'>Editar</a> 
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum filme encontrado.";
    }

    $conexao->close();
    ?>
</div>

</body>
</html>
