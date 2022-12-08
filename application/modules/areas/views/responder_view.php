
<div class="container-fluid fondo-usuarios pb-5">
    <div class="row">
        <div class="col-sm-11 col-md-9 col-lg-8 col-xl-7 mx-auto">
            <div class="well well-sm">

            <div class="text-center text-sm-right">
                       <p> Estatus del folio:<?php 
                        if(isset($ticket)){
                            //var_dump($ticket);
                             echo $ticket[0]->ticket_status_ts;  
                        } 
                        ?></p>
                        <?php   
                                    if (isset($status)) {
                                       
                                        echo '<form method="POST" action='.base_url().'areas/principal/insert_status>';
                                        echo '<select id="cars" name="status">';
                                        foreach ($status as $key => $valor) {
                                            echo '<option value='.$valor->ID_ticket_status.'>'.$valor->ticket_status_ts.'</option>';
                                        }
                                        echo '<input name="ID_ticket" type="hidden" value='.$duda->ID_user_trouble.'>';
                                        echo '</select>';
                                        echo '<button type="submit" class="btn btn-primary btn-naranja">Cambiar</button>';
                                        echo '</form>';
                                    }
                                    
                         ?>
                                
                            </div>

                            <div class="text-center text-sm-right">
                       <p> Area asignada:<?php 
                       //var_dump($ticket);
                        //echo $ticket->ID_area;
                        if(isset($ticket)){
                            
                            echo $ticket[0]->area_name_au;
                        } 
                        ?></p>
                        <?php   
                                    if (isset($areas)) {
                                       
                                        echo '<form method="POST" action='.base_url().'areas/principal/insert_area2>';
                                        echo '<select id="cars" name="area">';
                                        foreach ($areas as $key => $valor) {
                                            echo '<option value='.$valor->ID_area.'>'.$valor->area_name_au.'</option>';
                                        }
                                        echo '<input name="ID_ticket" type="hidden" value='.$duda->ID_user_trouble.'>';
                                        echo '</select>';
                                        echo '<button type="submit" class="btn btn-primary btn-naranja">Cambiar</button>';
                                        echo '</form>';
                                    }
                                    
                         ?>
                                
                            </div>

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

                        <div class="container-fluid">
                            <div class="form-group row">
                                <span class="col-1 col-sm-1 pl-0"></span>
                                <div class="alert alert-light col-11 col-sm-11" role="alert">
                                <?php
                                    if(isset($duda->trouble_content_tr)){

                                        echo 'Asunto: '.$duda->matter_uwt; 
                                    } 
                                        ?>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="form-group row">
                                <span class="col-1 col-sm-1 pl-0"></span>
                                <div class="alert alert-light col-11 col-sm-11" role="alert">
                                <?php
                                    

                                        echo 'Modalidad: '.$duda->modality_uwt; 
                                     
                                        ?>
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
                        <div class="form-group">
                            <span class="text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="">
                                <textarea class="form-control" id="message" name="respuesta" placeholder="Ingresa una nueva respuesta" rows="7"></textarea>
                            </div>
                        </div>
                        <!-- inputs ocultos -->
                        <input name="ID_user" type="hidden" value=<?php echo $this->session->userdata('ID_user_admin'); ?>>
                        <input name="ID_duda" type="hidden" value=<?php echo $duda->ID_user_trouble; ?>>
                        <input name="mail" type="hidden" value=<?php echo $duda->email_uwt; ?>>
                        <input name="anombre" type="hidden" value=<?php echo $duda->name_user_uwt; ?>>
                        <input name="apaterno" type="hidden" value=<?php echo $duda->surname_user_uwt; ?>>
                        <input name="amaterno" type="hidden" value=<?php echo $duda->second_surname_user_uwt; ?>>
                        <input name="nombre" type="hidden" value="IRC">

                        <div class="form-group">
                            <div class="text-center text-sm-right">
                                <!-- inicio modal-->

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
                                        <a href="<?php echo base_url().'areas/principal/ticket_abierto'; ?>" >Abiertos</a>
                                        </p>
                                        <p class="alinear1">
                                        <a href="<?php echo base_url().'areas/principal/ticket_asignado'; ?>" >Asignados</a>
                                        </p>
                                        <p class="alinear1">
                                        <a href="<?php echo base_url().'areas/principal/ticket_pendiente'; ?>" >Pendientes</a>
                                        </p>
                                        <p class="alinear1">
                                        <a href="<?php echo base_url().'areas/principal/ticket_resuelto'; ?>" >Resueltos</a>
                                        </p>
                                        <p class="alinear1">
                                        <a href="<?php echo base_url().'areas/principal/ticket_cerrado'; ?>" >Cerrados</a>
                                        </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                              <!-- fin modal-->
                                
                                <button type="submit" class="btn btn-primary btn-naranja">Enviar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>