<!DOCTYPE html>
<html>
<head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <title>Adicionar</title>
  <link rel="stylesheet" type="text/css" href="../css/estilo2.css">
  <script type="text/javascript" src="../js/meu-arquivo.js"></script>
</head>

<body> 
  <div class="login">
    <h1>Adicionar Usuário</h1>
    <form method="post" action="adicionar.php">
      <div class="campos">
        Nome: <input type="text" name="nome"><br>
        <fieldset>
          <legend>Tipo de Usuário</legend>
          <div id="opcoes" class="oculto">
            <input type="radio" id="usuario" name="tipo_de_usuario" value="usuario">
            <label for="usuario">Usuário</label><br>
            <input type="radio" id="ator" name="tipo_de_usuario" value="ator">
            <label for="ator">Ator</label><br>
            <input type="radio" id="diretor" name="tipo_de_usuario" value="diretor">
            <label for="diretor">Diretor</label><br>
          </div>
        </fieldset>
        Email: <input type="email" name="email"><br>
        Senha: <input type="password" name="password" max="14" min><br>
        Informações Perfil: <textarea name="descricao_perfil" id="id" cols="30" rows="10"></textarea><br>
        <div class="botao_enviar">
          <input type="submit" value="Adicionar" id="botao_enviar">
        </div>
      </div>
    </form>
  </div>
</body>
</html>

<?php
  include '../conexao.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $tipo_de_usuario = $_POST['tipo_de_usuario']; // Corrigido para corresponder ao name dos inputs de tipo de usuário
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $descricao_perfil = $_POST['descricao_perfil']; // Ajustado para corresponder ao name do textarea

    $sql = "INSERT INTO usuarios (nome, tipo_de_usuario, email, senha, informacoes_perfil) 
            VALUES ('$nome', '$tipo_de_usuario', '$email', '$senha', '$descricao_perfil')"; // Adicionada vírgula entre os valores
    if ($conexao->query($sql) === TRUE) {
      header("Location: login.php");
    } else {
      echo "Erro: " . $conexao->error;
    }
  }

  $conexao->close();
?>
