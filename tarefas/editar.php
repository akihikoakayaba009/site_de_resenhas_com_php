<?php

include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $informacoes_perfil = $_POST['informacoes_perfil'];

    $sql = "UPDATE usuarios SET nome='$nome', email ='$email', senha = '$senha', informacoes_perfil = '$informacoes_perfil' WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        header("location: listar.php?id=" . $id);
    } else {
        echo "Erro na atualização: " . $conexao->error;
    }

    $conexao->close();
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT id, nome, email, senha, informacoes_perfil FROM usuarios WHERE id = $id";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $usuarios = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Nenhum usuário encontrado com o ID fornecido";
        exit;
    }
} else {
    echo "ID não fornecido para edição";
    exit;
}
?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/formulario_de_editar.css">
<div class="login">
    <form method="post" action="editar.php">
        ID: <input type="number" name="id" value="<?php echo $usuarios[0]['id'] ?>" readonly></br>
        Nome: <input type="text" name="nome" value="<?php echo $usuarios[0]['nome'] ?>">
        Email: <input type="text" name="email" value="<?php echo $usuarios[0]['email'] ?>"><br>
        Senha: <input type="text" name="senha" value="<?php echo $usuarios[0]['senha'] ?>"><br>
        Informações do perfil: <input type="text" name="informacoes_perfil" value="<?php echo $usuarios[0]['informacoes_perfil'] ?>"><br>
        <input type="submit" value="Salvar">
    </form>
</div>
