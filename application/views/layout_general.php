<!DOCTYPE html>

       
       <html lang="es">
   
       

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/extadminlte/css/adminlte.min.css">
        <!-- icheck-bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- Ionicons -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ownsite/inicio/css/principal.css">
        <?php //echo $_SERVER['REQUEST_URI']; ?>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="shortcut icon" type="image/ico" href="<?php echo base_url(); ?>assets/ownsite/inicio/img/ircfavicon.ico" />
        
         <!--datables CSS básico datatable-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/tablas_admin/datatables/datatables.min.css"/>
        <!--datables estilo bootstrap 4 CSS-->  
        <link rel="stylesheet"  type="text/css" href="<?php echo base_url();?>assets/tablas_admin/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
        <!-- css datatable -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/tablas_admin/css/main.css">

        <!-- Animate-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
        <!--font awesome con CDN-->
        <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  -->
        <!-- Chart par Vue -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>
        <?php
        if (isset($css) && is_array($css)) {
            foreach ($css as $css_key) {
                echo $css_key;
            }
        }
        ?>
        <title><?php echo (title_site() != NULL)? title_site() : 'Hola';?></title>
    </head>
    <?php if (isset($vertical_select)): ?>
    <body class="hold-transition layout-top-nav">
    <?php echo (isset($vertical)) ? $vertical : FALSE; ?>
    <?php endif; ?>

    <?php if (isset($horizontal_select)): ?>
    <body class="hold-transition sidebar-mini layout-fixed">
    <?php echo (isset($horizontal)) ? $horizontal : FALSE; ?>
    <?php endif; ?>

    <?php if (isset($access_select)): ?>
    <body class="hold-transition login-page">
    <?php echo (isset($access)) ? $access : FALSE; ?>
    <?php endif; ?>
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/jquery/jquery-3.4.1.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo base_url(); ?>assets/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/extadminlte/js/adminlte.min.js"></script>
        <!-- Vue js para charts -->
        <script>
            const base_url="<?php echo base_url(); ?>";
            
        </script>
        <script src="https://cdn.jsdelivr.net/npm/babel-regenerator-runtime@6.5.0/runtime.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/babel-polyfill/dist/polyfill.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vuetify@2.0.10/dist/vuetify.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="https://unpkg.com/vue-chartjs@3.4.0/dist/vue-chartjs.js"></script>
        <!-- Archivos vue -->
        <script src="<?php echo base_url(); ?>assets/vue/components/faqs.js"></script>
        <script src="<?php echo base_url(); ?>assets/vue/components/graficas/edades.js"></script>
        <script src="<?php echo base_url(); ?>assets/ownsite/librerias/js/html2pdf.bundle.js"></script>
       

            <!-- jQuery, Popper.js, Bootstrap JS -->
        <script src="<?php echo base_url(); ?>assets/tablas_admin/popper/popper.min.js"></script>
        
        <!-- datatables JS -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/tablas_admin/datatables/datatables.min.js"></script>    
        <!-- para usar botones en datatables JS -->  
        <script src="<?php echo base_url(); ?>assets/tablas_admin/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
        <script src="<?php echo base_url(); ?>assets/tablas_admin/datatables/JSZip-2.5.0/jszip.min.js"></script>    
        <script src="<?php echo base_url(); ?>assets/tablas_admin/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
        <script src="<?php echo base_url(); ?>assets/tablas_admin/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/tablas_admin/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
        <!-- código JS propìo-->   
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/tablas_admin/js/main.js"></script>  
        <!-- Validar formulario desde front -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/extadminlte/js/validation_form.js"></script>  
        <?php
        if (isset($js) && is_array($js)) {
            foreach ($js as $js_key) {
                echo $js_key;
            }
        }
        ?>

        

        
    </body>
</html>
