<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pessoa
 *
 * @author maciel
 */
class Pessoa extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        if (!$this->session->userdata('estou_logado')) {
            redirect('Login');
        }
        //pessoa este é um apelido para o model
        $this->load->model('Pessoa_model', 'pessoa');
    }
    
    public function index(){
        $lista['pessoas'] = $this->pessoa->listar();
        $this->load->view('pessoaCadastro', $lista);
    }
    //https://codeigniter.com/userguide3/libraries/input.html
    public function inserir(){
        //nome no vetor deve ser o mesmo nome do campo na tabela 
        $dados['nome'] = $this->input->post('nome');
        $dados['telefone'] = $this->input->post('telefone');
        $dados['email'] = $this->input->post('email');
        $dados['endereco'] = $this->input->post('endereco');
        if($this->input->post('tpPessoa') == 'Fisica'){
            $dados['cpf'] = $this->input->post('cpf');
            $dados['sexo'] = $this->input->post('sexo');
        }else{
            $dados['cnpj'] = $this->input->post('cnpj');
            $dados['nomeFantasia'] = $this->input->post('nomeFantasia');
        }
        $result = $this->pessoa->insert($dados);
        if($result==true){
            $this->session->set_flashdata('true','msg');
            redirect('pessoa');
        }else{
            $this->session->set_flashdata('err','msg');
            redirect('pessoa');
        }
        
    }
    //Na controller o método tem que ser public
    public function deletar($id) {
        $result = $this->pessoa->deletar($id);
        
        //redirect('pessoa');
        if($result==true){
            $this->session->set_flashdata('true','msg');
            redirect('pessoa');
        }else{
            $this->session->set_flashdata('err','msg');
            redirect('pessoa');
        }
    }
    
    public function editar($idPessoa) {
        $data['pessoa'] = $this->pessoa->editar($idPessoa);
        $this->load->view('pessoaEditar',$data);
    }
    
    //Não recebe método por que ele recebe os dados por post
    public function atualizar() {
        //esse é o lado do BD = Este é o lado da view
        $dados['idPessoa'] = $this->input->post('idPessoa');
        $dados['nome'] = $this->input->post('nome');
        $dados['telefone'] = $this->input->post('telefone');
        $dados['email'] = $this->input->post('email');
        $dados['endereco'] = $this->input->post('endereco');
        if($this->input->post('tpPessoa') == 'Física'){
            $dados['cpf'] = $this->input->post('cpf');
            $dados['sexo'] = $this->input->post('sexo');
        }else{
            $dados['cnpj'] = $this->input->post('cnpj');
            $dados['nomeFantasia'] = $this->input->post('nomeFantasia');
        }
        if($this->pessoa->atualizar($dados) == true){
            $this->session->set_flashdata('true','msg');
            redirect('pessoa');
        }else{
            $this->session->set_flashdata('err','msg');
            redirect('pessoa');
        }
    }
}
