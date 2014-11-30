<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Condominios_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        return $this->db->insert('condominio', $data);
    }

    function listar() {
        $query = $this->db->get('condominio');
        return $query->result();
    }

    function editar($condominioId) {
        $this->db->where('condominioId', $condominioId);
        $query = $this->db->get('condominio');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('condominioId', $data['condominioId']);
        $this->db->set($data);
        return $this->db->update('condominio');
    }

    function deletar($condominioId) {
        $this->db->where('condominioId', $condominioId);
        return $this->db->delete('condominio');
    }

}

/* End of file condominios_model.php */
/* Location: ./application/models/condominios_model.php */