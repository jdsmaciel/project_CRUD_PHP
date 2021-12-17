<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Login -  Teste de Criptografia</h1>
        <h2>Cripto mais conhecidas: MDS e Shal</h2>
        <h3>Mas vamos ver outras como: sha256, sha512, base64 e password_hash</h3>
        <h4>Cadastro de usuário</h4>
        <form method="post">
            <input type="text" name="nome"  placeholder="Nome aqui.."/>
            <br><br>
            <input type="email" name="email"  placeholder="E-mail aqui.."/>
            <br><br>
            <input type="password" name="pas"  placeholder="Digite sua senha aqui.."/>
            <br><br>
            <input type="submit" name="salvar" value="Salvar"/>
            <input type="reset" name="limpar" value="Lompar"/>
        </form>
        <?php
        // put your code here
        if(isset($_POST['salvar'])){
            echo "<br>.: Dados de usuário :.";
            echo "<br> Nome: " . $_POST['nome'];
            echo "<br> E-mail: " . $_POST['email'];
            echo "<br> Senha: " . $_POST['pas'];
            $pas = $_POST['pas'];
            $criptoMD5 = md5($pas);
            $criptoSha1 = sha1($pas);
            $criptoSha256 = hash("sha256",$pas);
            $criptoSha512 = hash("sha512",$pas);
            $criptoBase64 = base64_encode($pas);
            $criptoPassword_hash = password_hash($pas, PASSWORD_DEFAULT);
            echo "<br>.: Padrões de Criptografia :.";
            echo "<br> MD5: " . $criptoMD5;
            echo "<br> sha1: " . $criptoSha1;
            echo "<br> sha256: " . $criptoSha256;
            echo "<br> sha512: " . $criptoSha512;
            echo "<br> Base64: " . $criptoBase64;
            echo "<br> Base64-Decode: " . base64_decode($criptoBase64);
            echo "<br> Password_hash: " . $criptoPassword_hash;
            
            $pas2 = "admin";
            $pasBD = '$2y$10$mfPj7w384jZyImmFanKBYe.C9OtULc37IkA3JzRr/Atrh3XjrLM/a';
            if(password_verify($pas2, $pasBD)){
                echo  "<br>Senha válida";
            }else{
                echo "<br>Senha inválida";
            }
            //passverify : boolean ele trar úm verdadeiro ou falce
        }
        ?>
    </body>
</html>
