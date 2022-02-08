<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carro
 *
 * @author Jaderson Maciel
 */
class Carro extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('estou_logado')) {
            redirect('Login');
        }
        $this->load->model('Carro_model', 'carro'); //carro este é um apelido para o model
    }

    public function index() {
        $lista['carros'] = $this->carro->listar();
        $this->load->view('carroCadastro', $lista);
    }

    public function inserir() {
        //nome no vetor deve ser o mesmo nome do campo na tabela
        $dados['cor'] = $this->input->post('cor');
        $dados['marca'] = $this->input->post('marca');
        $dados['modelo'] = $this->input->post('modelo');
        $dados['placa'] = $this->input->post('placa');
        $dados['porta'] = $this->input->post('porta');
        $dados['idPessoa'] = $this->input->post('idPessoa');
        
        $result = $this->carro->inserir($dados);
        if ($result == true) {
            $this->session->set_flashdata('true', 'msg');
            redirect('carro');
        } else {
            $this->session->set_flashdata('err', 'msg');
            redirect('carro');
        }
    }

    public function excluir($id) {
        $result = $this->carro->deletar($id);
        if ($result == true) {
            $this->session->set_flashdata('true', 'msg');
            redirect('carro');
        } else {
            $this->session->set_flashdata('err', 'msg');
            redirect('carro');
        }
    }

    public function editar($idCarro) {
        $data['carro'] = $this->carro->editar($idCarro);
        $this->load->view('carroEditar', $data);
    }

    public function atualizar() {
        //este é o lado do BD = Este é o lado da View
        $dados['cor'] = $this->input->post('cor');
        $dados['marca'] = $this->input->post('marca');
        $dados['modelo'] = $this->input->post('modelo');
        $dados['placa'] = $this->input->post('placa');
        $dados['porta'] = $this->input->post('porta');
        $dados['idPessoa'] = $this->input->post('idPessoa');
        $dados['idCarro'] = $this->input->post('idCarro');
        
        
        if ($this->carro->atualizar($dados) == true) {
            $this->session->set_flashdata('true', 'msg');
            redirect('carro');
        } else {
            $this->session->set_flashdata('err', 'msg');
            redirect('carro');
        }
    }

}
