<?php
    include "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de login e senha criptografados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="conteudo">
        <h1>Sistema de login e senha criptografados</h1>
        <div class="borda"></div>

        <?php
            $recebeNome = $_POST['nome'];
            $filtraNome = filter_var($recebeNome, FILTER_SANITIZE_SPECIAL_CHARS);
            $filtraNome = filter_var($filtraNome, FILTER_SANITIZE_ADD_SLASHES);
            $recebeEmail = $_POST['email'];
            $filtraEmail = filter_var($recebeEmail, FILTER_SANITIZE_SPECIAL_CHARS);
            $filtraEmail = filter_var($filtraEmail, FILTER_SANITIZE_ADD_SLASHES);
            $recebeSenha = $_POST['senha'];
            $filtraSenha = filter_var($recebeSenha. FILTER_SANITIZE_SPECIAL_CHARS);
            $filtraSenha = filter_var($filtraSenha, FILTER_SANITIZE_ADD_SLASHES);
            function criptoSenha($criptoSenha) {
                return md5($criptoSenha);
            }
            $criptoSenha = criptoSenha($filtraSenha);
            $consultaBanco = mysqli_query($conecta, "SELECT * FROM tblusuario WHERE email_tblusuario = '$recebeEmail'") or die (mysqli_errno($conecta));
            $verificaBanco = mysqli_num_rows($consultaBanco);
            if($verificaBanco == 1) {
                echo "<p>Prezado(a) <strong>$recebeNome</strong>, o endereço de e-mail informado (<strong><em>$recebeEmail</em></strong>) já consta em nossa base de dados!</p>";
                echo "<p><a href='javascript:history.back();'>Volte</a> para a página anterior e informe um novo endereço! Obrigado!</p>";
                return false;
            } else {
                $insereDados = mysqli_query($conecta, "INSERT INTO tblusuario (nome_tblusuario, email_tblusuario, senha_tblusuario) VALUES ('$filtraNome', '$filtraEmail', '$criptoSenha')") or die (mysqli_errno($conecta));
                echo "<p>Seu cadastro foi efetuado com sucesso!</p>";
            }
        ?>

    </div>
</body>
</html>