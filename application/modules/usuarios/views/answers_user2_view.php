
<div class="container-fluid fondo-usuarios pb-5">
    <div class="row">
        <div class="col-sm-11 col-md-9 col-lg-8 col-xl-7 mx-auto">
            <div class="well well-sm">
                <form  class="form-horizontal" method="post" action=<?php echo base_url().'usuarios/Principal/responder_insert2' ?>>
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

                        <table class="table table-bordered table-striped table-dark">
                        <thead>
                            <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Respuesta</th>
                            <th scope="col">Responde</th>
                            
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
                                }
                            }
                            ?>
                            </tbody>
                            </table>
                        <!-- termina tabla de respuestas -->
                        <div class="form-group">
                            <span class="text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div>
                                <textarea class="form-control" id="message" name="respuesta" placeholder='En caso de requerirlo puede escribir en este espacio. Después dé click en "Enviar".'
                                 rows="7" require></textarea>
                            </div>
                        </div>
                        <!-- inputs ocultos -->
                        <input name="email" type="hidden" value=<?php echo $duda->email_uwt; ?>>
                        <input name="ID_duda" type="hidden" value=<?php echo $duda->ID_user_trouble; ?>>
                        <input name="nombre" type="hidden" value="<?php echo $duda->name_user_uwt; ?>">

                        <div  class="form-group">
                            <div class="text-center text-sm-right">
                                <a href="<?php echo base_url(); ?>" type="submit" class="btn btn-primary btn-naranja">Regresar</a href="<?php echo base_url(); ?>">
                                <button type="submit" class="btn btn-primary btn-naranja">Enviar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>