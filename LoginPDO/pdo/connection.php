<?php
//requerendo o arquivo de configuração
require_once 'config.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connection
 *
 * @author maciel
 */
class connection {
    //PDO é um método de conexão com o banco 
    //(https://www.php.net/manual/pt_BR/pdo.setattribute.php)
    //https://www.php.net/manual/pt_BR/intro.pdo.php
    //recebendo os parametros já definidos no config.
    public static function getConnection($host, $dbName, $user, $password){
       $dsn = "mysql:host=$host;dbname=$dbName;charset=UTF8";
       
       //Os pontos de interrogação indicam que será inseridas 
       
       
       try {
           $options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
           return new PDO($dsn, $user, $password, $options);
       } catch (PDOException $ex) {
           die ($ex->getMessage());   
       }
    }
}
//fora classe, depois de ser requerido ele retorna o getConnection( deficnodos no config
return connection::getConnection($host, $dbName, $user, $password);
