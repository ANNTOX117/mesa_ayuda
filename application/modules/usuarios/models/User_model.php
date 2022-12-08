<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    private $answers;
    private $usuarios;
    private $ticket;
    
    public function __construct()
    {
        parent::__construct();
        $this->answers = 'hd_answers_v2';
        $this->usuarios = 'hd_user_with_trouble_v2';
        $this->ticket = 'hd_tickets_v2';
    }

    

    public function insert_answer($data)
    {
        /**
         * Estos son los datos del user agent
         */
        return $this->db->insert($this->answers, $data);
    }

    public function get_user($where){
        $data=$this->db->get_where( $this->usuarios,  $where);
        return $data->result();
    }

    public function traer_datos_user($data)
    {
     
        /**
         * Traer la duda de un usuario en especifico
         */
        $query='select * from hd_tickets_v2 ht right join hd_areas_v2 ha on ha.ID_area = ht.area_asigned_t 
		right join hd_ticket_status_v2 hts on hts.ID_ticket_status = ht.ticket_status_id_t
			inner join hd_answer_to_trouble_v2 hatt on ht.answer_trouble_id_t = hatt.ID_answer_trouble 
				inner join hd_user_with_trouble_v2 huwt on hatt.trouble_id_at = huwt.ID_user_trouble 
					where huwt.ID_user_trouble ='.$data.';';
            $resultados = $this->db->query($query);
            
        return $resultados->result();
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
        $datos = $this->db->get_where($this->ticket, array('ID_ticket' => $data['id_ticket']), 1);
        if (!$datos->row()) {
            return false;
        }

        return $datos->row();
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


    /**
     * Destruir variables
     */
    public function __destruct()
    {
        $this->ticket = 'tickets';
    }

}