<div id="sideNavigation" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="<?php echo base_url();?>admin/acceso">Principal</a>
    <a href="<?php echo base_url();?>admin/acceso">Todas las Dudas</a>
    <a href="<?php base_url();?>users">Usuarios</a>
    
    <a href="#">Tikets</a>
  <ul>
    <a href="<?php echo base_url();?>admin/acceso/ticket_abierto"><li>Abiertos <?php if(isset($abiertos)) { echo '('.$abiertos.')'; } ?></li></a>
    <a href="<?php echo base_url();?>admin/acceso/ticket_asignado"><li>Asignados <?php if(isset($asignados)) { echo '('.$asignados.')'; } ?> </li></a> 
    <a href="<?php echo base_url();?>admin/acceso/ticket_pendiente"><li>Pendientes <?php if(isset($pendientes)) { echo '('.$pendientes.')'; } ?></li></a>
    <a href="<?php echo base_url();?>admin/acceso/ticket_resuelto"><li>Resueltos <?php if(isset($resueltos)) { echo '('.$resueltos.')'; } ?></li></a>
    <a href="<?php echo base_url();?>admin/acceso/ticket_cerrado"><li>Cerrados <?php if(isset($cerrados)) { echo '('.$cerrados.')'; } ?></li></a>
  </ul>

    <a href="<?php echo base_url();?>admin/acceso/logout">Cerrar Sesión</a>
</div>

<nav class="topnav">
    <a href="#" onclick="openNav()">
        <svg width="30" height="30" id="icoOpen">
            <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
            <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
            <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
        </svg>
    </a>
</nav>


<div class="container-fluid fondo-azul pt-5">
    <div class="row">
        <div class="col-sm-11 col-md-9 col-lg-8 col-xl-7 mx-auto mb-5" >
            <div class="card animate__animated animate__backInRight" role="document">

                <div class="card-header cuadro-azul">
                    <h1 class="h5">Registro de nuevos usuario</h1>
                </div>

                <div class="card-body">
                    <div class="card-text">

                        <?php echo form_open() ?>

                        <div class="form-row">


                            <!--Input nombre-->
                            <div class="input-group  mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre de usuario</span>
                                </div>


                                <?php
                                $input_user_key = array(
                                    'type'          => 'text',
                                    'id'            => 'name',
                                    'class'         => 'form-control',
                                    'data-toggle'   => 'tooltip',
                                    'title'         => '',
                                    'name'          => 'user_name',
                                    'placeholder'   => 'Nombre'
                                );
                                echo form_input($input_user_key) ?>
                            </div>




                            <!--input de email-->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Correo electrónico</span>
                                </div>

                                <?php
                                $input_email = array(
                                    'type'          => 'email',
                                    'id'            => 'email',
                                    'class'         => 'form-control',
                                    'data-toggle'   => 'tooltip',
                                    'title'         => '',
                                    'name'          => 'email',
                                    'placeholder'   => 'Email'
                                );
                                echo form_input($input_email) ?>
                            </div>




                            <!--input de contraseña-->
                            <div class="input-group mb-3" id="show_hide_password">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Contraseña
                                    </span>
                                    
                                </div>
                                
                                    

                                <?php
                                $input_password = array(
                                    'type' => 'password',
                                    'id' => 'password',
                                    'class' => 'form-control',
                                    'data-toggle' => 'tooltip',
                                    'title' => '',
                                    'name' => 'password',
                                    'placeholder' => 'Contraseña'
                                );
                                echo form_input($input_password) ?>
                                 <div class="input-group-prepend" >
                                    <div class="input-group-addon input-group-text" >
                                    <a href=""><i class="fa fa-eye-slash"  aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>




                            <!--input de Confirmar contraseña-->
                            <div class="input-group mb-3" id="show_hide_password">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Confirma tu contraseña</span>
                                </div>

                                <?php
                                $input_password = array(
                                    'type'          => 'password',
                                    'id'            => 'password',
                                    'class'         => 'form-control',
                                    'data-toggle'   => 'tooltip',
                                    'title'         => '',
                                    'name'          => 'confirm',
                                    'placeholder'   => 'Contraseña'
                                );
                                echo form_input($input_password) ?>
                                 <div class="input-group-prepend" >
                                    <div class="input-group-addon input-group-text" >
                                    <a href=""><i class="fa fa-eye-slash"  aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>



                            <!--dropdown de estatus-->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Estatus</span>
                                </div>

                                <?php
                                $drop_down_rol = array(
                                    'Selecciona el estatus del usuario',
                                    'Activo',
                                    'Inactivo',

                                );
                                echo form_dropdown('estatus', $drop_down_rol, NULL, 'class="form-control"') ?>
                            </div>

                            <!--dropdown de Rol de usuario-->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rol</span>
                                </div>

                                <?php
                                $drop_down_rol = array(
                                    'Selecciona el estatus del usuario',
                                    'Admin',
                                    'Administrador area',
                                    'Reporteador',

                                );
                                echo form_dropdown('rol_ua', $drop_down_rol, NULL, 'class="form-control"') ?>
                            </div>



                            <!--Data de Area asignada-->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Area asignada</span>
                                </div>

                                <?php
                               
                                echo '<select   id="cars" name="area">';
                                      foreach ($areas as $area) {
                                        if($area->area_name_au!= 'Sin asignar'){
                                            echo '<option value='.$area->ID_area.'>'.$area->area_name_au.'</option>';
                                          }
                                      }
                                      echo '</select>';
                                
                                     
                                
                                ?>
                            </div>




                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-naranja-contorno mr-2">Limpiar</button>
                            <button type="submit" class="btn btn-naranja">Guardar</button>
                        </div>


                        <?php echo form_close(); ?>
                        <?php if($this->session->flashdata('error_ss')): ?>
                            <span><div class="alert alert-danger mt-2" role="alert"><?php echo $this->session->flashdata('error_ss'); ?></div></span>
                            <?php endif; ?>
                        <?php if($this->session->flashdata('succes_ss')): ?>
                            <span><div class="alert alert-success mt-2" role="alert"><?php echo $this->session->flashdata('succes_ss'); ?></div></span>
                        <?php endif; ?>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>