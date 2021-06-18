<?php 
     include "conexao.php"; 
     $recebeEmail = $_POST['email'];
     $filtraEmail = filter_var($recebeEmail,FILTER_SANITIZE_SPECIAL_CHARS);
     $filtraEmail = filter_var($filtraEmail, FILTER_SANITIZE_ADD_SLASHES);
     $sql_pesq = mysqli_query($conecta, "SELECT * FROM tblusuario WHERE email_tblusuario = '$email'") or die (mysqli_error($conecta));
     $verifica = mysqli_num_rows($sql_pesq);
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
    <div id="conteudo">
        <?php if ($verifica == 0) { ?> 
        <h2> E-mail inválido! </h2>
        <p> Desculpe, mas o e-mail solicitado não &eacute; cadastrado. </p>
        <p>Entre em contato com o administrador do sistema.<br>
        Se quiser tentar novamente, <a href="../">clique aqui</a>.<p>
        <p>Obrigado.</p>
        <?php }
        else {
           $result = mysqli_fetch_array($sql_pesq);
           $id_usuario = $result['id_tblusuario'];
           $nome = $linha['nome_tblusuario'];
            $email = $linha['email'];
            function gerarSenha ($tamanho = 8, $maisculas = true, $numeros = true, $simbolos = false) {
                $lmin = 'abcdefghijklmnopqrstuvwxyz';
                $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $num = '1234567890';
                $simb = '!@#$%*-';
                $retorno = '';
                $caracteres = '';
                $caracteres .= $lmin;
                if ($maisculas) $caracteres .= $lmai;
                if ($numeros) $caracteres .= $num;
                if ($simbolos) $caracteres .= $simb;
                $len = strlen($caracteres);
                for ($n = 1; $n <= $tamanho; $n++) {
                    $rand = mt_rand(1, $len);
                    $retorno .= $caracteres[$rand-1];
                }
                return $retorno;
            }

            $novasenha = gerarSenha(9, true, false);
            $senhamd5 = md5($novasenha);

            $query = "UPDATE tblusuario SET senha_tblusuario = 'senhamd5' WHERE id_usuario = " . $id_usuario;
            $rs = mysqli_query($conecta, $query);
            $formato = "\nContent-type: text/html";
            $msg = "Olá, $nome. Recebemos uma solicitação para renovar sua senha.<br><br>";
                    $msg .= "Seu usuario: <strong>$usuario</strong><br>";
                    $msg .= "Sua <strong>nova</strong> senha: <strong>$novasenha</strong><br><br>";
                    $msg .= "Caso não tenha solicitado esta ação. Acesse a sua conta e altere sua senha novamente.<br>";
                    $msg .= "<br>";	
                    $msg .= "Obrigado.<br>";
                    mail("$email","Nova Senha","$msg", "From: Sistema <sistema@sistema.com> ".$formato);
        ?>
        <h2> Senha enviada! </h2>
        <p>Parabéns. Sua senha foi enviada para o e-mail solicitado.</p>
        <p>Após verificar seu e-mail, retorne à página de login.</p>
        <p>Se preferir, <a href="index.php">clique aqui</a>.</p>
        <p>Obrigado!</p>
        <?php } ?>
    </div>
</body>
</html>