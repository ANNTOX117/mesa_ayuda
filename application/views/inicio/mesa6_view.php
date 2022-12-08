<div class="col-12">
    <!--<div class="card">-->
    <div class="row formulario">
    
        <!--<h2 class="">
            Registra tu duda
        </h2>-->
    
        

        <!--<div class="card-body">-->
        <div class="col-md-11 col-lg-8 mx-auto seguimiento">

            <div class="row justify-content-center justify-content-sm-end mb-5">
                <div class="col-auto">
                <!-- Modal de seguimiento -->
            <button type="button" class="btn btn-naranja" data-toggle="modal" data-target="#exampleModalCenter">
                   Dar seguimiento a su consulta
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Bienvenido</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body ">
                            <div class="alert" role="alert">
                                <p>Estimado usuario:</p>
                                <p>
                                
                                En esta sección podrá dar seguimiento a las consultas que ha registrado a 
                                través de la mesa de ayuda. Sólo debe ingresar la cuenta de correo que 
                                utilizó al momento de enviar su consulta.
                                </p>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-naranja" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn"><a class="btn-naranja-contorno py-2 px-3 rounded" href="<?php echo base_url().'usuarios'; ?>">Continuar</a></button>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                       
                </div>
            <!-- Fin de modal -->
                    
               

                <?php if($this->session->flashdata('error_ss')): ?>
                    <span><div class="alert alert-danger mt-2" role="alert"><?php echo $this->session->flashdata('error_ss'); ?></div></span>
                <?php endif; ?>
            <?php echo form_open('',array('enctype' => 'multipart/form-data'));?>
            <div class="row">
                <div class="col-12">
                   
                    <div class="row mt-3">
                        <?php
                        echo error_msg($alert_type = FALSE, form_error('nombre'));
                        ?>
                        
                        <div class="col-md-4">
                            <?php echo form_label('<i class="fas fa-user icono"></i>Nombre <span class="asterisco">*</span>', 'nombre', 'class=""')?>
                        </div>
                        
                        <div class="col-md-8">
                            <?php
                            $data = array(
                                'id'            => 'nombre',
                                'class'         => 'form-control',
                                'name'          => 'nombre',
                                'type'          => 'text',
                                'placeholder'   => 'Nombre(s)',
                                'required'      => TRUE
                            );
                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row  mt-3">
                        <div class="col-md-4">
                            <?php echo form_label('<i class="fas fa-user icono apellido1"></i>Primer apellido <span class="asterisco">*</span>', 'pApellido', 'class=""')?>
                        </div>
                        <div class="col-md-8">
                            <?php
                            $data = array(
                                'id'            => 'pApellido',
                                'class'         => 'form-control',
                                'name'          => 'pApellido',
                                'type'          => 'text',
                                'placeholder'   => 'Primer apellido',
                                'required'      => TRUE
                            );
                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <?php echo form_label('<i class="fas fa-user icono apellido2"></i>Segundo apellido <span class="asterisco">*</span>', 'sApellido', 'class=""')?>
                        </div>
                        <div class="col-md-8">
                            <?php
                            $data = array(
                                'id'            => 'sApellido',
                                'class'         => 'form-control',
                                'name'          => 'sApellido',
                                'type'          => 'text',
                                'placeholder'   => 'Segundo apellido',
                                'required'      => TRUE
                            );
                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <?php echo form_label('<i class="fas fa-envelope icono"></i>Correo electrónico <span class="asterisco">*</span>', 'email', 'class=""')?>
                        </div>
                        <div class="col-md-8">
                            <?php
                            $data = array(
                                'id'            => 'email',
                                'class'         => 'form-control',
                                'name'          => 'email',
                                'type'          => 'email',
                                'placeholder'   => 'Correo electrónico',
                                'required'      => TRUE
                            );
                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <?php echo form_label('<i class="fas fa-mobile-alt icono"></i>Telefóno celular <span class="asterisco">*</span>', 'celular', 'class=""')?>
                        </div>
                        <div class="col-md-8">
                            <?php
                            $data = array(
                                'id'            => 'celular',
                                'class'         => 'form-control',
                                'name'          => 'celular',
                                'type'          => 'tel',
                                'placeholder'   => 'Telefóno celular',
                                'pattern'       => '[10]{0-9}',
                                'min'           => '0',
                                'required'      => TRUE
                            );
                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <?php echo form_label('<i class="fas fa-venus-mars icono"></i>Sexo <span class="asterisco">*</span>', 'sexo', 'class=""')?>
                        </div>
                        <div class="col-md-8">
                            <?php
                            echo form_dropdown('sexo', $sexo, '','class="form-control" id="sexo" required');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row  mt-3">
                        <div class="col-md-4">
                            <?php echo form_label('<i class="fas fa-users icono"></i>Tipo de consultante <span class="asterisco">*</span>', 'consultante', 'class=""')?>
                        </div>
                        <div class="col-md-8">
                            <?php
                            echo form_dropdown('consultante', $consultante, '','class="form-control" id="consultante" required');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <?php echo form_label('<i class="fas fa-envelope icono"></i>Asunto <span class="asterisco">*</span>', 'email', 'class=""')?>
                        </div>
                        <div class="col-md-8">
                            <?php
                            $data = array(
                                'id'            => 'asunto',
                                'class'         => 'form-control',
                                'name'          => 'asunto',
                                'type'          => 'text',
                                'placeholder'   => 'Ingresa el asunto',
                                'required'      => TRUE
                            );
                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row  mt-3">
                        <div class="col-md-4">
                            <?php echo form_label('<i class="fas fa-users icono"></i>Modalidad <span class="asterisco">*</span>', 'consultante', 'class=""')?>
                        </div>
                        <div class="col-md-8">
                            <?php
                                $modalidad=[
                                    'Presencial',
                                    'A distancia'
                                ];
                            echo form_dropdown('modalidad', $modalidad, '','class="form-control" id="consultante" require');
                            ?>
                        </div>
                    </div>
                </div>
                <!--Esta parte se encarga de subir imagenes
                  se comenta a petición de imelda -->
                  <!--
                <div class="col-12">
                    <div class="row  mt-3">
                        <div class="col-md-4">
                            <?php //echo form_label('<i class="fa fa-address-card" aria-hidden="true"></i> Captura Pantalla <span class="asterisco">*</span>', 'consultante', 'class=""')?>
                        </div>
                        <div class="col-md-8">
                            <input type="file" class="alert alert-success"  name="captura">
                            <?php
                            //echo form_upload('archivo', $archivo, '','class="form-control" id="archivo" required');
                            ?>
                        </div>
                    </div>
                </div>
                    -->

                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <?php echo form_label('<i class="fas fa-question-circle icono"></i>Duda <span class="asterisco">*</span>', 'queja', 'class=""')?>
                        </div>
                        <div class="col-md-8">
                            <?php
                            $data = array(
                                'id'            => 'queja',
                                'class'         => 'form-control',
                                'name'          => 'queja',
                                
                                'placeholder'   => 'Estimado consultante, con la intención de dar un mejor seguimiento a tu ticket, te pedimos que nos compartas la siguiente información: CURP, Carrera, Asignatura, Semestre, Grupo, Espacio en el que ocurre la incidencia, Breve y concreta explicación de la incidencia.',
                                'required'      => TRUE
                            );

                                echo  form_textarea($data);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 mb-5 justify-content-center justify-content-sm-end">
                <div class="col-auto">
                <input type="hidden" name="id_mesabb" value="6">
                <?php

                    echo form_submit('enviar', 'Enviar', 'class="btn btn-naranja"');
                    ?>
               
                    
                </div>
            </div>
            <?php echo form_close();?>
            
            
             
        </div>
    </div>
</div>
<div class="w-100 h-10">hola</div>
<div class="w-100 h-10">hola</div>