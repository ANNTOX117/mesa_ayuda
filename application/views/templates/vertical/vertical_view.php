<div class="wrapper">
    <?php echo (isset($navbar)) ? $navbar : FALSE; ?>
    
    <?php echo (isset($main_content)) ? $main_content : FALSE; ?>

    <?php echo (isset($aside)) ? $aside : FALSE; ?>

    <?php echo (isset($footer)) ? $footer : FALSE; ?>
    
</div>


       <!-- jQuery -->
       <script src="<?php echo base_url(); ?>assets/jquery/jquery-3.4.1.min.js"></script>
<script >
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>