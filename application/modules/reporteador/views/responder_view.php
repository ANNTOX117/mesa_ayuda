
<div class="container-fluid fondo-usuarios pb-5">
    <div class="row">
        <div class="col-sm-11 col-md-9 col-lg-8 col-xl-7 mx-auto">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action=<?php echo base_url().'areas/principal/responder_insert' ?>>
                    <fieldset>
                        <h1 class="titulo1 my-5">Datos del Usuario</h1>

                        <div class="container-fluid">
                            <div class="form-group row">
                                <span class="col-1 col-sm-1 pl-0"><i class="fa fa-user icono-datos-usuario"></i></span>
                                <div class="alert alert-light col-11 col-sm-11" role="alert">
                                <?php echo $duda->name_user_uwt.' '.$duda->surname_user_uwt.' '.$duda->second_surname_user_uwt; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="container-fluid">
                            <div class="form-group row">
                                <span class="col-1 col-sm-1 pl-0"><i class="fa fa-envelope icono-datos-usuario"></i></span>
                                <div class="alert alert-light col-11 col-sm-11" role="alert">
                                <?php echo 'Correo electrónico: '.$duda->email_uwt; ?>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="form-group row">
                                <span class="col-1 col-sm-1 pl-0"><i class="fa fa-phone-square icono-datos-usuario"></i></span>
                                <div class="alert alert-light col-11 col-sm-11" role="alert">
                                <?php echo 'Telefono: '.$duda->phone_uwt; ?>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="form-group row">
                                <span class="col-1 col-sm-1 pl-0"></span>
                                <div class="alert alert-light col-11 col-sm-11" role="alert">
                                <?php echo 'Duda: '.$duda->trouble_content_tr; ?>
                                </div>
                            </div>
                        </div>

                        

                        <!-- Tabla de respuestas -->

                    <div class="table-responsive">  
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Respuesta</th>
                            <th scope="col">Quien responde</th>
                            <th scope="col">Ticket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            if (isset($answers)) {
                                foreach ($answers as $key => $answer) {
                                    echo '<tr>';
                                    echo '<td scope="row">'.$answer->date_created_a.'</td>';
                                    echo '<td>'.$answer->answer_content_a.'</td>';
                                    echo '<td>'.$answer->name_answer.'</td>';
                                    echo '<td>'.$duda->ID_user_trouble.'</td>';
                                }
                            }
                            ?>
                            </tbody>
                            </table>
                        </div>
                        <!-- termina tabla de respuestas -->
                       
                        <!-- inputs ocultos -->
                        

                        <div class="form-group">
                            <div class="text-center text-sm-right">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                        Regresar
                                    </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">A dónde quieres regresar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <p class="alinear1">
                                        <a href="<?php echo base_url().'reporteador/principal/ticket_abierto'; ?>" >Abiertos</a>
                                        </p>
                                        <p class="alinear1">
                                        <a href="<?php echo base_url().'reporteador/principal/ticket_asignado'; ?>" >Asignados</a>
                                        </p>
                                        <p class="alinear1">
                                        <a href="<?php echo base_url().'reporteador/principal/ticket_pendiente'; ?>" >Pendientes</a>
                                        </p>
                                        <p class="alinear1">
                                        <a href="<?php echo base_url().'reporteador/principal/ticket_resuelto'; ?>" >Resueltos</a>
                                        </p>
                                        <p class="alinear1">
                                        <a href="<?php echo base_url().'reporteador/principal/ticket_cerrado'; ?>" >Cerrados</a>
                                        </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                              <!-- fin modal-->
                                
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>