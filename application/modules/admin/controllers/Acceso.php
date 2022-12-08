<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Acceso extends MX_Controller {

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
        //var_dump($this->session->userdata('logueado'));
        if($this->session->userdata('logueado')){
            $datos=new Admin_model();
            $where=$this->session->userdata('id_mesabb');
            
            $data = array();
            $data=[
                'dudas'=>$datos->get_dudas($where),
                'abiertos'  =>$datos->get_dudas_status_num(1,$where),
                'asignados' =>$datos->get_dudas_status_num(2,$where),
                'pendientes'=>$datos->get_dudas_status_num(3,$where),
                'resueltos' =>$datos->get_dudas_status_num(4,$where),
                'cerrados'  =>$datos->get_dudas_status_num(5,$where),
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

    public function validar_login(){

        $usr = $this->input->post('email');
        $pass = $this->input->post('password');
        $data = array(
            'email_ua' => $usr,
            'password_ua' => $pass,
        );
        $res = $this->Admin_model->access($data);
        
       ;
        /**
         * Aqui se valida que exista el correo en la DB
         */
        
        if (!$res) {
            $this->session->set_flashdata('error_ss', 'Usuario no encontrado');
            redirect('login');
        }
        if ($res->status_ua != 1) {
            $this->session->set_flashdata('error_ss', 'Usuario Bloqueado consulta al Administrador');
            redirect('login');
        }
        if (!password_verify($data['password_ua'], $res->password_ud)) {
            $where = 'ID_user_admin=' . $res->ID_user_admin;
            if ($res->password_error_ua > 4) {
                $this->Admin_model->bloquear_user($where);
                $this->Admin_model->bloquear_password(array('password_error_ua' => 0), $where);
            } else {
                $intento = $res->password_error_ua + 1;
                $this->Admin_model->bloquear_password(array('password_error_ua' => $intento), $where);
            }

            $this->session->set_flashdata('error_ss', 'Contraseña incorrecta' . $res->password_error_ua);
            redirect('login');
        }
        /**
         * Aqui se valida que la contraseña sea correcta
         * si es así entonces se establece la sesión y las
         * variables de sesión
         */
        var_dump($res);
        if (password_verify($data['password_ua'], $res->password_ud) && $res->status_ua == 1) {
            $session = array(
                'ID_user_admin'      => $res->ID_user_admin,
                'user_name_ua'       => $res->user_name_ua,
                'email_ua'           => $res->email_ua,
                'status_ua'          => $res->status_ua,
                'deleted_ua'         => $res->deleted_ua,
                'rol_ua'             => $res->rol_ua,
                'area_id_ua'         =>$res->area_id_ua,
                'id_mesabb'          =>$res->id_mesabb,
                'logueado'           => TRUE,
            );
            echo '<br>';
            var_dump($session);
            $this->session->set_userdata($session); // cargar los datos de sesión
            
            /**
             * Insertar los datos de uri y sesión
             */
            
            //$this->Admin_model->insert_session($this->datos_dispositivo());
            /**Dirigir a donde le corresponde */
            if ($this->session->userdata('rol_ua') == '1' && $this->session->userdata('rol_ua') == 1) {
                redirect('admin/acceso');
            }
            if ($this->session->userdata('rol_ua') == '2' && $this->session->userdata('rol_ua') == 2 ) {
                redirect('areas/principal');
            }
            if ($this->session->userdata('rol_ua') == '3' && $this->session->userdata('rol_ua') == 3 ) {
                redirect('reporteador/principal');
            }
           
        } else {
            redirect('login');
        }

    }

    public function ticket_abierto(){
        if($this->session->userdata('logueado') && $this->session->userdata('logueado') == '1'){

            $datos=new Ticket_model();
            $dato=new Admin_model();
            //var_dump($datos->get_ticket());
            $where=$this->session->userdata('id_mesabb');
            $data = array();
            $data=[
                
                'areas'     =>$datos->get_areas($where),
                'ticket'    =>$dato->get_dudas_status(1,$where),
                'abiertos'  =>$dato->get_dudas_status_num(1,$where),
                'asignados' =>$dato->get_dudas_status_num(2,$where),
                'pendientes'=>$dato->get_dudas_status_num(3,$where),
                'resueltos' =>$dato->get_dudas_status_num(4,$where),
                'cerrados'  =>$dato->get_dudas_status_num(5,$where),
                
            ];
            
            //var_dump($datos->get_areas($where));
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
        if($this->session->userdata('logueado') && $this->session->userdata('logueado') == '1'){

            $datos=new Ticket_model();
            $dato=new Admin_model();
            //var_dump($datos->get_ticket());
            $where=$this->session->userdata('id_mesabb');
            $data = array();
            $data=[
                
                'areas'=>$datos->get_areas($where),
                'ticket'=>$dato->get_dudas_status(2,$where),
                'abiertos'  =>$dato->get_dudas_status_num(1,$where),
                'asignados' =>$dato->get_dudas_status_num(2,$where),
                'pendientes'=>$dato->get_dudas_status_num(3,$where),
                'resueltos' =>$dato->get_dudas_status_num(4,$where),
                'cerrados'  =>$dato->get_dudas_status_num(5,$where),
            ];
            //var_dump($datos->get_areas($where));
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
        if($this->session->userdata('logueado') && $this->session->userdata('logueado') == '1'){

            $datos=new Ticket_model();
            $dato=new Admin_model();
            //var_dump($datos->get_ticket());
            $where=$this->session->userdata('id_mesabb');
            $data = array();
            $data=[
                
                'areas'=>$datos->get_areas($where),
                'ticket'=>$dato->get_dudas_status(3,$where),
                'abiertos'  =>$dato->get_dudas_status_num(1,$where),
                'asignados' =>$dato->get_dudas_status_num(2,$where),
                'pendientes'=>$dato->get_dudas_status_num(3,$where),
                'resueltos' =>$dato->get_dudas_status_num(4,$where),
                'cerrados'  =>$dato->get_dudas_status_num(5,$where),
            ];
            //var_dump($datos->get_areas($where));
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
        if($this->session->userdata('logueado') && $this->session->userdata('logueado') == '1'){

            $datos=new Ticket_model();
            $dato=new Admin_model();
            //var_dump($datos->get_ticket());
            $where=$this->session->userdata('id_mesabb');
            $data = array();
            $data=[
                
                'areas'=>$datos->get_areas($where),
                'ticket'=>$dato->get_dudas_status(4,$where),
                'abiertos'  =>$dato->get_dudas_status_num(1,$where),
                'asignados' =>$dato->get_dudas_status_num(2,$where),
                'pendientes'=>$dato->get_dudas_status_num(3,$where),
                'resueltos' =>$dato->get_dudas_status_num(4,$where),
                'cerrados'  =>$dato->get_dudas_status_num(5,$where),
            ];
            //var_dump($datos->get_areas($where));
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
        if($this->session->userdata('logueado') && $this->session->userdata('logueado') == '1'){

            $datos=new Ticket_model();
            $dato=new Admin_model();
            //var_dump($datos->get_ticket());
            $where=$this->session->userdata('id_mesabb');
            $data = array();
            $data=[
                
                'areas'=>$datos->get_areas($where),
                'ticket'=>$dato->get_dudas_status(5,$where),
                'abiertos'  =>$dato->get_dudas_status_num(1,$where),
                'asignados' =>$dato->get_dudas_status_num(2,$where),
                'pendientes'=>$dato->get_dudas_status_num(3,$where),
                'resueltos' =>$dato->get_dudas_status_num(4,$where),
                'cerrados'  =>$dato->get_dudas_status_num(5,$where),
            ];
            //var_dump($datos->get_areas($where));
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

        if($this->session->userdata('logueado') && $this->session->userdata('logueado') == '1'){
            $datos=new Admin_model();
            $datos2=new Ticket_model();

            $this->register();
            //var_dump($datos->get_dudas());
            $where=$this->session->userdata('id_mesabb');
            $data = array();
            $data=[
                'areas'     =>$datos2->get_areas($where),
                'abiertos'  =>$datos->get_dudas_status_num(1,$where),
                'asignados' =>$datos->get_dudas_status_num(2,$where),
                'pendientes'=>$datos->get_dudas_status_num(3,$where),
                'resueltos' =>$datos->get_dudas_status_num(4,$where),
                'cerrados'  =>$datos->get_dudas_status_num(5,$where),
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
        if($this->session->userdata('logueado') && $this->session->userdata('logueado') == '1'){
        var_dump($data);
        echo $data['correo'];
        $this->email->from('mesadeayuda.cvirc@sectei.cdmx.gob.mx');
        $this->email->to($data['correo']);
        $this->email->subject('Atención a su consulta_IRC');
        $mensaje = $this->load->view('email_view', $data, TRUE);
        $this->email->message($mensaje);

        $this->email->send();
        }
    }


/*
 * Funcion que permite validar los inpurts
 * del formulario para registrar nuevos usuarios.
 */
    public function register()
    {
        if($this->session->userdata('logueado') && $this->session->userdata('logueado') == '1'){
        $users = new Admin_model();

        if ($this->input->server('REQUEST_METHOD') == "POST"){
            if ($this->input->post('password') === $this->input->post('confirm'))
            {

                $register = array(
                    'user'          =>  $this->input->post('user_name'),
                    'email'         =>  $this->input->post('email'),
                    'confirm'       =>  password_hash($this->input->post('confirm'),PASSWORD_BCRYPT),
                    'estatus'       =>  $this->input->post('estatus'),
                    'rol_ua'       =>  $this->input->post('rol_ua'),
                    'area_id_ua'    =>  $this->input->post('area'),
                    'user_creator'  =>  $this->session->userdata('ID_user_admin'),
                    'id_mesabb'     =>  $this->session->userdata('id_mesabb')
                );
            #   var_dump($register);

                
            #   $pass = password_hash();
                
                if ($register['user']	==	NULL || $register['email'] 	==	NULL || $register['confirm']	==	NULL || $register['estatus']	==	NULL || $register['rol_ua']	==	NULL || $register['area_id_ua']	==	NULL  )
                {   
                    $this->session->set_flashdata('error_ss', 'Por favor llena todos los campos');
                    redirect('admin/acceso/users');
                    
                }else{
                    #var_dump($data);

                    
                    $users->saveUsers($register);
                $this->session->set_flashdata('succes_ss', 'Sus datos se han guardado satisfactoriamente');
                redirect('admin/acceso/users');

                }

            }else
            {
                $this->session->set_flashdata('error_ss', 'Por favor llena todos los campos');
            }


            }

        

    }

    }



    /**Esta funcion inserta o modifica el area asignada */
    public function insert_area(){

        if($this->session->userdata('logueado') && $this->session->userdata('logueado') == '1'){
        $actualiza_area=new Ticket_model();
        $where = 'ID_ticket='.$this->input->post('ID_ticket');
        $actualiza_area->actualiza_area($this->input->post('area'), $this->input->post('ID_ticket'));
        echo $this->input->post('area');
        echo $this->input->post('ID_ticket');
        
        $url='admin/acceso/responder?pregunta='.$this->input->post('ID_ticket');
        redirect($url);
        }

        
        
        
    }

    public function insert_area2(){

        if($this->session->userdata('logueado') && $this->session->userdata('logueado') == '1'){
        $actualiza_area=new Ticket_model();
        $where = 'ID_ticket='.$this->input->post('ID_ticket');
        $actualiza_area->actualiza_area($this->input->post('area'), $this->input->post('ID_ticket'));
        echo $this->input->post('area');
        echo $this->input->post('ID_ticket');
        
        $url='admin/acceso/responder?pregunta='.$this->input->post('ID_ticket');
        redirect($url);
        }

        
        
        
    }
    public function insert_status(){

        
        $actualiza_area=new Ticket_model();
        $where = 'ID_ticket='.$this->input->post('ID_ticket');
        echo $actualiza_area->actualiza_status( $this->input->post('status'), $this->input->post('ID_ticket'));
        echo $this->input->post('ID_ticket');
        echo $this->input->post('status');
        
        $url='admin/acceso/responder?pregunta='.$this->input->post('ID_ticket');
        redirect($url);
        
    }

    public function insert_mesa(){

        
        $actualiza_mesa=new Ticket_model();
        $where = 'ID_ticket='.$this->input->post('ID_ticket');
        echo $actualiza_mesa->actualiza_mesa( $this->input->post('mesa'), $this->input->post('ID_ticket'));
        redirect('admin/acceso');
        
    }
    
    /**Esta funcion muestra una pregunta en especifico y permite responder */
    public function responder(){

        if($this->session->userdata('logueado') && $this->session->userdata('logueado') == '1'){
            $datos=new Ticket_model();
            $dato=new Admin_model();
            //var_dump($this->input->post('pregunta'));
            $id = array(
                'ID_user_trouble' => $this->input->get('pregunta'),
            );
            $res = $dato->traer_duda($id);
            //var_dump($res);
            
            $answers=$datos->get_answers(array('id_ticket'=>$res->ID_user_trouble) );
                    $id_t = array(
                        'ID_ticket' => $res->ID_user_trouble,
                    );
                    
            $ticket = $datos->traer_ticket($this->input->get('pregunta'));
            //var_dump($ticket);
            $status=$datos->get_status();
            $where=$this->session->userdata('id_mesabb');
            //var_dump($answers);
            //var_dump($res);
            $data=array();
            $data=[
                'duda'      =>$res,
                'answers'   =>$answers,
                'status'    =>$status,
                'ticket'    =>$ticket,  
                'areas'     =>$datos->get_areas($where)
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
        
    }

    public function responder_insert(){
        if($this->session->userdata('logueado') && $this->session->userdata('rol_ua') == '1'){    
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
                'id_ticket' => $this->input->post('ID_duda'),
            ];
            $this->sendEmail($data);
            var_dump($data);
            //var_dump($url);
            redirect($url);
        }
    }

    /**Aqui se realizan las estadisticas */

    public function estadisticas(){

        if($this->session->userdata('logueado') && $this->session->userdata('logueado') == '1'){
            
            $data=array();
            
            $data = [
                'navbar'        => $this->load->view('templates/vertical/navbar2_view', $data, TRUE),
                'main_content'  => $this->load->view('inicio/graficas_view', $data, TRUE),
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
        
    }

    public function excel(){
        $tickets=$this->Admin_model->get_ticket_pdf($this->session->userdata('id_mesabb'));
       
        $respuestas=$this->Admin_model->get_respuestas_pdf();
        
        header('Content-type:application/xls');
        header('Content-Disposition: attachment; filename=nombre_archivo.xls');
        
        echo '<table class="table" border="1">';
            echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">Email</th>';
                echo '<th scope="col">Nombre</th>';
                echo '<th scope="col">Duda</th>';
                echo '<th scope="col">Respuestas</th>';
                echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($tickets as $key => $ticket) {
                echo '<tr>';
                echo '<td>'.$ticket->email_uwt.'</td>';
                echo '<td>'.$ticket->name_user_uwt.' '.$ticket->surname_user_uwt.' '.$ticket->second_surname_user_uwt.'</td>';
                echo '<td>'.utf8_decode($ticket->trouble_content_tr).'</td>';
                echo '<td>';

                foreach ($respuestas as $key => $res) {
                    if ($ticket->ID_ticket==$res->id_ticket) {
                        echo utf8_decode($res->name_answer).':'.utf8_decode($res->answer_content_a);
                    }
                }
                   
                
                echo '</td>';
                echo '</tr>';
            }
                
            echo '</tbody>';
            echo '</table>';
        
    }

    public function edades(){
        $edades=$this->Admin_model->get_edades_grafica($this->session->userdata('id_mesabb'));
        echo json_encode($edades);
        
    }

    public function sexo(){
        $sexo=$this->Admin_model->get_sexo_grafica($this->session->userdata('id_mesabb'));
        echo json_encode($sexo);
        
    }

    
    public function estatus(){
        $estatus=$this->Admin_model->get_estatus_grafica($this->session->userdata('id_mesabb'));
        echo json_encode($estatus);
        
    }

    /**Funcion para traer la modalidad para graficas */
    public function modalidad(){
        $modalidad=$this->Admin_model->get_modalidad_grafica($this->session->userdata('id_mesabb'));
        echo json_encode($modalidad);
        
    }

    /**Funcion para traer la tipo de consultante para graficas */
    public function consultante(){
        $consultante=$this->Admin_model->get_tipo_consultante_grafica($this->session->userdata('id_mesabb'));
        echo json_encode($consultante);
        
    }

    public function logout()
    {
        //$vars = array('email', 'materias', 'logueado');
        //$this->session->unset_userdata($vars);
        $this->session->sess_destroy();
        redirect('login');
    }

}/**Fin de la clase */
