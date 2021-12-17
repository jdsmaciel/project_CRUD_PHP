<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

    <?php
            session_start();
    if (isset($_SESSION['logadoN']) && $_SESSION['logadoN'] == true){
        echo$_SESSION['usiárioN'] . " | " . $_SESSION['emailN'];
        " | <button onclick=" . "location.href='../controller/logout.php'>Sair</button>";
    }else{
        header("location: view/login.php");
    }
    ?>
        
//        // put your code here
//        $pdo = require './pdo/connection.php';
//        
//         //   $sql = 'insert into pessoa (nome,cpf) values (?,?)';
//         //   $statement = $pdo->prepare($sql);
//         //   $statement->execute(['Luiz','81965523412']);
//       
//        foreach ($pdo->query('select * from pessoa') as $row){
//            print $row['nome'] . "\t";
//            print $row['telefone'] . "\t";
//            print $row['endereco'] . "\t";
//            echo "<br>";
//        }

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Página Inicial</h1>
        <p>
        <a href='view/cadUsuario.php'"> Cadastro de usuário</a>
        <button onclick="location.href='view/cadUsuario.php'"> Cadastro de usuário</button>
    </body>
</html>
