<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $models = array(
            'User_model'
        );
       /* $libraries = array(
            'DatesLibrary',
            'ListSelectLibrary',
            'user_agent'
        );
        
        $this->load->library($libraries);*/
        $this->load->model($models);
    }

    public function index(){
            $data = array();
            
            $data = [
                'navbar'        => $this->load->view('templates/vertical/navbar_view', $data, TRUE),
                'main_content'  => $this->load->view('user_view', $data, TRUE),
                'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
                'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
            ];

            $data = array(
                //'title_lo_gral'     => 'Mesa de Ayuda',
                'vertical_select'   => TRUE,
                'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE)
            );

            $this->load->view('layout_general', $data);
    }

    public function validar(){
        $datos=new User_model();
        $mail = $this->input->get('pregunta');
        $usuario=$datos->get_user(array('email_uwt'=>$mail) );
        if($usuario){
            
            $answers=$datos->get_answers(array('id_ticket'=>$usuario[0]->ID_user_trouble) );           
            $data = array();
            $data=[
                'duda'      =>$usuario[0],
                'answers'   =>$answers
            ];
            //var_dump($usuario);
            $data = [
                'navbar'        => $this->load->view('templates/vertical/navbar_view', $data, TRUE),
                'main_content'  => $this->load->view('answers_user_view', $data, TRUE),
                'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
                'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
            ];

            $data = array(
                //'title_lo_gral'     => 'Mesa de Ayuda',
                'vertical_select'   => TRUE,
                'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE)
            );

            $this->load->view('layout_general', $data);

        }else {
            $this->session->set_flashdata('error_ss', 'Aún no tienes respuesta, verifica más tarde.');
            redirect('usuarios');
        }
    }

    public function validar_ticket(){
        $datos=new User_model();
        $mail = $this->input->get('pregunta');
        $usuario=$datos->get_user(array('email_uwt'=>$mail) );
        $usuario2=$datos->traer_datos_user($this->input->get('pregunta'));
        if($usuario2[0]){
            
            $answers=$datos->get_answers(array('id_ticket'=>$usuario2[0]->ID_ticket) );           
            $data = array();
            $data=[
                'duda'      =>$usuario2[0],
                'answers'   =>$answers
            ];
            //var_dump($usuario);
            $data = [
                'navbar'        => $this->load->view('templates/vertical/navbar_view', $data, TRUE),
                'main_content'  => $this->load->view('answers_user2_view', $data, TRUE),
                'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
                'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
            ];

            $data = array(
                //'title_lo_gral'     => 'Mesa de Ayuda',
                'vertical_select'   => TRUE,
                'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE)
            );

            $this->load->view('layout_general', $data);

        }else {
            $this->session->set_flashdata('error_ss', 'Aún no tienes respuesta, verifica más tarde.');
            redirect('usuarios');
        }
    }

    public function responder_insert(){
        $respuesta = array(
            'answer_content_a' => $this->input->post('respuesta'),
            'user_admin_id_a' => 2,
            'id_ticket' => $this->input->post('ID_duda'),
            'name_answer' => $this->input->post('nombre'),
        );
        echo $respuesta['id_ticket'];
        $datos=new User_model();
        //var_dump($datos->traer_ticket($respuesta));
        
            $datos->actualiza_status( 1, $respuesta['id_ticket']);
            //var_dump($datos->traer_ticket($respuesta));

        
        $datos->insert_answer($respuesta);
        //var_dump($respuesta);
        $correo=str_replace('@','%40',$this->input->post('email'));
        $url='usuarios/principal/validar?pregunta='.$correo;
        
        //var_dump($url);
        redirect($url);
        
    }

    public function responder_insert2(){
        $respuesta = array(
            'answer_content_a' => $this->input->post('respuesta'),
            'user_admin_id_a' => 2,
            'id_ticket' => $this->input->post('ID_duda'),
            'name_answer' => $this->input->post('nombre'),
        );
        echo $respuesta['id_ticket'];
        $datos=new User_model();
        //var_dump($datos->traer_ticket($respuesta));
        
            $datos->actualiza_status( 1, $respuesta['id_ticket']);
            //var_dump($datos->traer_ticket($respuesta));

        
        $datos->insert_answer($respuesta);
        //var_dump($respuesta);
        $correo=str_replace('@','%40',$this->input->post('email'));
        $url='usuarios/principal/validar_ticket?pregunta='.$respuesta['id_ticket'];
        
        //var_dump($url);
        redirect($url);
        
    }

}/**Fin de la clase */
