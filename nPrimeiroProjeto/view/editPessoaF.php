<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$idPessoaF = 0;
if(isset($_POST['update'])){
    $idPessoaF = $_POST['id'];
}
require_once '../controller/cPessoaF.php';
$pfBD = new cPessoaF();
$pesUp = $pfBD->getPessoaById($idPessoaF);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Pessoa Fisíca</title>
    </head>
    <body>
        <h3>Editar Pessoa Fisíca</h3>
        <form method="POST" action="<?php $pfBD->update(); ?>">
            <input type="hidden" name="idPessoa" value="<?php echo $pesUp[0]['idPessoa'];?>"/>
            <input type="text" name="nome" required value="<?php echo $pesUp[0]['nome'];?>"/>
            <br><br>
            <input type="tel" name="tel" required value="<?php echo $pesUp[0]['telefone']; ?>"/>
            <br><br>
            <input type="email" name="email" required value="<?php echo $pesUp[0]['email']; ?>"/>
            <br><br>
            <input type="text" name="endereco" required value="<?php echo $pesUp[0]['endereco']; ?>"/>
            <br><br>
            <input type="number" name="cpf" required value="<?php echo $pesUp[0]['cpf']; ?>"/>
            <br><br>
            <input type="radio" name="sexo"
                   <?php if($pesUp[0]['sexo']=="F"){echo "checked";} ?>
                   required value="F">Feminino
            <input type="radio" name="sexo"
                   <?php if($pesUp[0]['sexo']=="M"){echo "checked";} ?>
                   required value="M">Masculino
            <br><br>
            <input type="submit" name="updatePF" value="Salvar Alterações">
            <input type="submit" name="cancelar" value="Cancelar"/>
        </form> 
        <?php
        // put your code here
        ?>
    </body>
</html>
