<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $models = array(
            'admin/Admin_model',
            'admin/Ticket_model'
        );
    
        $this->load->model($models);
        }
    public function index()
    {

        $data = array(


            //'header_content' => $this->load->view('templates/horizontal/header_content_view', $data, TRUE),
            //'change_content' => $this->load->view('templates/horizontal/change_content_view', $data, TRUE)
        );


        $data = [
            'navbar'        => $this->load->view('templates/vertical/navbar_view', $data, TRUE),
            'logo_access' => $this->load->view('templates/acceso/logo_view', $data, TRUE),
            'card_access' => $this->load->view('templates/acceso/card_access_view', $data, TRUE),
         //   'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
            'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
        ];
        
        $data = array(
            'vertical_select'   => TRUE,
            'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE),
            'access_select' => TRUE,
            'access'        => $this->load->view('templates/acceso/access_view', $data, TRUE),
        );


        

        $this->load->view('layout_inicio', $data);
    }

    public function charts(){
        $data = array(


            //'header_content' => $this->load->view('templates/horizontal/header_content_view', $data, TRUE),
            //'change_content' => $this->load->view('templates/horizontal/change_content_view', $data, TRUE)
        );
            

        $data = [
            'navbar'        => $this->load->view('templates/vertical/navbar_view', $data, TRUE),
            'logo_access' => $this->load->view('templates/acceso/logo_view', $data, TRUE),
            'card_access' => $this->load->view('inicio/graficas_view', $data, TRUE),
         //   'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
            'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
        ];
        
        $data = array(
            'vertical_select'   => TRUE,
            'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE),
            'access_select' => TRUE,
            'access'        => $this->load->view('templates/acceso/access_view', $data, TRUE),
        );

        $this->load->view('layout_inicio', $data);

    }

    
}

