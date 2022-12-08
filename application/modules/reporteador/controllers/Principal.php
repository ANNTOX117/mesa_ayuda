<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $libraries = array(
            'DatesLibrary',
            'ListSelectLibrary',
            'user_agent'
        );
        $models = array(
            'Admin_model',
            'Ticket_model'
        );
        $this->load->library($libraries);
        $this->load->model($models);
    }

    public function index(){
        //var_dump($this->session->userdata('logueado') && $this->session->userdata('rol_ua') != '1');
        if($this->session->userdata('logueado') && $this->session->userdata('rol_ua') != '1'){
            $datos=new Admin_model();
            //var_dump($datos->get_dudas());
            $where=$this->session->userdata('area_id_ua');
            //echo $where;
            $data = array();
            //var_dump($datos->get_dudas());
            $data=[
                'dudas'=>$datos->get_dudas($where),
                'abiertos'  =>$datos->get_dudas_status_num($where, 1),
                'asignados' =>$datos->get_dudas_status_num($where, 2),
                'pendientes'=>$datos->get_dudas_status_num($where, 3),
                'resueltos' =>$datos->get_dudas_status_num($where, 4),
                'cerrados'  =>$datos->get_dudas_status_num($where, 5),
            ];
            $data = [
                'navbar'        => $this->load->view('templates/vertical/navbar2_view', $data, TRUE),
                'main_content'  => $this->load->view('admin_view', $data, TRUE),
             //   'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
                'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
            ];

            $data = array(
                //'title_lo_gral'     => 'Mesa de Ayuda',
                'vertical_select'   => TRUE,
                'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE)
            );

            $this->load->view('layout_general', $data);
        }else{

            redirect('login');

        }
    }


    public function ticket(){
        if($this->session->userdata('logueado') && $this->session->userdata('rol_ua') != '1'){

            $datos=new Ticket_model();
            $dato=new Admin_model();
            $where=$this->session->userdata('area_id_ua');
            //var_dump($datos->get_ticket());
            $data = array();
            $data=[
                'areas'=>$datos->get_areas(),
                'dudas'=>$dato->get_dudas($where)
            ];
            //var_dump($datos->get_areas());
            $data = [
                'navbar'        => $this->load->view('templates/vertical/navbar2_view', $data, TRUE),
                'main_content'  => $this->load->view('ticket_view', $data, TRUE),
                'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
                'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
            ];

            $data = array(
                //'title_lo_gral'     => 'Mesa de Ayuda',
                'vertical_select'   => TRUE,
                'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE)
            );

            $this->load->view('layout_general', $data);
        }else{
            
            redirect('login');
            
        }

        
    }

    public function ticket_abierto(){
        if($this->session->userdata('logueado') && $this->session->userdata('rol_ua') != '1'){

            $datos=new Ticket_model();
            $dato=new Admin_model();
            $where=$this->session->userdata('area_id_ua');
            //var_dump($datos->get_ticket());
            $data = array();
            
            $data=[
                
                'areas'     =>$datos->get_areas(),
                'dudas'     =>$dato->get_dudas_status($where, 1),
                'abiertos'  =>$dato->get_dudas_status_num($where, 1),
                'asignados' =>$dato->get_dudas_status_num($where, 2),
                'pendientes'=>$dato->get_dudas_status_num($where, 3),
                'resueltos' =>$dato->get_dudas_status_num($where, 4),
                'cerrados'  =>$dato->get_dudas_status_num($where, 5),
                
            ];
            
            //var_dump($datos->get_areas());
            $data = [
                'navbar'        => $this->load->view('templates/vertical/navbar2_view', $data, TRUE),
                'main_content'  => $this->load->view('ticket_view', $data, TRUE),
                'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
                'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
            ];

            $data = array(
                //'title_lo_gral'     => 'Mesa de Ayuda',
                'vertical_select'   => TRUE,
                'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE)
            );

            $this->load->view('layout_general', $data);
        }else{
            
            redirect('login');
            
        }

        
    }

    public function ticket_asignado(){
        if($this->session->userdata('logueado') && $this->session->userdata('rol_ua') != '1'){

            $datos=new Ticket_model();
            $dato=new Admin_model();
            $where=$this->session->userdata('area_id_ua');
            //var_dump($datos->get_ticket());
            $data = array();
            
            $data=[
                
                'areas'     =>$datos->get_areas(),
                'dudas'     =>$dato->get_dudas_status($where, 2),
                'abiertos'  =>$dato->get_dudas_status_num($where, 1),
                'asignados' =>$dato->get_dudas_status_num($where, 2),
                'pendientes'=>$dato->get_dudas_status_num($where, 3),
                'resueltos' =>$dato->get_dudas_status_num($where, 4),
                'cerrados'  =>$dato->get_dudas_status_num($where, 5),
                
            ];
            //var_dump($datos->get_areas());
            $data = [
                'navbar'        => $this->load->view('templates/vertical/navbar2_view', $data, TRUE),
                'main_content'  => $this->load->view('ticket_view', $data, TRUE),
                'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
                'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
            ];

            $data = array(
                //'title_lo_gral'     => 'Mesa de Ayuda',
                'vertical_select'   => TRUE,
                'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE)
            );

            $this->load->view('layout_general', $data);
        }else{
            
            redirect('login');
            
        }

        
    }

    public function ticket_pendiente(){
        if($this->session->userdata('logueado') && $this->session->userdata('rol_ua') != '1'){

            $datos=new Ticket_model();
            $dato=new Admin_model();
            $where=$this->session->userdata('area_id_ua');
            //var_dump($datos->get_ticket());
            $data = array();
            
            $data=[
                
                'areas'     =>$datos->get_areas(),
                'dudas'     =>$dato->get_dudas_status($where, 3),
                'abiertos'  =>$dato->get_dudas_status_num($where, 1),
                'asignados' =>$dato->get_dudas_status_num($where, 2),
                'pendientes'=>$dato->get_dudas_status_num($where, 3),
                'resueltos' =>$dato->get_dudas_status_num($where, 4),
                'cerrados'  =>$dato->get_dudas_status_num($where, 5),
                
            ];
            //var_dump($datos->get_areas());
            $data = [
                'navbar'        => $this->load->view('templates/vertical/navbar2_view', $data, TRUE),
                'main_content'  => $this->load->view('ticket_view', $data, TRUE),
                'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
                'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
            ];

            $data = array(
                //'title_lo_gral'     => 'Mesa de Ayuda',
                'vertical_select'   => TRUE,
                'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE)
            );

            $this->load->view('layout_general', $data);
        }else{
            
            redirect('login');
            
        }

        
    }

    public function ticket_resuelto(){
        if($this->session->userdata('logueado') && $this->session->userdata('rol_ua') != '1'){

            $datos=new Ticket_model();
            $dato=new Admin_model();
            $where=$this->session->userdata('area_id_ua');
            //var_dump($datos->get_ticket());
            $data = array();
            
            $data=[
                
                'areas'     =>$datos->get_areas(),
                'dudas'     =>$dato->get_dudas_status($where, 4),
                'abiertos'  =>$dato->get_dudas_status_num($where, 1),
                'asignados' =>$dato->get_dudas_status_num($where, 2),
                'pendientes'=>$dato->get_dudas_status_num($where, 3),
                'resueltos' =>$dato->get_dudas_status_num($where, 4),
                'cerrados'  =>$dato->get_dudas_status_num($where, 5),
                
            ];
            //var_dump($datos->get_areas());
            $data = [
                'navbar'        => $this->load->view('templates/vertical/navbar2_view', $data, TRUE),
                'main_content'  => $this->load->view('ticket_view', $data, TRUE),
                'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
                'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
            ];

            $data = array(
                //'title_lo_gral'     => 'Mesa de Ayuda',
                'vertical_select'   => TRUE,
                'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE)
            );

            $this->load->view('layout_general', $data);
        }else{
            
            redirect('login');
            
        }

        
    }

    public function ticket_cerrado(){
        if($this->session->userdata('logueado') && $this->session->userdata('rol_ua') != '1'){

            $datos=new Ticket_model();
            $dato=new Admin_model();
            $where=$this->session->userdata('area_id_ua');
            //var_dump($datos->get_ticket());
            $data = array();
            
            $data=[
                
                'areas'     =>$datos->get_areas(),
                'dudas'     =>$dato->get_dudas_status($where, 5),
                'abiertos'  =>$dato->get_dudas_status_num($where, 1),
                'asignados' =>$dato->get_dudas_status_num($where, 2),
                'pendientes'=>$dato->get_dudas_status_num($where, 3),
                'resueltos' =>$dato->get_dudas_status_num($where, 4),
                'cerrados'  =>$dato->get_dudas_status_num($where, 5),
                
            ];
            //var_dump($datos->get_areas());
            $data = [
                'navbar'        => $this->load->view('templates/vertical/navbar2_view', $data, TRUE),
                'main_content'  => $this->load->view('ticket_view', $data, TRUE),
                'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
                'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
            ];

            $data = array(
                //'title_lo_gral'     => 'Mesa de Ayuda',
                'vertical_select'   => TRUE,
                'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE)
            );

            $this->load->view('layout_general', $data);
        }else{
            
            redirect('login');
            
        }

        
    }

    /*
     * Función donde se impirme el formulario
     * del registro de nuevos usuarios
     */
    public function users()
    {

        if($this->session->userdata('logueado') && $this->session->userdata('rol_ua') != '1'){
            $datos=new Admin_model();
            $this->register();
            //var_dump($datos->get_dudas());
            $data = array();
            $data=[
                'dudas'=>$datos->get_dudas(),
            ];
            $data = [
                'navbar'        => $this->load->view('templates/vertical/navbar2_view', $data, TRUE),
                'main_content'  => $this->load->view('users_view', $data, TRUE),
                'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
                'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
            ];

            $data = array(
                //'title_lo_gral'     => 'Mesa de Ayuda',
                'vertical_select'   => TRUE,
                'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE)
            );

            $this->load->view('layout_general', $data);
        }else{

            redirect('login');

        }
    }

    /**
     * Responder mediante correo electrónico
     */
    public function sendEmail($data)
    {
        var_dump($data);
        echo $data['correo'];
        $this->email->from('mesadeayuda.cvirc@sectei.cdmx.gob.mx');
        $this->email->to($data['correo']);
        $this->email->subject('Atención a su consulta_IRC');
        $mensaje = $this->load->view('email_view', $data, TRUE);
        $this->email->message($mensaje);

        $this->email->send();
    }


/*
 * Funcion que permite validar los inpurts
 * del formulario para registrar nuevos usuarios.
 */
    public function register()
    {
        $users = new Admin_model();


        if ($this->input->post('password') === $this->input->post('confirm'))
        {

            $register = array(
                'user'          =>  $this->input->post('user_name'),
                'email'         =>  $this->input->post('email'),
                'confirm'       =>  password_hash($this->input->post('confirm'),PASSWORD_BCRYPT),
                'estatus'       =>  $this->input->post('estatus'),
                'nacimiento'    =>  $this->input->post('nacimiento'),
            );
         #   var_dump($register);

            $users->saveUsers($register);
         #   $pass = password_hash();

        }else
        {
            echo 'False';
        }





    }



    /**Esta funcion inserta o modifica el area asignada */
    public function insert_area(){
        $actualiza_area=new Ticket_model();
        $where = 'ID_ticket='.$this->input->post('ID_ticket');
        $actualiza_area->actualiza_area(array('area_asigned_t' => $this->input->post('area')), $where);
        echo $this->input->post('area');
        echo $this->input->post('ID_ticket');
        
        redirect('admin/acceso/ticket');
        
    }
    /**Esta funcion muestra una pregunta en especifico y permite responder */
    public function responder(){
        $datos=new Ticket_model();
        $dato=new Admin_model();
        //var_dump($this->input->post('pregunta'));
        $id = array(
            'ID_user_trouble' => $this->input->get('pregunta'),
        );
        $res = $dato->traer_duda($id);
        $answers=$datos->get_answers(array('id_ticket'=>$res->ID_user_trouble) );
        //var_dump($answers);
        //var_dump($res);
        $data=array();
        $data=[
            'duda'      =>$res,
            'answers'   =>$answers
        ];
        $data = [
            'navbar'        => $this->load->view('templates/vertical/navbar2_view', $data, TRUE),
            'main_content'  => $this->load->view('responder_view', $data, TRUE),
            'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
            'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
        ];

        $data = array(
            //'title_lo_gral'     => 'Mesa de Ayuda',
            'vertical_select'   => TRUE,
            'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE)
        );
        //$where = 'ID_ticket='.$this->input->post('ID_ticket');
        //$actualiza_area->actualiza_area(array('area_asigned_t' => $this->input->post('area')), $where);
        
        
        $this->load->view('layout_general', $data);
        
    }

    public function responder_insert(){
        $respuesta = array(
            'answer_content_a' => $this->input->post('respuesta'),
            'user_admin_id_a' => $this->input->post('ID_user'),
            'id_ticket' => $this->input->post('ID_duda'),
            'name_answer' => $this->input->post('nombre')
        );
        $datos=new Ticket_model();
        $datos->insert_answer($respuesta);
        //var_dump($respuesta);
        $url='admin/acceso/responder?pregunta='.$respuesta['id_ticket'];
        var_dump($respuesta['answer_content_a']);
        var_dump($this->input->post('mail'));
        $data=[
            'correo' => $this->input->post('mail'),
            'respuesta' => $respuesta['answer_content_a'],
            'name' => $this->input->post('anombre'),
            'apaterno' => $this->input->post('apaterno'),
            'amaterno' => $this->input->post('amaterno'),
        ];
        $this->sendEmail($data);
        var_dump($data);
        //var_dump($url);
        redirect($url);
        
    }

    public function logout()
    {
        //$vars = array('email', 'materias', 'logueado');
        //$this->session->unset_userdata($vars);
        $this->session->sess_destroy();
        redirect('login');
    }

}/**Fin de la clase */
