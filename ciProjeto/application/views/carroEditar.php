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
        <a href="<?php echo base_url() . 'carro'; ?>">Voltar</a>
        <h1>Editar Carro</h1>
        <?php echo form_open('carro/atualizar'); ?>
            <input type="hidden" name="idCarro" required value="<?php echo $carro[0]->idCarro; ?>">
            <input type="color" name="cor" required value="<?php echo $carro[0]->cor; ?>">
            <br><br>
            <input type="text" name="marca" required value="<?php echo $carro[0]->marca; ?>">
            <br><br>
            <input type="text" name="modelo" required value="<?php echo $carro[0]->modelo; ?>">
            <br><br>
            <input type="text" name="placa" required value="<?php echo $carro[0]->placa; ?>">
            <br><br>
            <input type="text" name="porta" required value="<?php echo $carro[0]->porta; ?>">
            
            <br><br>
            <select name="idPessoa">
                <option value="">Proprietário</option>
                <?php foreach ($pessoas as $pes): ?>
                <option value="<?php echo $pes->idPessoa; ?>"
                    <?php if($pes->idPessoa == $carro[0]->idPessoa){
                        echo 'selected';} ?>>
                    <?php echo $pes->nome; ?>
                </option>     
                <?php endforeach; ?>
            </select>   
            <br><br>
            <input type="submit" name="salvarPF" value="Salvar">
        <?php echo form_close(); ?>
    </body>
</html>
