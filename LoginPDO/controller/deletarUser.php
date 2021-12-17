<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['deletar'])){
            $id = $_POST['idUser'];
            //requer conexão
            $pdo = require_once '../pdo/connection.php';
            //Query paramétro
            $sql = "delete from usuario where idUser = ?";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $id, PDO::PARAM_INT);
            $sth->execute();
            unset($sth);
            unset($pdo);
            header("location: ../view/listaUsuarios.php");
        }