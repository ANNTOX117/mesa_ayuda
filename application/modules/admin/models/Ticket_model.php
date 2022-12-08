<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_model extends CI_Model {
    private $ticket;
    private $areas;
    private $answers;
    private $status;

    public function __construct()
    {
        parent::__construct();
        $this->ticket = 'hd_tickets_v2';
        $this->areas = 'hd_areas_v2';
        $this->answers = 'hd_answers_v2';
        $this->status = 'hd_ticket_status_v2';
    }

    public function get_ticket()
    {   
        $data=$this->db->get($this->ticket);
        return $data->result();
    }
    public function get_areas($where)
    {   
        $data=$this->db->get_where( $this->areas,  ['id_mesabb' => $where]);
        return $data->result();
    }
    public function get_status()
    {   
        $data=$this->db->get($this->status);
        return $data->result();
    }
    public function actualiza_area($data, $where){
        //return $this->db->update($this->ticket, $data, $where);
        $query='UPDATE hd_tickets_v2 as ht  
        INNER JOIN hd_answer_to_trouble_v2 AS hatt 
            ON ht.answer_trouble_id_t = hatt.ID_answer_trouble
        INNER JOIN hd_user_with_trouble_v2 AS hauwt
            ON hatt.trouble_id_at = hauwt.ID_user_trouble
     SET ht.area_asigned_t = '.$data. ' '. 	
     'WHERE hauwt.ID_user_trouble ='. $where;
     if($resultados = $this->db->query($query)){

         return true;
     }else {
         return false;
     }
    }

    public function actualiza_status($data, $where){
        
        $query='UPDATE hd_tickets_v2 as ht  
        INNER JOIN hd_answer_to_trouble_v2 AS hatt 
            ON ht.answer_trouble_id_t = hatt.ID_answer_trouble
        INNER JOIN hd_user_with_trouble_v2 AS hauwt
            ON hatt.trouble_id_at = hauwt.ID_user_trouble
     SET ht.ticket_status_id_t = '.$data. ' '. 	
     'WHERE hauwt.ID_user_trouble ='. $where;
     if($resultados = $this->db->query($query)){

         return true;
     }else {
         return false;
     }
            
        //return $this->db->update($this->ticket, $data, $where);
    }
    public function actualiza_mesa($data, $where){
        
        $query='UPDATE hd_user_with_trouble_v2
                SET id_mesabb = '.$data. ' '. 	
                'WHERE ID_user_trouble ='. $where;
        $query2='UPDATE hd_tickets_v2 as ht  
                INNER JOIN hd_answer_to_trouble_v2 AS hatt 
                    ON ht.answer_trouble_id_t = hatt.ID_answer_trouble
                INNER JOIN hd_user_with_trouble_v2 AS hauwt
                    ON hatt.trouble_id_at = hauwt.ID_user_trouble
                SET ht.ticket_status_id_t = 1, ht.area_asigned_t = 3 	
                WHERE hauwt.ID_user_trouble ='. $where;
        $this->db->query($query2);

     if($resultados = $this->db->query($query)){

         return true;
     }else {
         return false;
     }
            
        //return $this->db->update($this->ticket, $data, $where);
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

    public function traer_ticket($data)
    {
        /**
         * Traer la duda de un usuario en especifico
         */
        $query='select ha.area_name_au,hts.ticket_status_ts,huwt.id_mesabb from hd_tickets_v2 ht right join hd_areas_v2 ha on ha.ID_area = ht.area_asigned_t 
		right join hd_ticket_status_v2 hts on hts.ID_ticket_status = ht.ticket_status_id_t
			inner join hd_answer_to_trouble_v2 hatt on ht.answer_trouble_id_t = hatt.ID_answer_trouble 
				inner join hd_user_with_trouble_v2 huwt on hatt.trouble_id_at = huwt.ID_user_trouble 
					where huwt.ID_user_trouble ='.$data.';';
            $resultados = $this->db->query($query);
            
        return $resultados->result();
    }


    /**
     * Destruir variables
     */
    public function __destruct()
    {
        $this->ticket = 'tickets_v2';
    }

}