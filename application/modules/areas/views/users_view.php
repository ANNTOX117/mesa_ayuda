<div id="sideNavigation" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="<?php echo base_url();?>admin/acceso">Principal</a>
    <a href="<?php echo base_url();?>admin/acceso">Todas las Dudas</a>
    <a href="<?php base_url();?>users">Usuarios</a>
    <a href="<?php base_url();?>ticket">Tikets</a>
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
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Contraseña</span>
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
                            </div>




                            <!--input de Confirmar contraseña-->
                            <div class="input-group mb-3">
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



                            <!--Data de fecha de nacimiento-->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Fecha de nacimiento</span>
                                </div>

                                <?php
                                $date_birth = array(
                                    'type' => 'date',
                                    'id' => 'nacimiento',
                                    'class' => 'form-control',
                                    'data-toggle' => 'tooltip',
                                    'title' => '',
                                    'name' => 'nacimiento',
                                    'placeholder' => ''
                                );
                                echo form_input($date_birth) ?>
                            </div>




                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-naranja-contorno mr-2">Limpiar</button>
                            <button type="submit" class="btn btn-naranja">Guardar</button>
                        </div>


                        <?php echo form_close(); ?>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
