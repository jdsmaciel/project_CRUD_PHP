<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pessoa_model
 *
 * @author maciel
 */
class Usuario_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    function insert($p){
        return $this->db->inserir('user', $p); //Usuário é o nome da tabela no banco
    }
    
    function deletar($id) {
        //condição
        $this->db->where('idusuario',$id);
        //tabela
        return $this->db->delete('user');   
    }
    
    function editar($idUsuario) {
        $this->db->where('idusuario', @id);
        //Nesse caso ele está retornando os dados de uma pessoa
        $result = $this->db->get('user');
        return $result->result();
    }
    
    function atualizar($data){
        $this->db->where('idusuario',$data['idusuario']);
        $this->db->set($data);
        return $this->db->update('user');
    }
    
    
    function listar(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('perfilAcesso','ASC');       
        $this->db->order_by('nomeUsuario','ASC');       
        $query = $this->db->get();
        return $query->result();
    }
    
    
}
