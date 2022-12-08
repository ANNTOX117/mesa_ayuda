<div class="container-fluid">
    <div class="row usuario">
        <div class="col-sm-11 col-md-9 col-lg-8 col-xl-7 mx-auto mb-5" >
                <h1 class="my-5 titulo1">Seguimiento a consulta:</h1>
                                <p class="cuadro-azul rounded p-4">
                                Anote la dirección de correo que utilizó cuando envió su consulta.
                                <br>Dé clic en enviar.
                                <br>El sistema mostrará una pantalla con sus datos de usuario y el historial de consultas y respuestas. 

                                </p>
            <form class="mt-3 text-center text-sm-right" action="<?php echo base_url().'usuarios/principal/validar'; ?>" method="get">
                <input class="form-control" type="email" placeholder="Anote el correo electrónico" name="pregunta">
                <button type="submit" class="btn btn-naranja my-3">Enviar</button>
            </form>
            <?php if($this->session->flashdata('error_ss')): ?>
                <span><div class="alert alert-danger mt-2" role="alert"><?php echo $this->session->flashdata('error_ss'); ?></div></span>
            <?php endif; ?>
        </div>
    </div>
</div>
