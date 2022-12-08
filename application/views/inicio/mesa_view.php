<body>
                <div class="container" >

                
                    <div class="row">
                            <div class="mobile m-5">
                                <h1>Bienvenidos a la Mesa de ayuda</h1>
                            </div>
                            <p class="m-3 pt-5">

                                A continuaci&oacute;n encontrará los accesos para poder enviar su duda a un área del IRC.<br>
                                Recomendamos que antes de enviar su consulta revise la sección de preguntas frecuentes.<br>
                                <a target="_blank" href="<?php echo base_url("assets/ownsite/guias/Guía_mesa_ayuda_V4.pdf"); ?>">Guía de uso</a>
                            </p>

                    </div>
      

                    <!-- Aqui debe ir mi componente -->
                    <div id="faqs" class="border-top pt-3 mb-5">
                    <div class="alinear_faqs">
                    <h1 class="mb-5">
                        <span @click="activar">
                            <button type="button" class="btn btn-outline-primary p-2 border-0"><i class="fas fa-sort-down mr-2"></i>Preguntas Frecuentes</button>
                        </span>
                        <span type="button" class="btn btn-outline-success btn-naranja-contorno" @click="desactivar" v-show="mostrar==='si'">Ocultar</span>
                    </h1>
                    </div>
                    <section v-show="mostrar==='si'" >
                            <grupo1></grupo1>
                            <grupo2></grupo2>
                            <grupo3></grupo3>
                            <grupo4></grupo4>
                            <grupo5></grupo5>
                            <grupo6></grupo6>
                            <grupo7></grupo7>
                            <grupo8></grupo8>  
                    </section>  
                    </div>
                    <!-- aqui termina -->
                
                    <div class="row">

                        <p class="m-3 pt-5">
                            Para seleccionar una opción de área de atención, le invitamos a revisar las orientaciones sobre el tipo de consulta que atiende cada área.
                        </p>

                    </div>
        
                    <div class="row justify-content-md-center m-3">

                        <button class="btn btn-naranja" style="height:40px; width:auto;">

                            <p>
                                ¿A dónde envío mi consulta?
                            </p>

                        </button>

                    </div>                    
                    
                    <div class="row">

                        <p class="m-3 pt-5">
                            Una vez identificada la opción que corresponda a su consulta, seleccione:
                        </p>

                    </div>

                    <div class="row justify-content-md-center ligas-mesas ml-3">

                        <a style="margin-bottom:35px; margin-right:5px;" href="<?php echo base_url('inicio/mesa1'); ?>" class="btn btn-naranja">Educación continua /PIIRC</a>
                        <a style="margin-bottom:35px; margin-right:5px;" href="<?php echo base_url('inicio/info_mesa'); ?>" class="btn btn-naranja">Dirección de Campus</a>
                        <a style="margin-bottom:35px; margin-right:5px;" href="<?php echo base_url('inicio/mesa3'); ?>" class="btn btn-naranja">Asuntos Estudiantiles</a>
                        <a style="margin-bottom:35px; margin-right:5px;" href="<?php echo base_url('inicio/mesa4'); ?>" class="btn btn-naranja">Transparencia</a>
                        <a style="margin-bottom:35px; margin-right:5px;" href="<?php echo base_url('inicio/mesa5'); ?>" class="btn btn-naranja">Dirección Académica</a>
                        <a style="margin-bottom:35px;" href="<?php echo base_url('inicio/mesa6'); ?>" class="btn btn-naranja">Licenciaturas a Distancia</a>
                    
                    </div>

                </div>
</body>
