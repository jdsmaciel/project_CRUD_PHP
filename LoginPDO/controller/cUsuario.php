<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cUsuario
 *
 * @author maciel
 */
class cUsuario {
    //put your code here
    public function inserir(){
        if(isset($_POST['salvar'])){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $pas = $_POST['pas'];
            // https://www.php.net/manual/pt_BR/pdostatement.bindparam.php
            // https://www.php.net/manual/pt_BR/class.pdostatement.php
            $pdo = require '../pdo/connection.php';
            $sql = "insert into usuario (nomeUser, email, pas) values (?,?,?)";
            $sth = $pdo->prepare($sql);
            // forma direta ( se usar não poderá incriptar depois
            //$sth->execute([$nome,$email,$pas]);
            
            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $email, PDO::PARAM_STR);
            //recebe o $PAS
            $sth->bindParam(3, $pass, PDO::PARAM_STR);

            $pass= password_hash($pas, PASSWORD_DEFAULT);
            $sth->execute();
            unset($pdo);
            unset($sth);
        }
    }
    
    public function getUsuarios(){
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idUser, nomeUser, email from usuario";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
    }
    //cadastros e registros muito cuidado com delete
    /**
     * Revisar esse método, não está deletando 
     * Solução temporária foi criar um PHP file e copiar o IF inteiro  
     */
//    public function deletar(){
//        if(isset($_POST['deletar'])){
//            $id = $_POST['idUser'];
//            //requer conexão
//            $pdo = require_once '../pdo/connection.php';
//            //Query paramétro
//            $sql = "delete from usuario where idUser = ?";
//            $sth = $pdo->prepare($sql);
//            $sth->bindParam(1, $id, PDO::PARAM_INT);
//            $sth->execute();
//            unset($sth);
//            unset($pdo);
//            header("Refresh: 0");
//        }
//    }
      
    public function getUsuarioById($id) {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idUser, nomeUser, email from usuario where idUser = ?";
        $sth = $pdo->prepare($sql);
        $sth->execute(['$id']);
        $result = $sth->fetchAll();
        //Limpa as memórias
        unset($sth);
        unset($pdo);
        return $result;
    }
    
    public function updateUser(){
        if(isset($_POST['update'])){
            $id = $_POST['idUser'];
            $nome = $_POST['nomeUser'];
            //$email = $_POST['email'];
            var_dump($_POST);
            $pdo = require_once '../pdo/connection.php';
            $sql = "update usuario set nomeUser = ? where isUser = ?";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $id, PDO::PARAM_INT);
            $sth->execute();
            unset($sth);
            unset($pdo);
            //header("location: ../view/listaUsuarios.php");
        }
    }
}
