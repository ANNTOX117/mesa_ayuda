<header class="container-fluid encabezado">
    <div class="row">
        <div class="col-12">    
            <img class="logos-encabezado" src="<?php echo base_url();?>assets/ownsite/inicio/img/logos_encabezado.svg" alt="Logotipos de la Ciudad de México, la Dirección General de Planeación y Evaluación Estratégica (SECTEI) y el Instituto Rosario Castellanos (IRC)" />
        </div>
    <div>
</header>

    
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?php echo base_url().'login'?>" class="navbar-brand">
                <span class="brand-text titulo-mesa">Mesa de ayuda</span>
                </a>
                 <span>
             </div>
             
        </nav>

       
    
    <?php if($_SERVER['REQUEST_URI']=='/registro/mesa_ayuda_v2/inicio/gracias' || $_SERVER['REQUEST_URI']=='/registro/mesa_ayuda_v2/usuarios' || $_SERVER['REQUEST_URI']=='/mesa_ayuda_v2/usuarios'): ?>
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?php echo base_url();?>" class="navbar-brand">
                <span class="brand-text titulo-mesa">Mesa de ayuda</span>
                </a>
                 <span>
             </div>
             
        </nav>

       
    <?php endif; ?>

   
    
  
  