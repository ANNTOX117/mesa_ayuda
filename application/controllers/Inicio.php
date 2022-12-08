<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $libraries = array(
            'DatesLibrary',
            'ListSelectLibrary'
        );
        $models = array(
            'Inicio_model'
        );
        $this->load->library($libraries);
        $this->load->model($models);
    }

    protected function insert_help()
    {
        //$dates_library = new DatesLibrary();
        $inicio_model = new Inicio_model();
        //var_dump($dates_library->fecha_hoy(TRUE));
        if ($this->form_validation->run('mesa_ayuda')) {

            $mi_archivo = 'captura';
            var_dump($mi_archivo);
            $config['upload_path'] = "././documents/uploads/";
            $config['file_name'] = $this->input->post('nombre').$this->input->post('pApellido').$this->input->post('sApellido').rand(1,100);
            $config['allowed_types'] = "gif|jpg|png|jpeg|bmp|pdf";
            $config['max_size'] = "50000";
            $config['max_width'] = "4000";
            $config['max_height'] = "4000";
            var_dump($config);
            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload($mi_archivo)) {
                //*** ocurrio un error
                $data['uploadError'] = $this->upload->display_errors();
                echo $this->upload->display_errors();
                if($this->upload->display_errors() =='<p>No ha seleccionado ningún archivo para subir.</p>'){
                    $config['file_name']=null;
                }
                if($this->upload->display_errors() !='<p>No ha seleccionado ningún archivo para subir.</p>'){
                    var_dump($this->upload->display_errors());
                    $this->session->set_flashdata('error_ss', $this->upload->display_errors());
                    redirect(base_url());
                }

            }

            $data['uploadSuccess'] = $this->upload->data();
            if (isset($data['uploadSuccess']['file_name'])) {
                $ruta=$data['uploadSuccess']['file_name'];
            }
            else{
                $ruta=null;
            }
            if ($this->input->post('modalidad')== '1') {
                $modalidad= 'Presencial';
            }
            if ($this->input->post('modalidad')== '2') {
                $modalidad= 'A distancia';
            }
            $datos = array(
                'name_user_uwt'              => htmlspecialchars ($this->input->post('nombre'),ENT_QUOTES),
                'surname_user_uwt'           => htmlspecialchars ($this->input->post('pApellido'),ENT_QUOTES),
                'second_surname_user_uwt'    => htmlspecialchars ($this->input->post('sApellido'),ENT_QUOTES),
                //'fecha'                    => $dates_library->fecha_hoy(),
                'phone_uwt'                  => $this->input->post('celular'),
                'email_uwt'                  => $this->input->post('email'),
                //'image_submit'               => $ruta,
                'sex_uwt'                    => $this->input->post('sexo'),
                'trouble_content_tr'         => htmlspecialchars ($this->input->post('queja'),ENT_QUOTES),
                'type_user_id_uwt'           => $this->input->post('consultante'),
                'matter_uwt'                 => htmlspecialchars ($this->input->post('asunto'),ENT_QUOTES),
                'modality_uwt'               => $modalidad,
                'id_mesabb'                  => $this->input->post('id_mesabb')
            );

            //var_dump($datos);
            
            $insert_data = $inicio_model->insert_complain($datos);

            if ($insert_data) {
                redirect('inicio/gracias');
            }
            
        }
    }

    public function mesa(){
        $list = new ListSelectLibrary();

        
        $data = array(
            'sexo'          => $list->sex_select(),
            'consultante'   => $list->user_type_select(),
        );

        $data = [
            'hdr_title' => header_title_content('Bienvenido a mesa de ayuda.'),
            // 'breadcums' => '<ol class="breadcrumb">
            //         <li class="breadcrumb-item active">Inicio </li>
            //     </ol>',
            'content_change_view' => $this->load->view('inicio/mesa_view', $data, TRUE)
        ];

        $data = array(
            'header_content' => $this->load->view('templates/vertical/header_content_mesa_view', $data, TRUE),
            'change_content' => $this->load->view('templates/vertical/change_content_view', $data, TRUE),

            //'header_content' => $this->load->view('templates/horizontal/header_content_view', $data, TRUE),
            //'change_content' => $this->load->view('templates/horizontal/change_content_view', $data, TRUE)
        );

        $data = [
            'navbar'        => $this->load->view('templates/vertical/navbar2_view', $data, TRUE),
            'main_content'  => $this->load->view('templates/vertical/main_content_view', $data, TRUE),
            'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
            'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),

            //'navbar'        => $this->load->view('templates/horizontal/navbar_view', $data, TRUE),
            //'main_content'  => $this->load->view('templates/horizontal/main_content_view', $data, TRUE),
            //'aside'         => $this->load->view('templates/horizontal/aside_view', $data, TRUE),
            //'footer'        => $this->load->view('templates/horizontal/footer_view', $data, TRUE),
        ];

        $data = array(
            'title_lo_gral'     => 'Mesa de Ayuda',
            'vertical_select'   => TRUE,
            'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE),
            //'horizontal_select'   => TRUE,
            //'horizontal'        => $this->load->view('templates/horizontal/horizontal_view', $data, TRUE),

        );
        redirect('https://edu.rcastellanos.cdmx.gob.mx/mesadeayuda/');
        //$this->load->view('layout_general', $data);
    }

    public function info_mesa()
    {   
        $data = [
            'mesa' => 2,
        ];
        $data = [
            'content_change_view' => $this->load->view('inicio/info_mesa_view', $data, TRUE)
        ];

        $data = array(
            'change_content' => $this->load->view('templates/vertical/change_content_view', $data, TRUE),
        );

        $data = [
            'navbar'        => $this->load->view('templates/vertical/navbar_view', $data, TRUE),
            'main_content'  => $this->load->view('templates/vertical/main_content_view', $data, TRUE),
            'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
            'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
        ];

        $data = array(
            'title_lo_gral'     => 'Mesa de Ayuda',
            'vertical_select'   => TRUE,
            'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE),

        );

        $this->load->view('layout_general', $data);
    }

    public function mesa1()
    {
        $list = new ListSelectLibrary();

        $this->insert_help();
        $data = array(
            'sexo'          => $list->sex_select(),
            'consultante'   => $list->user_type_select(),
        );

        $data = [
            'hdr_title' => header_title_content('Utilice el siguiente formato para enviar su consulta.'),
            'breadcums' => '<ol class="breadcrumb">
                <li class="breadcrumb-item active"><a class="link-inicio" href="'.base_url().'"'.'>Inicio </a></li>
                </ol>',
            'content_change_view' => $this->load->view('inicio/mesa1_view', $data, TRUE)
        ];

        $data = array(
            'header_content' => $this->load->view('templates/vertical/header_content_view', $data, TRUE),
            'change_content' => $this->load->view('templates/vertical/change_content_view', $data, TRUE),

            //'header_content' => $this->load->view('templates/horizontal/header_content_view', $data, TRUE),
            //'change_content' => $this->load->view('templates/horizontal/change_content_view', $data, TRUE)
        );

        $data = [
            'navbar'        => $this->load->view('templates/vertical/navbar_view', $data, TRUE),
            'main_content'  => $this->load->view('templates/vertical/main_content_view', $data, TRUE),
            'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
            'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),

            //'navbar'        => $this->load->view('templates/horizontal/navbar_view', $data, TRUE),
            //'main_content'  => $this->load->view('templates/horizontal/main_content_view', $data, TRUE),
            //'aside'         => $this->load->view('templates/horizontal/aside_view', $data, TRUE),
            //'footer'        => $this->load->view('templates/horizontal/footer_view', $data, TRUE),
        ];

        $data = array(
            'title_lo_gral'     => 'Mesa de Ayuda',
            'vertical_select'   => TRUE,
            'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE),
            //'horizontal_select'   => TRUE,
            //'horizontal'        => $this->load->view('templates/horizontal/horizontal_view', $data, TRUE),

        );
        redirect('https://edu.rcastellanos.cdmx.gob.mx/mesadeayuda/inicio/mesa1');
        //$this->load->view('layout_general', $data);
    }

    public function mesa2()
    {
        $list = new ListSelectLibrary();

        $this->insert_help();
        $data = array(
            'sexo'          => $list->sex_select(),
            'consultante'   => $list->user_type_select(),
        );

        $data = [
            'hdr_title' => header_title_content('Utilice el siguiente formato para enviar su consulta.'),
            'breadcums' => '<ol class="breadcrumb">
                <li class="breadcrumb-item active"><a class="link-inicio" href="'.base_url().'"'.'>Inicio </a></li>
                </ol>',
            'content_change_view' => $this->load->view('inicio/mesa2_view', $data, TRUE)
        ];

        $data = array(
            'header_content' => $this->load->view('templates/vertical/header_content_view', $data, TRUE),
            'change_content' => $this->load->view('templates/vertical/change_content_view', $data, TRUE),

            //'header_content' => $this->load->view('templates/horizontal/header_content_view', $data, TRUE),
            //'change_content' => $this->load->view('templates/horizontal/change_content_view', $data, TRUE)
        );

        $data = [
            'navbar'        => $this->load->view('templates/vertical/navbar_view', $data, TRUE),
            'main_content'  => $this->load->view('templates/vertical/main_content_view', $data, TRUE),
            'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
            'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),

            //'navbar'        => $this->load->view('templates/horizontal/navbar_view', $data, TRUE),
            //'main_content'  => $this->load->view('templates/horizontal/main_content_view', $data, TRUE),
            //'aside'         => $this->load->view('templates/horizontal/aside_view', $data, TRUE),
            //'footer'        => $this->load->view('templates/horizontal/footer_view', $data, TRUE),
        ];

        $data = array(
            'title_lo_gral'     => 'Mesa de Ayuda',
            'vertical_select'   => TRUE,
            'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE),
            //'horizontal_select'   => TRUE,
            //'horizontal'        => $this->load->view('templates/horizontal/horizontal_view', $data, TRUE),

        );
        redirect('https://edu.rcastellanos.cdmx.gob.mx/mesadeayuda/inicio/mesa2');
        //$this->load->view('layout_general', $data);
    }

    public function mesa3()
    {
        $list = new ListSelectLibrary();

        $this->insert_help();
        $data = array(
            'sexo'          => $list->sex_select(),
            'consultante'   => $list->user_type_select(),
        );

        $data = [
            'hdr_title' => header_title_content('Utilice el siguiente formato para enviar su consulta.'),
            'breadcums' => '<ol class="breadcrumb">
                <li class="breadcrumb-item active"><a class="link-inicio" href="'.base_url().'"'.'>Inicio </a></li>
                </ol>',
            'content_change_view' => $this->load->view('inicio/mesa3_view', $data, TRUE)
        ];

        $data = array(
            'header_content' => $this->load->view('templates/vertical/header_content_view', $data, TRUE),
            'change_content' => $this->load->view('templates/vertical/change_content_view', $data, TRUE),

            //'header_content' => $this->load->view('templates/horizontal/header_content_view', $data, TRUE),
            //'change_content' => $this->load->view('templates/horizontal/change_content_view', $data, TRUE)
        );

        $data = [
            'navbar'        => $this->load->view('templates/vertical/navbar_view', $data, TRUE),
            'main_content'  => $this->load->view('templates/vertical/main_content_view', $data, TRUE),
            'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
            'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),

            //'navbar'        => $this->load->view('templates/horizontal/navbar_view', $data, TRUE),
            //'main_content'  => $this->load->view('templates/horizontal/main_content_view', $data, TRUE),
            //'aside'         => $this->load->view('templates/horizontal/aside_view', $data, TRUE),
            //'footer'        => $this->load->view('templates/horizontal/footer_view', $data, TRUE),
        ];

        $data = array(
            'title_lo_gral'     => 'Mesa de Ayuda',
            'vertical_select'   => TRUE,
            'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE),
            //'horizontal_select'   => TRUE,
            //'horizontal'        => $this->load->view('templates/horizontal/horizontal_view', $data, TRUE),

        );
        redirect('https://edu.rcastellanos.cdmx.gob.mx/mesadeayuda/inicio/mesa3');
       // $this->load->view('layout_general', $data);
    }

    public function mesa4()
    {
        $list = new ListSelectLibrary();

        $this->insert_help();
        $data = array(
            'sexo'          => $list->sex_select(),
            'consultante'   => $list->user_type_select(),
        );

        $data = [
            'hdr_title' => header_title_content('Utilice el siguiente formato para enviar su consulta.'),
            'breadcums' => '<ol class="breadcrumb">
                <li class="breadcrumb-item active"><a class="link-inicio" href="'.base_url().'"'.'>Inicio </a></li>
                </ol>',
            'content_change_view' => $this->load->view('inicio/mesa4_view', $data, TRUE)
        ];

        $data = array(
            'header_content' => $this->load->view('templates/vertical/header_content_view', $data, TRUE),
            'change_content' => $this->load->view('templates/vertical/change_content_view', $data, TRUE),

            //'header_content' => $this->load->view('templates/horizontal/header_content_view', $data, TRUE),
            //'change_content' => $this->load->view('templates/horizontal/change_content_view', $data, TRUE)
        );

        $data = [
            'navbar'        => $this->load->view('templates/vertical/navbar_view', $data, TRUE),
            'main_content'  => $this->load->view('templates/vertical/main_content_view', $data, TRUE),
            'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
            'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),

            //'navbar'        => $this->load->view('templates/horizontal/navbar_view', $data, TRUE),
            //'main_content'  => $this->load->view('templates/horizontal/main_content_view', $data, TRUE),
            //'aside'         => $this->load->view('templates/horizontal/aside_view', $data, TRUE),
            //'footer'        => $this->load->view('templates/horizontal/footer_view', $data, TRUE),
        ];

        $data = array(
            'title_lo_gral'     => 'Mesa de Ayuda',
            'vertical_select'   => TRUE,
            'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE),
            //'horizontal_select'   => TRUE,
            //'horizontal'        => $this->load->view('templates/horizontal/horizontal_view', $data, TRUE),

        );
        redirect('https://edu.rcastellanos.cdmx.gob.mx/mesadeayuda/inicio/mesa4');
        //$this->load->view('layout_general', $data);
    }

    public function mesa5()
    {
        $list = new ListSelectLibrary();

        $this->insert_help();
        $data = array(
            'sexo'          => $list->sex_select(),
            'consultante'   => $list->user_type_select(),
        );

        $data = [
            'hdr_title' => header_title_content('Utilice el siguiente formato para enviar su consulta.'),
            'breadcums' => '<ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a class="link-inicio" href="'.base_url().'"'.'>Inicio </a></li>
                </ol>',
            'content_change_view' => $this->load->view('inicio/mesa5_view', $data, TRUE)
        ];

        $data = array(
            'header_content' => $this->load->view('templates/vertical/header_content_view', $data, TRUE),
            'change_content' => $this->load->view('templates/vertical/change_content_view', $data, TRUE),

            //'header_content' => $this->load->view('templates/horizontal/header_content_view', $data, TRUE),
            //'change_content' => $this->load->view('templates/horizontal/change_content_view', $data, TRUE)
        );

        $data = [
            'navbar'        => $this->load->view('templates/vertical/navbar_view', $data, TRUE),
            'main_content'  => $this->load->view('templates/vertical/main_content_view', $data, TRUE),
            'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
            'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),

            //'navbar'        => $this->load->view('templates/horizontal/navbar_view', $data, TRUE),
            //'main_content'  => $this->load->view('templates/horizontal/main_content_view', $data, TRUE),
            //'aside'         => $this->load->view('templates/horizontal/aside_view', $data, TRUE),
            //'footer'        => $this->load->view('templates/horizontal/footer_view', $data, TRUE),
        ];

        $data = array(
            'title_lo_gral'     => 'Mesa de Ayuda',
            'vertical_select'   => TRUE,
            'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE),
            //'horizontal_select'   => TRUE,
            //'horizontal'        => $this->load->view('templates/horizontal/horizontal_view', $data, TRUE),

        );
        redirect('https://edu.rcastellanos.cdmx.gob.mx/mesadeayuda/inicio/mesa5');
        //$this->load->view('layout_general', $data);
    }

    public function mesa6()
    {
        $list = new ListSelectLibrary();

        $this->insert_help();
        $data = array(
            'sexo'          => $list->sex_select(),
            'consultante'   => $list->user_type_select(),
        );

        $data = [
            'hdr_title' => header_title_content('Utilice el siguiente formato para enviar su consulta.'),
            'breadcums' => '<ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a class="link-inicio" href="'.base_url().'"'.'>Inicio </a></li>
                </ol>',
            'content_change_view' => $this->load->view('inicio/mesa6_view', $data, TRUE)
        ];

        $data = array(
            'header_content' => $this->load->view('templates/vertical/header_content_view', $data, TRUE),
            'change_content' => $this->load->view('templates/vertical/change_content_view', $data, TRUE),

            //'header_content' => $this->load->view('templates/horizontal/header_content_view', $data, TRUE),
            //'change_content' => $this->load->view('templates/horizontal/change_content_view', $data, TRUE)
        );

        $data = [
            'navbar'        => $this->load->view('templates/vertical/navbar_view', $data, TRUE),
            'main_content'  => $this->load->view('templates/vertical/main_content_view', $data, TRUE),
            'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
            'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),

            //'navbar'        => $this->load->view('templates/horizontal/navbar_view', $data, TRUE),
            //'main_content'  => $this->load->view('templates/horizontal/main_content_view', $data, TRUE),
            //'aside'         => $this->load->view('templates/horizontal/aside_view', $data, TRUE),
            //'footer'        => $this->load->view('templates/horizontal/footer_view', $data, TRUE),
        ];

        $data = array(
            'title_lo_gral'     => 'Mesa de Ayuda',
            'vertical_select'   => TRUE,
            'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE),
            //'horizontal_select'   => TRUE,
            //'horizontal'        => $this->load->view('templates/horizontal/horizontal_view', $data, TRUE),

        );
        redirect('https://edu.rcastellanos.cdmx.gob.mx/mesadeayuda/inicio/mesa6');
        //$this->load->view('layout_general', $data);
    }

    public function gracias()
    {
        $list = new ListSelectLibrary();

        $data = array();

        $data = [
            'hdr_title' => header_title_content('¡Muchas gracias!'),
            'breadcums' => '<ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item active">Inicio / Gracias</li>
                </ol>',
            'content_change_view' => $this->load->view('inicio/gracias_view', $data, TRUE)
        ];

        $data = array(
            'header_content' => $this->load->view('templates/vertical/header_content_view', $data, TRUE),
            'change_content' => $this->load->view('templates/vertical/change_content_view', $data, TRUE)
        );

        $data = [
            'navbar'        => $this->load->view('templates/vertical/navbar_view', $data, TRUE),
            'main_content'  => $this->load->view('templates/vertical/main_content_view', $data, TRUE),
            'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
            'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE)
        ];

        $data = array(
            'title_lo_gral'     => 'Mesa de Ayuda',
            'vertical_select'   => TRUE,
            'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE)
        );

        $this->load->view('layout_general', $data);
    }

    public function mantenimiento(){
        $list = new ListSelectLibrary();

        
        $data = array(
            'sexo'          => $list->sex_select(),
            'consultante'   => $list->user_type_select(),
        );

        $data = [
           
            'content_change_view' => $this->load->view('errors/mantenimiento/mantenimiento_view', $data, TRUE)
        ];

        $data = array(
            'header_content' => $this->load->view('templates/vertical/header_content_mesa_view', $data, TRUE),
            'change_content' => $this->load->view('templates/vertical/change_content_view', $data, TRUE),
        );

        $data = [
            'navbar'        => $this->load->view('templates/vertical/navbar2_view', $data, TRUE),
            'main_content'  => $this->load->view('templates/vertical/main_content_view', $data, TRUE),
            'aside'         => $this->load->view('templates/vertical/aside_view', $data, TRUE),
            'footer'        => $this->load->view('templates/vertical/footer_view', $data, TRUE),
        ];

        $data = array(
            
            'vertical_select'   => TRUE,
            'vertical'          => $this->load->view('templates/vertical/vertical_view', $data, TRUE),
            

        );

        $this->load->view('layout_general', $data);
    }


    

}
