<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
        <title>Projeto CI3 + BS4</title>
    </head>
    <body>
        <div class="container">
            <?php if($this->session->userdata('estou_logado')) { ?> 
            <?php echo $this->session->userdata('logado')->nomeUsuario; ?> |
        <a href="<?php echo base_url(); ?>login/sair">Sair</a>
        <br>
        <a href="<?php echo base_url(); ?>pessoa"> Cadastro Pessoa</a>
        <a href="<?php echo base_url(); ?>user">Cadastro de User</a>  
        <?php } ?>