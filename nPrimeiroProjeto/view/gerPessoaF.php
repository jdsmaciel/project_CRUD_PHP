<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once '../controller/cPessoaF.php';
$cadPFs = new cPessoaF();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ger. Pessoa Fisíca</title>
    </head>
    <body>
        <h1>Ger. Pessoa Fisíca</h1>
        <a href="../index.php">Voltar</a>
        <br><br>
        <form method="POST" action="<?php $cadPFs->inserirBD(); ?>">
            <input type="text" name="nome" required placeholder="Nome aqui..."/>
            <br><br>
            <input type="tel" name="tel" required placeholder="Telefone aqui..."/>
            <br><br>
            <input type="email" name="email" required placeholder="E-mail aqui..."/>
            <br><br>
            <input type="text" name="endereco" required placeholder="Enderço aqui..."/>
            <br><br>
            <input type="number" name="cpf" required placeholder="CPF aqui..."/>
            <br><br>
            <input type="radio" name="sexo" required value="F">Feminino
            <input type="radio" name="sexo" required value="M">Masculino
            <br><br>
            <input type="submit" name="salvarPF" value="Salvar">
            <input type="reset" name="limpar" value="Limpar">
        </form>        
        <?php
        // put your code here
        $cadPFs->getAllPF();
        ?>
    </body>
</html>
