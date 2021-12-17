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
class Usuario extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        if (!$this->session->userdata('estou_logado')) {
            redirect('Login');
        }elseif($this->session->userdata('logado')->perfilAcesso!='admin'){
            redirect('home');
        }
        //pessoa este é um apelido para o model
        $this->load->model('Usuario_model','user');
    }
    
    public function index(){
        $lista['users'] = $this->user->listar();
        $this->load->view('usuarioCadastro', $lista);
    }
    //https://codeigniter.com/userguide3/libraries/input.html
    public function inserir(){
        //nome no vetor deve ser o mesmo nome do campo na tabela 
        $dados['nomeUsuario'] = $this->input->post('nomeUsuario');
        $dados['user'] = $this->input->post('user');
        $dados['perfilAcesso'] = $this->input->post('PerfilAcesso');
        $dados['senha'] = md5(mb_convert_case($this->input->post('senha'), MB_CASE_LOWER));
        
        $result = $this->user->inserir($dados);
        
        if($result==true){
            //Redireciona para o controler user
            redirect('usuario');
        }else{           
            redirect('usuario');
        }
        
    }
    //Na controller o método tem que ser public
    public function deletar($id) {
        $result = $this->user->deletar($id);
        
        //redirect('pessoa');
        if($result==true){
            $this->session->set_flashdata('true','msg');
            redirect('usuario');
        }else{
            redirect('usuario');
        }
    }
    
    public function editar($id) {
        $data['user'] = $this->user->editar($id);
        $this->load->view('userEditar',$data);
    }
    
    //Não recebe método por que ele recebe os dados por post
    public function atualizar() {
        //esse é o lado do BD = Este é o lado da view
        $dados['idusuario'] = $this->input->post('idusuario');
        $dados['nomeUsuario'] = $this->input->post('nomeUsuario');
        $dados['user'] = $this->input->post('user');
        $dados['senha'] = md5(mb_convert_case($this->input->post('senha'), MB_CASE_LOWER));
        $dados['perfilAcesso'] = $this->input->post('perfilAcesso');
        
        if($this->user->atualizar($dados) == true){
            $this->session->set_flashdata('true','msg');
            redirect('usuario');
        }else{
            $this->session->set_flashdata('err','msg');
            redirect('usuario');
        }
    }
}
