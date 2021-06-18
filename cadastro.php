<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do sistema</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="conteudo">
        <h1> Sistema de login e senha criptografados - Cadastro de usuário </h1>
        <div class="borda"></div>
        <p>Para ter acesso ao conteúdo exclusivo, por favor, cadastre-se utilizando o formulário abaixo!</p>
        <form action="cadastraUsuario.php" method="post" id="validaAcesso">
        <fieldset>
            <legend> Faça seu cadastro abaixo: </legend>
            <label for="nome"> Seu nome: </label>
            <input type="text" name="nome" id="nome">
            <div class="clear"></div>
            <label for="email"> E-mail: </label>
            <input type="email" name="email" id="email">
            <div class="clear"></div>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha">
            <div class="clear"></div>
            <input type="submit" value="Efetuar cadastro">
        </fieldset>
        </form>
        <p>Se você já possui cadastro, <a href="index.php">clique aqui</a> para acessar o Conteúdo Exclusivo!</p>
    </div>
</body>
</html>