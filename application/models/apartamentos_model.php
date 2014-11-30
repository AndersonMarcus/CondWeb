<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Apartamentos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    

    function inserir($data) {
        return $this->db->insert('apartamento', $data);
    }

    function listar() {
        $query = $this->db->get('apartamento');
        return $query->result();
    }

    function editar($apartamentoId) {
        $this->db->where('apartamentoId', $apartamentoId);
        $query = $this->db->get('apartamento');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('apartamentoId', $data['apartamentoId']);
        $this->db->set($data);
        return $this->db->update('apartamento');
    }

    function deletar($apartamentoId) {
        $this->db->where('apartamentoId', $apartamentoId);
        return $this->db->delete('apartamento');
    }

}

/* End of file apartamento_model.php */
/* Location: ./application/models/apartamento_model.php */
