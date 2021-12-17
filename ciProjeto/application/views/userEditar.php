<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="<?php echo base_url() . 'usuario'; ?>">Voltar</a>
        <h1>Editar Usuario</h1>
        <?php echo form_open('user/atualizar'); ?>
        
            <input type="hidden" name="idusuario" required value="<?php echo $user[0]->idusuario; ?>"/>
            <br><br>
            <input type="text" name="nomeUsuario" required value="<?php echo $user[0]->nomeUsuario; ?>"/>
            <br><br>           
            <input type="text" name="user" required value="<?php echo $user[0]->user; ?>"/>
            <br><br>
            <input type="text" name="perfilAcesso" required placeholder="Perfil Acesso aqui..." value="<?php echo $user[0]->perfilAcesso; ?>"/>
            <br><br>
            <input type="radio" required 
                <?php if($user[0]->perfilAcesso=='admin'){echo 'checked';} ?> name="perfilAcesso" value="admin"/>Administrador 
            <input type="radio" required 
                   <?php if($user[0]->perfilAcesso=='user'){echo 'checked';} ?> name="perfilAcesso" value="user" />Usuário
            <br><br>
            <input type="submit" value="Salvar">
        <?php echo form_close(); ?>
        
    </body>
</html>
