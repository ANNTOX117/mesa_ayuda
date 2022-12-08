<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ayuda extends CI_Controller {
    public function index()
    {
        $data = [];

        $data = array(
            'header_content' => $this->load->view('templates/vertical/header_content_view', $data, TRUE),
            'change_content' => $this->load->view('templates/vertical/change_content_view', $data, TRUE)
        );

        $data = [
            'navbar'        => $this->load->view('templates/vertical/navbar_view', $data, TRUE),
            'main_content'  => $this->load->view('templates/vertical/main_content_view', $data, TRUE),
            'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
            'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
        ];

        $data = array(
            'vertical' => $this->load->view('templates/vertical/vertical_view', $data, TRUE)
        );

        $this->load->view('layout_general', $data);
    }
}
