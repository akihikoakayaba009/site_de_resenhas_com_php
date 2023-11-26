<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/estilo2.css">
    <title>Tela de Login</title>
</head>
<body>
    <div class="login">
        <h2>Login</h2>
        <form method="post" action="login.php">
            <label for="email">Email:</label>
            <input type="text" name="email" required><br><br>

            <label for="password">Senha:</label>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>

<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'";

    $result = $conexao->query($sql);

    if ($result->num_rows == 1) {
        header("Location: ../centro/pagina.html");
        exit(); 
    } else {
        
        header("Location: adicionar.php");
        exit(); 
    }
}

$conexao->close();
?>
