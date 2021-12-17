<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


        //Inicializando  a sessão
        session_start();
        
        //Renova todas as variáveis da sessão
        $_SESSION = array();
        
        //Destruir a sessão
        session_destroy();
        
        //Redirecionar para tela de login
        header("Location: ../view/login.php");
        exit;
