<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Receber_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        return $this->db->insert('contasReceber', $data);
    }

    function listar() {
        $query = $this->db->get('contasReceber');
        return $query->result();
    }

    function editar($idContasReceber) {
        $this->db->where('idContasReceber', $idContasReceber);
        $query = $this->db->get('contasReceber');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('idContasReceber', $data['idContasReceber']);
        $this->db->set($data);
        return $this->db->update('contasReceber');
    }

    function deletar($idContasReceber) {
        $this->db->where('idContasReceber', $idContasReceber);
        return $this->db->delete('contasReceber');
    }

    public function select_cond() {

        $this->db->order_by("condominioId" );
        $consulta = $this->db->get("condominio");

        return $consulta;
    }

}

/* End of file receber_model.php */
/* Location: ./application/models/receber_model.php */