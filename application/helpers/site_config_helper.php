<?php

function title_site() {
    $name = 'Mesa de ayuda';
    return $name;
}

function header_title_content ($title, $small = FALSE) {

    if ($small) {
        $html = '<h1 class="m-0">'. $title . ' <small>'. $small.'</small></h1>';
    } else {
        $html = '<h1 class="m-0">'. $title . '</h1>';
    }
    return $html;
}

function breadcums_change ($data, $active = FALSE) {
    $html = ' <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Layout</a></li>
                    <li class="breadcrumb-item active">Top Navigation</li>
                </ol>';
    return $html;
}

function footer_right () {
    $html = '<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.';
    return $html;
}


function footer_more ($more = FALSE) {
    $html = '<div class="float-right d-none d-sm-inline">
        ' . $more . '
    </div>';
    return $html;
}

function error_msg($alert_type = FALSE, $message = FALSE)
{
    if ($message) {
        $html = '<div class="row">
                    <div class="col-12">
                    <div class="alert alert-'. $alert_type .' alert-dismissible fade show" role="alert">
                          <strong><i class="fas fa-exclamation-circle"></i> ¡Verifica!</strong>
                          ' . $message . '
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>
                    </div>
                </div>';
        return $html;
    }  else {
        return FALSE;
    }
}