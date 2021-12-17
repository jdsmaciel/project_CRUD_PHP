<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cPessoaF
 *
 * @author Jaderson Maciel
 */
require_once '../model/pessoaF.php';

class cPessoaF {

    //put your code here
    private $pf = []; //array de Pessoas Fisícas

    public function __construct() {
        $this->mokPF();
    }

    public function mokPF() {
        $pf1 = new pessoaF();
        $pf1->setNome('Jair Ferraz');
        $pf1->setTelefone(51999889988);
        $pf1->setEmail('jbferraz@senacrs.com.br');
        $pf1->setEndereco('Rua das Oliveiras');
        $pf1->setCpf(123321123321);
        $pf1->setSexo('M');
        $this->addPessoaF($pf1);

        $pf2 = new pessoaF();
        $pf2->setNome('Mariazinha');
        $pf2->setTelefone(51988998899);
        $pf2->setEmail('mariazinha@bol.com.br');
        $pf2->setEndereco('Rua sem saída');
        $pf2->setCpf(321321321123);
        $pf2->setSexo('F');
        $this->addPessoaF($pf2);
    }

    public function getAllPF() {
        //return $this->pf;
        $_REQUEST['pfs'] = $this->pf;
        $this->getAllBD();
        require_once '../view/listPessoaF.php';
    }

    public function imprime() {
        foreach ($this->pf as $pf):
            echo $pf;
        endforeach;
    }

    public function addPessoaF($p) {
        array_push($this->pf, $p);
    }

    public function inserir() {
        if (isset($_POST['salvarPF'])) {
            $pf = new pessoaF();
            $pf->setNome($_POST['nome']);
            $pf->setTelefone($_POST['tel']);
            $pf->setEmail($_POST['email']);
            $pf->setEndereco($_POST['endereco']);
            $pf->setCpf($_POST['cpf']);
            $pf->setSexo($_POST['sexo']);
            $this->addPessoaF($pf);
        }
    }

    public function inserirBD() {
        if (isset($_POST['salvarPF'])) {
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $schema = 'dev3n201';
            $conexao = mysqli_connect($host, $user, $pass, $schema);
            if (!$conexao) {
                die("Erro ao conectar. " . mysqli_error($conexao));
            }

            $Nome = $_POST['nome'];
            $Telefone = $_POST['tel'];
            $Email = $_POST['email'];
            $Endereco = $_POST['endereco'];
            $Cpf = $_POST['cpf'];
            $Sexo = $_POST['sexo'];

            $sql = "insert into `pessoa` (`nome`, `telefone`, `email`, "
                    . "`endereco`, `cpf`, `sexo`) values ('$Nome','$Telefone',"
                    . "'$Email','$Endereco','$Cpf','$Sexo')";
            $result = mysqli_query($conexao, $sql);

            if (!$result) {
                die("Erro ao inserir. " . mysqli_error($conexao));
            }
            mysqli_close($conexao);
        }
    }

    public function getAllBD() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $schema = 'dev3n201';
        $conexao = mysqli_connect($host, $user, $pass, $schema);
        if (!$conexao) {
            die("Erro ao conectar. " . mysqli_error($conexao));
        }

        $sql = "select * from pessoa where cnpj is null";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            $pfsBD = [];
            while ($row = $result->fetch_assoc()) {
                array_push($pfsBD, $row);
            }
            $_REQUEST['pfsBD'] = $pfsBD;
        } else {
            $_REQUEST['pfsBD'] = 0;
        }
        mysqli_close($conexao);
    }

    public function funcoes() {
        //Deletar Pessoa
        if (isset($_POST['delete'])) {
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $schema = 'dev3n201';
            $conexao = mysqli_connect($host, $user, $pass, $schema);
            if (!$conexao) {
                die("Erro ao conectar. " . mysqli_error($conexao));
            }

            $id = $_POST['id'];
            $sql = "delete from pessoa where idPessoa = $id";
            $result = mysqli_query($conexao, $sql);
            if (!$result) {
                die("Erro ao deletar: " . mysqli_error($conexao));
            }
            mysqli_close($conexao);
            header('Refresh: 0'); //recarregar a pág. F5 em 0 segundos
        }
    }

    public function getPessoaById($id) {
        //Atualizar Pessoa
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $schema = 'dev3n201';
        $conexao = mysqli_connect($host, $user, $pass, $schema);
        if (!$conexao) {
            die("Erro ao conectar. " . mysqli_error($conexao));
        }

        $sql = "select * from pessoa where idPessoa=$id";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            $pfsBD = [];
            while ($row = $result->fetch_assoc()) {
                array_push($pfsBD, $row);
            }
            return $pfsBD;
        } 
        mysqli_close($conexao);
    }
    
    public function update() {
        if(isset($_POST['updatePF'])){
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $schema = 'dev3n201';
            $conexao = mysqli_connect($host, $user, $pass, $schema);
            if (!$conexao) {
                die("Erro ao conectar. " . mysqli_error($conexao));
            }
            $idPessoa = $_POST['idPessoa'];
            $Nome = $_POST['nome'];
            $Telefone = $_POST['tel'];
            $Email = $_POST['email'];
            $Endereco = $_POST['endereco'];
            $Cpf = $_POST['cpf'];
            $Sexo = $_POST['sexo'];
            
            $sql = "UPDATE `pessoa` SET `nome`='$Nome',`telefone`='$Telefone',"
                    . "`email`='$Email',`endereco`='$Endereco',`cpf`='$Cpf',"
                    . "`sexo`='$Sexo' WHERE `idPessoa`='$idPessoa'";
            $result = mysqli_query($conexao, $sql);
            if(!$result){
                die("Erro ao atualizar pessoa. " . mysqli_error($conexao));
            }
            mysqli_close($conexao);
            header('Location: ../view/gerPessoaF.php');
        }
        if(isset($_POST['cancelar'])){
            header('Location: ../view/gerPessoaF.php');
        }
    }

}
