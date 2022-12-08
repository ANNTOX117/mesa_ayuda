<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    private $table;
    private $users;
    private $session;
    private $bloqueo_pass;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'hd_user_with_trouble_v2';
        $this->users = 'hd_user_admin_v2';
        $this->session = 'hd_user_sessions_v2';
    }

    public function get_dudas($where)
    {   
        $query='select * from hd_tickets_v2 ht inner join hd_areas_v2 ha
        on ha.ID_area = ht.area_asigned_t inner join hd_answer_to_trouble_v2 hatt 
        on ht.answer_trouble_id_t = hatt.ID_answer_trouble inner join hd_user_with_trouble_v2 huwt 
        on hatt.trouble_id_at = huwt.ID_user_trouble where huwt.id_mesabb ='.$where.' '.'ORDER BY huwt.date_created_uwt DESC';
            $resultados = $this->db->query($query);
            
        return $resultados->result();
    }
    public function get_dudas_status($status,$where)
    {   
        $query='select * from hd_tickets_v2 ht inner join hd_areas_v2 ha 
        on ha.ID_area = ht.area_asigned_t inner join hd_answer_to_trouble_v2 hatt 
        on ht.answer_trouble_id_t = hatt.ID_answer_trouble inner join hd_user_with_trouble_v2 huwt 
        on hatt.trouble_id_at = huwt.ID_user_trouble where ticket_status_id_t ='.$status.' '.'and huwt.id_mesabb ='.$where.' '.'ORDER BY huwt.date_created_uwt DESC';
            $resultados = $this->db->query($query);
        return $resultados->result();
    }
    public function get_dudas_status_num($status,$where)
    {   
        $query='select * from hd_tickets_v2 ht inner join hd_areas_v2 ha 
        on ha.ID_area = ht.area_asigned_t inner join hd_answer_to_trouble_v2 hatt 
        on ht.answer_trouble_id_t = hatt.ID_answer_trouble inner join hd_user_with_trouble_v2 huwt 
        on hatt.trouble_id_at = huwt.ID_user_trouble where ticket_status_id_t ='.$status.' '.' and huwt.id_mesabb ='.$where.' '.'ORDER BY huwt.date_created_uwt DESC';
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
        return $this->db->update($this->users, array('status_ua' => '0'), $where);
    }


    public function saveUsers($data = false)
    {
        $users = array(
            'user_name_ua'      =>  $data['user'],
            'email_ua'          =>  $data['email'],
            'password_ud'       =>  $data['confirm'],
            'status_ua'         =>  $data['estatus'],
            'rol_ua'         =>  $data['rol_ua'],
            'area_id_ua'   =>  $data['area_id_ua'],
            'user_creator'  =>  $data['user_creator'],
            'id_mesabb'     => $data['id_mesabb']
        );
        $this->db->insert($this->users,$users);
        //var_dump($users);

    }

    public function get_ticket_pdf($where)
    {   
        $query='select * from hd_tickets_v2 ht inner join hd_areas_v2 ha
        on ha.ID_area = ht.area_asigned_t inner join hd_answer_to_trouble_v2 hatt 
        on ht.answer_trouble_id_t = hatt.ID_answer_trouble inner join hd_user_with_trouble_v2 huwt 
        on hatt.trouble_id_at = huwt.ID_user_trouble where huwt.id_mesabb ='.$where.' ORDER BY huwt.date_created_uwt DESC';
            $resultados = $this->db->query($query);
            
        return $resultados->result();
    }

    public function get_respuestas_pdf(){
        $query='select * from hd_answers_v2';
            $resultados = $this->db->query($query);
            
        return $resultados->result();
    }

    /**
     * Funcion para traer alumnos por edad y mesa
     */

    public function get_edades_grafica($where){
            $query='sELECT SUM(CASE WHEN age_user BETWEEN 0 AND 25 THEN 1 ELSE 0 END) AS "NA",
            SUM(CASE WHEN age_user BETWEEN 16 AND 26 THEN 1 ELSE 0 END) AS "16_26",
            SUM(CASE WHEN age_user BETWEEN 27 AND 37 THEN 1 ELSE 0 END) AS "27_37",
            SUM(CASE WHEN age_user BETWEEN 38 AND 48 THEN 1 ELSE 0 END) AS "38_48",
            SUM(CASE WHEN age_user BETWEEN 49 AND 59 THEN 1 ELSE 0 END) AS "38_48",
            SUM(CASE WHEN age_user BETWEEN 60 AND 65 THEN 1 ELSE 0 END) AS "60_65",
            SUM(CASE WHEN age_user BETWEEN 66 AND 88 THEN 1 ELSE 0 END) AS "66_88"
        FROM hd_user_with_trouble_v2 where id_mesabb='.$where;

        $resultados = $this->db->query($query);
                
        return $resultados->result();                                   
    }

    /**
     * Función para estadisticas de preguntas por sexo
     */

     public function get_sexo_grafica($query){
        $query='sELECT 
        SUM(CASE when sex_uwt = 1 then 1 else 0 END) as "hombres",
        SUM(CASE when sex_uwt = 2 then 1 else 0 END) as "mujeres"
        FROM hd_user_with_trouble_v2 where id_mesabb='.$query;

        $resultados = $this->db->query($query);
                
        return $resultados->result();
     }

     /**
      * Funcion de estadisticas para tickets abiertos ststus
      */

      public function get_estatus_grafica($query){
        $query='sELECT 
        SUM(CASE WHEN ticket_status_id_t = 1 then 1 else 0 END) as "abiertos",
        SUM(CASE WHEN ticket_status_id_t = 2 then 1 else 0 END) as "asignados",
        SUM(CASE WHEN ticket_status_id_t = 3 then 1 else 0 END) as "pendientes",
        SUM(CASE WHEN ticket_status_id_t = 4 then 1 else 0 END) as "resueltos",
        SUM(CASE WHEN ticket_status_id_t = 5 then 1 else 0 END) as "cerrados",
        COUNT(*) as "totales"
        FROM hd_tickets_v2';
         //where id_mesabb=.$query;

        $resultados = $this->db->query($query);
                
        return $resultados->result();
     }

     /**
     * Función para estadisticas de preguntas por sexo
     */

    public function get_modalidad_grafica($query){
        $query='sELECT 
        SUM(CASE when modality_uwt = "presencial" then 1 else 0 END) as "presencial",
        SUM(CASE when modality_uwt = "a distancia" then 1 else 0 END) as "distancia"
        FROM hd_user_with_trouble_v2 where id_mesabb='.$query;

        $resultados = $this->db->query($query);
                
        return $resultados->result();
     }

      /**
     * Función para estadisticas de preguntas por sexo
     */

    public function get_tipo_consultante_grafica($query){
        $query='sELECT 
        SUM(CASE when type_user_id_uwt = 1 then 1 else 0 END) as "Estudiante",
        SUM(CASE when type_user_id_uwt = 2 then 1 else 0 END) as "Docente",
        SUM(CASE when type_user_id_uwt = 3 then 1 else 0 END) as "Administrativo",
        SUM(CASE when type_user_id_uwt = 4 then 1 else 0 END) as "Externo",
        SUM(CASE when type_user_id_uwt = 5 then 1 else 0 END) as "Aspirante"
        FROM hd_user_with_trouble_v2 where id_mesabb='.$query;

        $resultados = $this->db->query($query);
                
        return $resultados->result();
     }


    /**
     * Destruir variables
     */
    public function __destruct()
    {
        $this->table = 'user_with_trouble_v2';
        $this->users = 'ss_admins_v2';
        $this->session = 'ss_sessions_admins_v2';
    }
}
