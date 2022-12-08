<div id="sideNavigation" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="<?php echo base_url();?>areas/principal">Todas las Dudas</a>  
  
  <a href="#">Tikets</a>
  <ul>
    <a href="<?php echo base_url();?>areas/principal/ticket_abierto"><li>Abiertos <?php if(isset($abiertos)) { echo '('.$abiertos.')'; } ?></li></a>
    <a href="<?php echo base_url();?>areas/principal/ticket_asignado"><li>Asignados <?php if(isset($asignados)) { echo '('.$asignados.')'; } ?> </li></a> 
    <a href="<?php echo base_url();?>areas/principal/ticket_pendiente"><li>Pendientes <?php if(isset($pendientes)) { echo '('.$pendientes.')'; } ?></li></a>
    <a href="<?php echo base_url();?>areas/principal/ticket_resuelto"><li>Resueltos <?php if(isset($resueltos)) { echo '('.$resueltos.')'; } ?></li></a>
    <a href="<?php echo base_url();?>areas/principal/ticket_cerrado"><li>Cerrados <?php if(isset($cerrados)) { echo '('.$cerrados.')'; } ?></li></a>
  </ul>

  <a href="<?php echo base_url();?>areas/principal/logout">Cerrar Sesión</a>
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
<div class="container mt-5">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>                               
                                <th>Duda</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php 
                                if(isset($dudas)){
                                foreach ($dudas as  $fila) {
                                    if($fila->type_user_id_uwt==1){$user='Estudiante';}
                                    if($fila->type_user_id_uwt==2){$user='Docente';}
                                    if($fila->type_user_id_uwt==3){$user='Administrativo';}
                                    if($fila->type_user_id_uwt==4){$user='Externo';}
                                    if($fila->type_user_id_uwt==5){$user='Aspirante';}
                                    echo '<tr>';
                                    echo '<td>'.$fila->date_created_uwt.'</td>';
                                    echo '<td>'.$fila->trouble_content_tr.'</td>';
                                    echo '<td>'.'<span class="text-capitalize">'.$fila->name_user_uwt.' '.$fila->surname_user_uwt.' '.$fila->second_surname_user_uwt.'</span></td>';
                                    echo '<td>'.$fila->email_uwt.'</td>';
                                    echo '<td>'.$user.'</td>';
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