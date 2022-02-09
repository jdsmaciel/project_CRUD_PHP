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
        <a href="<?php echo base_url() . 'home'; ?>">Home</a>
        <h1>Cadastro de Carro</h1>
        <?php echo form_open('carro/inserir'); ?>
            <input type="text" name="marca" required placeholder="Marca aqui..."/>
            <br><br>
            <input type="color" name="cor" required placeholder="Cor aqui..."/>
            <br><br>
            <input type="text" name="modelo" required placeholder="Modelo aqui..."/>
            <br><br>
            <input type="text" name="placa" required placeholder="Placa aqui..."/>
            <br><br>           
            <input type="text" name="porta" placeholder="Portas aqui..."/>
            <br><br>
            <select name="idPessoa"^>
                <option value="">Proprietario</option>
                <?php foreach ($pessoas as $pes): ?>
                <option value="<?php echo $pes->idPessoa; ?>">
                    <?php echo $pes->nome; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <br><br>
            <input type="submit" name="salvarPF" value="Salvar">
            <input type="reset" name="limpar" value="Limpar">
        <?php echo form_close(); ?>
            
            
        <h2>Lista de Carros</h2>
        <table>
            <thead>
                <tr>
                    <th>Cor</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>Portas</th>
                    <th>Proprietário</th>
                    <th>Funções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carros as $car): ?>
                <tr>
                <td><input type="color" name="cor" disabled value="<?php echo $car->cor; ?>"></td>
                    <td><?php echo $car->marca; ?></td>
                    <td><?php echo $car->modelo; ?></td>
                    <td><?php echo $car->placa; ?></td>
                    <td><?php echo $car->porta; ?></td>

                    <td><?php 
                        foreach ($pessoas as $pes):
                            if($pes->idPessoa==$car->idPessoa){
                                echo $pes->nome;
                                break;
                            }
                        endforeach;
                        ?>
                    </td>
                    <td>  
                        <a href="<?php echo base_url() . 
                                'carro/editar/' .
                                $car->idCarro;?>">Editar</a> | 
                        <a href="<?php echo base_url() . 
                                'carro/excluir/' .
                                $car->idCarro;?>">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
