

<div class="container-fluid fondo-usuarios pb-5">
    <div class="row">
        <div class="col-sm-11 col-md-9 col-lg-8 col-xl-7 mx-auto">
            <div class="well well-sm">
            <div class="text-center text-sm-right">
                
                  
            <div class="m-5" id="app2">
                <h1 class="naranja">Estadísticas Mesa de Ayuda</h1>                
                 <p class="verde_p">Resultados de los consultantes dividivo por sexo</p>   
                <grafica1 class="m5"  v-if="ChartConfig.labels.length" :bar-data="ChartConfig" :chart-options="options"></grafica1>
                <p class="verde_p">Resultados de consultas divididas por el estatus del ticket</p>
                <canvas class="m5" id="myChart" style="position: relative; height: 40vh; width: 80vw;"></canvas>
                <p class="verde_p">Relación de consultas divididas por edad</p>
                <canvas class="m5" id="myChart2" style="position: relative; height: 40vh; width: 80vw;"></canvas>
                <p class="verde_p">Relación de preguntas divididas por modalidad</p>
                <canvas class="m5" id="myChart3" style="position: relative; height: 40vh; width: 80vw;"></canvas>
                <p class="verde_p">Relación de preguntas divididas por tipo de consultante</p>
                <canvas class="m5" id="myChart4" style="position: relative; height: 40vh; width: 80vw;"></canvas>
                <p class="verde_p mt-5">Reporte de excel para todas las dudas con sus respectivas respuestas</p>
                <a class="btn btn-naranja  m-5" href="<?php echo base_url('admin/acceso/excel'); ?>" target="_blank" >Descargar excel</a>    
                <p class="btn btn-success" @click="generarpdf">PDF</p>

            </div>
    
            
            </div>
        </div>
    </div>
</div>
</div>
