<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio_model extends CI_Model {
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'hd_user_with_trouble_v2';
    }

    private function insert_data($array, $table, $show_id = FALSE)
    {
        $this->db->set($array);
        $this->db->insert($table);
        if ($this->db->affected_rows() == 1){
            if ($show_id) {
                return $this->db->insert_id();
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    public function insert_complain($array)
    {
       return $this->insert_data($array, $this->table);
    }
}