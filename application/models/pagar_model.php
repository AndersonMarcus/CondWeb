<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pagar_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        return $this->db->insert('contaspagar', $data);
    }

    function listar() {
        $query = $this->db->get('contaspagar');
        return $query->result();
    }

    function editar($idContasPagar) {
        $this->db->where('idContasPagar', $idContasPagar);
        $query = $this->db->get('contaspagar');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('idContasPagar', $data['idContasPagar']);
        $this->db->set($data);
        return $this->db->update('contaspagar');
    }

    function deletar($idContasPagar) {
        $this->db->where('idContasPagar', $idContasPagar);
        return $this->db->delete('contaspagar');
    }
    
   

}

/* End of file usuarios_model.php */
/* Location: ./application/models/usuarios_model.php */