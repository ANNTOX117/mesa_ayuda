<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    private $table;
    private $tickets;
    private $answer_to;
    private $users;
    private $session;
    private $areas;
    private $bloqueo_pass;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'hd_user_with_trouble_v2';
        $this->tickets = 'hd_tickets_v2';
        $this->answer_to = 'hd_answer_to_trouble_v2';
        $this->areas = 'hd_areas_v2';
        $this->users = 'hd_user_admin_v2';
        $this->session = 'hd_user_sessions_v2';
    }

    public function get_dudas($where)
    {   
        
        $query='select * from hd_tickets_v2 ht inner join hd_areas_v2 ha on ha.ID_area = ht.area_asigned_t inner join hd_answer_to_trouble_v2 hatt on ht.answer_trouble_id_t = hatt.ID_answer_trouble inner join hd_user_with_trouble_v2 huwt on hatt.trouble_id_at = huwt.ID_user_trouble where ID_area ='.$where.' '.'ORDER BY huwt.date_created_uwt DESC';
            $resultados = $this->db->query($query);
        return $resultados->result();
    }
    

    public function get_dudas_status($where, $and)
    {   
        
        $query='select * from hd_tickets_v2 ht inner join hd_areas_v2 ha on ha.ID_area = ht.area_asigned_t inner join hd_answer_to_trouble_v2 hatt on ht.answer_trouble_id_t = hatt.ID_answer_trouble inner join hd_user_with_trouble_v2 huwt on hatt.trouble_id_at = huwt.ID_user_trouble where ID_area ='.$where.' '.'and'.' '. 'ticket_status_id_t ='.$and.' '.'ORDER BY huwt.date_created_uwt DESC';
            $resultados = $this->db->query($query);
        return $resultados->result();
    }
    public function get_dudas_status_num($where,$and)
    {   
        
        $query='select * from hd_tickets_v2 ht inner join hd_areas_v2 ha on ha.ID_area = ht.area_asigned_t inner join hd_answer_to_trouble_v2 hatt on ht.answer_trouble_id_t = hatt.ID_answer_trouble inner join hd_user_with_trouble_v2 huwt on hatt.trouble_id_at = huwt.ID_user_trouble where ID_area ='.$where.' '.'and'.' '. 'ticket_status_id_t ='.$and.' '.'ORDER BY huwt.date_created_uwt DESC';
            $resultados = $this->db->query($query);
        return $resultados->num_rows();
    }


    public function access($data)
    {
        /*
        --------------------------------------------------------------------------------------
        *Aqui se hace la comparación del usuario utilizando get_where de CI
        *Parametro 1= tabla, Parametro 2= Arreglo con las condiciones o datos
        *Tercer parametro limit 1 significa que no quiere repetidos solo regresara un elemento
        --------------------------------------------------------------------------------------
        */

        $datos = $this->db->get_where($this->users, array('email_ua' => $data['email_ua']), 1);
        if (!$datos->row()) {
            return false;
        }

        return $datos->row();
    }

    public function insert_session($data)
    {
        /**
         * Estos son los datos del user agent
         */
        return $this->db->insert($this->session, $data);
    }

    /**
     * Esto lo que hace es actualizar las veces que se equivoca
     * el usuaro en su contraseña
     */

    public function bloquear_password($data, $where)
    {
        return $this->db->update($this->users, $data, $where);
    }

    public function traer_duda($data)
    {
        /**
         * Traer la duda de un usuario en especifico
         */
        $datos = $this->db->get_where($this->table, array('ID_user_trouble' => $data['ID_user_trouble']), 1);
        if (!$datos->row()) {
            return false;
        }

        return $datos->row();
    }

    /**
     * Esta función bloque al usuario despues de
     * fallar 5 veces su contraseña
     */
    public function bloquear_user($where)
    {
        return $this->db->update($this->users, array('status' => '0'), $where);
    }


    public function saveUsers($data = false)
    {
        $users = array(
            'user_name_ua'      =>  $data['user'],
            'email_ua'          =>  $data['email'],
            'password_ud'       =>  $data['confirm'],
            'status_ua'         =>  $data['estatus'],
            'date_created_ua'   =>  $data['nacimiento'],
        );
        $this->db->insert($this->users,$users);
    #    var_dump($users);

    }

    /**
     * Destruir variables
     */
    public function __destruct()
    {
        $this->table = 'user_with_trouble';
        $this->users = 'ss_admins';
        $this->session = 'ss_sessions_admins';
    }
}