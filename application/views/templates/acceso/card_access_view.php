<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Ingrese su correo y contraseña</p>

        <form action="<?php echo base_url('admin/acceso/validar_login'); ?>" method="post" class="needs-validation" novalidate>
            <div class="input-group mb-3">
                <input id="user" type="email" name="email" class="form-control" placeholder="Correo electónico" require>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <div class="invalid-feedback">Correo Invalido</div> 
            </div>
            <div class="input-group mb-3">
                <input id="validaPass" name="password" type="password" class="form-control" placeholder="Contraseña" require>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                
            </div>
           
                <!-- /.col -->
                <span id="error"></span>
                <?php if($this->session->flashdata('error_ss')): ?>
                <span><div class="alert alert-danger mt-2" role="alert"><?php echo $this->session->flashdata('error_ss'); ?></div></span>
                <?php endif; ?>
                
                
                <div class="pt-5 px-sm-5 px-4">
                    <button type="submit" class="btn btn-naranja btn-block">Acceder</button>
                </div>

                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-card-body -->
</div>
<div class="w-100 h-10">hola</div>