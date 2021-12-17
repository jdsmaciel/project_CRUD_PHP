<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (isset($_SESSION['logadoN']) && $_SESSION['logadoN'] == true){
    echo$_SESSION['usuarioN'] . " | " . $_SESSION['emailN'];
    echo " | <button onclick=" . "location.href=' ../controller/logout.php'" . ">Sair</a>";
}else{
    header("location: login.php");
}

require_once '../controller/cUsuario.php';
$cadUser = new cUsuario();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="../controller/logout.php">Sair</a>
        <h1>Cadastro de usuário</h1>
        <form action="<?php $cadUser->inserir(); ?>" method="post">
            <input type="text" name="nome" required placeholder="Nome aqui.."/>
            <br><br>
            <input type="email" name="email" required  placeholder="E-mail aqui.."/>
            <br><br>
            <input type="password" name="pas" required placeholder="Digite sua senha aqui.."/>
            <br><br>
            <input type="submit" name="salvar" value="Salvar"/>
            <input type="reset" name="limpar" value="Lompar"/>
            <input type="button" value="Cancelar" onclick="location.href='../index.php'"/>
            <input type="button" value="Lista Usuário" onclick="location.href='listaUsuario'"/>
        </form>
    </body>
</html>
