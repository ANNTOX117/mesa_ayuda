<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_model extends CI_Model {
    private $ticket;
    private $areas;
    private $answers;

    public function __construct()
    {
        parent::__construct();
        $this->ticket = 'hd_tickets_v2';
        $this->areas = 'hd_areas_v2';
        $this->answers = 'hd_answers_v2';
    }

    public function get_ticket()
    {   
        $data=$this->db->get($this->ticket);
        return $data->result();
    }
    public function get_areas()
    {   
        $data=$this->db->get($this->areas);
        return $data->result();
    }
    public function actualiza_area($data, $where){
        return $this->db->update($this->ticket, $data, $where);
    }

    public function insert_answer($data)
    {
        /**
         * Estos son los datos del user agent
         */
        return $this->db->insert($this->answers, $data);
    }

    public function get_answers($where){
        $data=$this->db->get_where( $this->answers,  $where);
        return $data->result();
    }


    /**
     * Destruir variables
     */
    public function __destruct()
    {
        $this->ticket = 'tickets';
    }

}