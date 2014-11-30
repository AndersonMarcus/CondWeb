<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        return $this->db->insert('usuario', $data);
    }

    function listar() {
        $query = $this->db->get('usuario');
        return $query->result();
    }

    function editar($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('usuario');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('id', $data['id']);
        $this->db->set($data);
        return $this->db->update('usuario');
    }

    function deletar($id) {
        $this->db->where('id', $id);
        return $this->db->delete('usuario');
    }


}

/* End of file usuarios_model.php */
/* Location: ./application/models/usuarios_model.php */