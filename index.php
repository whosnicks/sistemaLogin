<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login e Senha Criptografados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div id="conteudo">
        <h1> Sistema de Login e Senha Criptografados - Acesso ao Conteúdo Exclusivo</h1>
        <p> Para ter acesso ao <strong>Conteúdo Exclusivo</strong>, por favor, logue-se utilizando o formulário abaixo:</p>
        <p> Ainda não é cadastrado em nosso sistema, <a href="cadastro.php">cadastre-se</a>!</p>

        <form action="validaAcesso.php" method="post" id="validaAcesso">
            <fieldset>
                <legend> Login: </legend>
                <label for="email">E-mail: </label>
                <input type="email" name="email" id="email" required>
                <div class="clear"></div>
                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha">
                <div class="clear"></div>
                <input type="submit" value="Acessar o sistema" id="submit">
            </fieldset>
        </form>
        <p><small>Esqueceu seus dados? <a href="fsenha.php"> Clique aqui! </a></small></p>
    </div>

</body>
</html>