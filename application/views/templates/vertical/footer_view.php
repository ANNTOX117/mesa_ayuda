<footer class="main-footer">
    <!-- To the right -->
    <?php echo (isset($footer_))?: FALSE;?>

    <div class="col-12 text-center">


                <p class="mb-0 text-white">
                    <strong>
                        Sistema de Mesa de Ayuda del Instituto Rosario Castellanos
                    </strong>
                </p>
            </div>
            <div class="col-12 text-center">
                <a class="navbar-brand" href="#">

                <img src="<?php echo base_url('assets/ownsite/inicio/img/logos_footer.svg');?>" alt="Logos oficiales de CdMx" class="img-fluid" width="450px" >
                </a>
            
                <p class="mb-0 text-white">
                    <strong>
                       <a target="_blank" href="<?php echo base_url('assets/ownsite/guias/AvisoPrivacidad.pdf'); ?>" class="text-white">Consulta el aviso de privacidad</a> 
                    </strong>
                </p>
            </div>
            


    <!-- Default to the left -->
    <?php (isset($footer))? $footer :FALSE;?>
</footer>