<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo_listar_algo.css">

</head>

<?php
include '../conexao.php';

$sql = "SELECT id, nome, tipo_de_usuario, email, senha, informacoes_Perfil FROM usuarios";
$result = $conexao->query($sql);
?>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Tipo de Usuário</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Informações de Perfil</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["tipo_de_usuario"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["senha"] . "</td>";
                echo "<td>" . $row["informacoes_Perfil"] . "</td>";
                echo "<td><a href='editar.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Sem usuários</td></tr>";
        }
        ?>
     
    
    </tbody>
    <body>
        
    <div class="menu">
        <ul>
            <li><a href="../centro/pagina.html">Página Inicial</a></li>
            <!-- Adicione mais itens de menu conforme necessário -->
        </ul>
    </div>
    
    <H3>USUÁRIOS</H3>
    <a href="adicionar.php">Adicionar novo usuário</a>
    </body>
</table>

<?php
$conexao->close();
?>
