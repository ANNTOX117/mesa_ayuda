<div id="sideNavigation" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="<?php echo base_url();?>admin/acceso">Todas las dudas</a>
  <a href="<?php base_url();?>users">Usuarios</a>
 
  <a href="#">Tikets</a>
  <ul>
    <a href="<?php echo base_url();?>admin/acceso/ticket_abierto"><li>Abiertos <?php if(isset($abiertos)) { echo '('.$abiertos.')'; } ?></li></a>
    <a href="<?php echo base_url();?>admin/acceso/ticket_asignado"><li>Asignados <?php if(isset($asignados)) { echo '('.$asignados.')'; } ?> </li></a> 
    <a href="<?php echo base_url();?>admin/acceso/ticket_pendiente"><li>Pendientes <?php if(isset($pendientes)) { echo '('.$pendientes.')'; } ?></li></a>
    <a href="<?php echo base_url();?>admin/acceso/ticket_resuelto"><li>Resueltos <?php if(isset($resueltos)) { echo '('.$resueltos.')'; } ?></li></a>
    <a href="<?php echo base_url();?>admin/acceso/ticket_cerrado"><li>Cerrados <?php if(isset($cerrados)) { echo '('.$cerrados.')'; } ?></li></a>
  </ul>

  <a href="<?php echo base_url();?>admin/acceso/logout">Cerrar sesión</a>
</div>
 
<nav class="topnav">
  <a href="#" onclick="openNav()">
    <svg width="30" height="30" id="icoOpen">
        <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
        <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
        <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
    </svg>
  </a>
</nav>
<div class="container mt-5 mb-5">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Duda</th>
                                <th>Correo</th>
                                <th>Status</th>                                                            
                                <th>Área</th>
                                
                                <th>Ticket</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php 
                               
                               if(isset($ticket)){
                                 foreach ($ticket as $key => $fila) {
                                  $newDate=strtotime('-2 hour', strtotime($fila->date_created_t));
                                    //if(!($fila->area_asigned_t)){ $area1='No Asignada';}
                                    echo '<tr class="text-center">';
                                    echo '<td class="align-top">'.$newDate=date('Y-m-j H:i:s', $newDate).'</td>';
                                    echo '<td class="text-left align-top">'.$fila->trouble_content_tr.'</td>';
                                    echo '<td class="align-top">'.$fila->email_uwt.'</td>';


                                    echo '<td class="align-top">';
                                    if ($fila->ticket_status_id_t== 1) { echo 'Abierto';  }
                                    if ($fila->ticket_status_id_t== 2) { echo 'Seguimiento';  }
                                    if ($fila->ticket_status_id_t== 3) { echo'Pendiente en desarrollo';  }
                                    if ($fila->ticket_status_id_t== 4) { echo'Resuelto';  }
                                    if ($fila->ticket_status_id_t== 5) { echo'Cerrado';  }
                                    echo '<form method="GET" action='.base_url().'admin/acceso/responder>';
                                    //echo '<input name="ID_ticket" type="hidden" value='.$fila->ID_ticket.'>';
                                    echo '<input name="pregunta" type="hidden" value='.$fila->ID_user_trouble.'>';
                                    echo '<input class="btn ver_ticket mt-2" type="submit" value="Ver">';
                                    echo '</form>';
                                    echo '</td>';
                                    /* esta parte queda pendiente para el sistema de tickets
                                    echo '<td class="align-top">'.$fila->ticket_priority_id_t.'</td>';
                                    */
                                    echo '<td class="align-top">'.$fila->area_name_au;
                                      
                                    echo '</td>';
                                    //esto es el modal
                                    
                                    echo '<td class="align-top">'.$fila->ID_ticket.'</td>';
                                    echo '</tr>';
                                } 
                              }
                                ?>                       
                        </tbody>        
                       </table>                  
                    </div>
                </div>
        </div>  
    </div>