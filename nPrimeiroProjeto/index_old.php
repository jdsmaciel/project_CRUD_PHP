<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php

    function show($a) {
        ?>
        <a href="https://www.<?php echo $a ?>.com.br" target="blank">
            <?php echo $a ?>
        </a>
        <?php
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Primeiro Projeto</title>
    </head>
    <body>
        <table><!--Cria tabela -->
            <tr><!--Cria linha -->
                <td><!--Cria coluna -->
                    <h1>Primeiro Projeto Php</h1>
                    <h2>Turma: DEV3N201</h2>
                    <?php
                    // put your code here
                    $valor = 4;
                    $divisor = 2;
                    $resultado = $valor % $divisor; //% faz o mod ou modal
                    if ($resultado == 0) {
                        echo 'Valor ' . $valor . ' é Par!';
                    } else {
                        echo 'Valor ' . $valor . ' é Impar!';
                    }
                    echo '<p>';
                    show('Google');
                    echo ' | ';
                    show('Terra');
                    echo ' | ';
                    show('Youtube');
                    ?>
                </td><!--Fecha coluna -->
                <td>
                    <h3>Form. Get</h3>
                    <Form method="GET">
                        <label>Nome: </label>
                        <input type="text" name="nome"/>
                        <br>
                        <label>Idade: </label>
                        <input type="number" name="idade"/>
                        <br>
                        <input type="submit" value="Calcular" name="calc" />
                        <input type="reset" value="Limpar" name="limpar" />
                    </Form>
                </td>
                <td>
                    <p></p>
                    <h3>Form. Post</h3>
                    <form method="POST">
                        <input type="text" name="nome" placeholder="Nome aqui..."/>
                        <br>
                        <input type="number" name="idade" placeholder="Idade aqui..."/>
                        <br>
                        <input type="submit" value="Calcular" name="calc" />
                        <input type="reset" value="Limpar" name="limpar" />
                    </form>
                </td>
            </tr><!--Fecha linha -->
        </table><!--Fecha tabela -->
        <?php
        require_once './controller/cPessoaF.php';
        require_once './controller/cPessoaJ.php';
        $cadPFs = new cPessoaF();
        $cadPJs = new cPessoaJ();
        
        $pf1 = new pessoaF();
        $pf1->setNome('Fulana de Tal');
        $pf1->setTelefone(51999998899);
        $pf1->setEmail('fulana@bol.com.br');
        $pf1->setEndereco('Rua Mario Quintana');
        $pf1->setCpf(321123321123);
        $pf1->setSexo('F');
        $cadPFs->addPessoaF($pf1);
        
        $pj1 = new pessoaJ();
        $pj1->setNome('Grupo Zaffari');
        $pj1->setTelefone(5130403040);
        $pj1->setEmail('contatogrv@stock.com.br');
        $pj1->setEndereco('ERS 118');
        $pj1->setCnpj(321312123000101);
        $pj1->setNomeFantasia('Stock Gravataí');
        $cadPJs->addPessoaJ($pj1);
        
        echo '<table><tr><td>';
        $cadPFs->imprime();
        echo '</td><td>';
        $cadPJs->imprimePJ();
        echo '</td></tr></table>'
        ?>
        <h3>Cadastro de PF</h3>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome aqui...">
            <br>
            <input type="tel" name="tel" placeholder="Telefone aqui...">
            <br>
            <input type="email" name="email" placeholder="E-mail aqui...">
            <br>
            <input type="text" name="end" placeholder="Enderço aqui...">
            <br>
            <input type="number" name="cpf" placeholder="CPF aqui...">
            <br>
            <input type="text" name="sexo" placeholder="Sexo aqui...">
            <br>
            <input type="submit" name="salvarPF" value="Salvar">
            <input type="reset" name="limpar" value="Limpar">
        </form>
    </body>
    <?php
    if (isset($_GET['calc'])) {
        $dias = $_GET['idade'] * 365;
        $msg = 'Get: ' . $_GET['nome'] . ' tem ' . $_GET['idade']
                . ' anos e já viveu ' . $dias . ' dias aproximadamente!';
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    if (isset($_POST['calc'])) {
        $msg = 'Post: ' . $_POST['nome'] . ' tem ' . $_POST['idade']
                . ' anos de vida.' . ' E já viveu ' . $_POST['idade'] * 365
                . ' dias aproximadamente.';
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    if(isset($_POST['salvarPF'])){
        $formPF = new pessoaF();
        $formPF->setNome($_POST['nome']);
        $formPF->setTelefone($_POST['tel']);
        $formPF->setEmail($_POST['email']);
        $formPF->setEndereco($_POST['end']);
        $formPF->setCpf($_POST['cpf']);
        $formPF->setSexo($_POST['sexo']);
        $cadPFs->addPessoaF($formPF);
        $cadPFs->imprime();
    }
    ?>
</html>
