<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php

    function geraLink($a, $s) {
        ?>
        <a href="./view/<?php echo $a ?>.php">
            <?php echo $s ?>
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
                    <h1>Cadastro de Pessoas</h1>
                    <?php
                    geraLink('gerPessoaF', 'Ger. Passoa Fisíca');
                    echo ' | ';
                    geraLink('gerPessoaJ', 'Ger. Pessoa Jurídica');
                    ?>
                </td>
            </tr>
        </table>
    </body>
</html>
