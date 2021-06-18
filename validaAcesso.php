<?php 
    session_start();
    include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login e Senha Criptografados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="conteudo">
    <h1> Sistema de login e senha criptografados - Verificando Informações </h1>
    <div class="borda"></div>
    <?php
        $recebeEmail = $_POST['email'];
        $filtraEmail = filter_var($recebeEmail, FILTER_SANITIZE_SPECIAL_CHARS);
        $filtraEmail = filter_var($filtraEmail, FILTER_SANITIZE_ADD_SLASHES);
        $recebeSenha = $_POST['senha'];
        $filtraSenha = filter_var($recebeSenha, FILTER_SANITIZE_SPECIAL_CHARS);
        $filtraSenha = filter_var($filtraSenha, FILTER_SANITIZE_ADD_SLASHES);

        function criptoSenha($criptoSenha) {
            return md5($criptoSenha);
        }
        $criptoSenha = criptoSenha($filtraSenha);
        $consultaInformacoes = mysqli_query($conecta, "SELECT * FROM tblusuario WHERE email_tblusuario = '$filtraEmail' AND senha_tblusuario = '$criptoSenha'") or die (mysqli_error($conecta));
        $verificaInformacoes = mysqli_num_rows($consultaInformacoes);
        if($verificaInformacoes == 1) {
            while ($result = mysqli_fetch_array($consultaInformacoes)) {
                $_SESSION['login'] = true;
                $_SESSION['nome_usuario'] = $result['nome_tblusuario'];
                header("Location: conteudoExclusivo.php");
            }
        } else {
            echo "<p> Nome de usuário ou Senha inválidos <a href='javascript:history.back();'>volte</a> e tente novamente!</p>";
        }
    ?>
    </div>
</body>
</html>