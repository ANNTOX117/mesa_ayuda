Vue.component('grupo1',{
    template: 
    `
    <div class="">
    
        <article>   

            <div class="d-flex mb-2 rounded btn-faqs-contorno">
                <p class="btn btn-link text-white d-flex" @click="activar_preguntas"><span class="align-self-center">+</span></p>
                <p class="alert m-0 align-self-center" @click="activar_preguntas" v-html="nombre" role="alert"> </p>
            </div>
            
            <div v-show="preguntas_show==='si'">

                <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3"  @click="desactivar_preguntas">Ocultar</span>
                <section v-show="mostrar==='si'" v-for="(item, index) in preguntas">
            
                    <div class="d-flex mb-2 rounded">
                        <p class="btn btn-link text-white d-flex" @click="item.active='si'"><span class="align-self-center">+</span></p>
                        <p class="alert m-0 align-self-center" v-html="(index+1) + '.-' + item.pregunta" role="alert"> </p>
                    </div>
            
                    <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3" v-show="item.active==='si'" @click="item.active='no'">Ocultar</span>
                    <p v-show="item.active==='si'" v-html="item.respuesta" class="p-4"></p>
            
                </section>

            </div>

        </article>
        
    </div>
    
    `,
    data(){
        return{
            nombre:'Información  general',
            mostrar:'si',
            preguntas_show:'no',
            preguntas:[
                {active:'no', pregunta: '¿Cuándo podré consultar la siguiente convocatoria?<br>¿Qué debo hacer para ingresar al IRC?',respuesta:'Apreciable  visitante, agradecemos el interés por ingresar al Instituto de Estudios Superiores de la Ciudad de México Rosario Castellanos, le invitamos a que se mantenga atento a la publicación de la siguiente convocatoria y realizar el proceso correspondiente. La convocatoria será publicada en nuestro <a target="_blank" href="https://www.rcastellanos.cdmx.gob.mx/">portal</a><br>Saludos cordiales.' },
                {active:'no', pregunta: 'Me interesa colaborar como docente en línea.',respuesta:'Apreciable candidato a docente en línea:<br>Le informamos que el proceso para realizar actividades profesionales de docencia, atiende al requerimiento interno de este instituto. El cual basa su invitación a perfiles profesionales con experiencia comprobable en la modalidad de al menos 3 años. Le sugerimos revisar nuestro portal constantemente<br> <a target="_blank" href="https://www.rcastellanos.cdmx.gob.mx/">portal</a><br>Saludos cordiales.' },
                {active:'no', pregunta: '¿El IRC cuenta con una biblioteca?',respuesta:'El IRC cuenta con un repositorio bibliotecario en la liga siguiente: </br> <a target="_blank" href="https://rcastellanos.cdmx.gob.mx/acervos-bibliotecarios?fbclid=IwAR24eO2mBj9SXVVUP5Xnbiy-gRxs52hOkSzw8QCKfYvFVxZotSVAvYAc_yw">https://rcastellanos.cdmx.gob.mx/acervos-bibliotecarios?fbclid=IwAR24eO2mBj9SXVVUP5Xnbiy-gRxs52hOkSzw8QCKfYvFVxZotSVAvYAc_yw</a><br>' },
                {active:'no', pregunta: '¿Cuál es el proceso para llevar a cabo visitas guiadas o prácticas de campo?',respuesta:'El docente encargado de la asignatura deberá realizar una solicitud formal a la Dirección Ejecutiva de Campus, para llevar a cabo la visita guiada o práctica de campo necesaria para ampliar y consolidar los conocimientos de la asignatura.' },
                {active:'no', pregunta: '¿Dónde y cómo puedo solicitar la apertura de un taller, coloquio, mesa redonda o cualquier otra actividad de carácter cultural, artístico o de integración institucional?',respuesta:'Cualquier integrante de la comunidad educativa puede hacer una propuesta para realizar alguna actividad de carácter cultural, artístico o de integración institucional, la cual deberá contener:<p class="ml-2"> 1. Nombre completo del solicitante;</br> 2. Carrera de adscripción (en caso de estudiantes y docentes) o área de adscripción (personal administrativo);</br> 3. Nombre y currículum de los ponentes que participarán en la actividad;</br> 4. Descripción de la actividad a realizar, donde se incluya:</p> <p class="ml-5">a. Nombre de la actividad;</br> b. Duración de la actividad;</br>c.Propuesta de espacio para llevar a cabo la actividad;</br> d. Insumos necesarios para llevar a cabo la actividad.</p>' },
            ]
        }
    },
    methods:{
        activar: function(){
            this.mostrar='si'
            
        },
        desactivar: function(){
            this.mostrar=''
        },
        activar_preguntas: function(){
            
            this.preguntas_show='si'
        },
        desactivar_preguntas: function(){
            
            this.preguntas_show='no'
        },
    }
});

Vue.component('grupo2',{
    template: 
    `
    <div>
    <article >   
    <div class="d-flex mb-2 rounded btn-faqs-contorno">
        <p class="btn btn-link text-white d-flex" @click="activar_preguntas"><span class="align-self-center">+</span></p>
        <p class="alert m-0 align-self-center" @click="activar_preguntas" v-html="nombre" role="alert"> </p>
    </div>
    <div v-show="preguntas_show==='si'">
    <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3"  @click="desactivar_preguntas">Ocultar</span>
    <section v-show="mostrar==='si'" v-for="(item, index) in preguntas">
            <div class="d-flex mb-2 rounded">
                <p class="btn btn-link text-white d-flex" @click="item.active='si'"><span class="align-self-center">+</span></p>
                <p class="alert m-0 align-self-center" v-html="(index+1) + '.-' + item.pregunta" role="alert"> </p>
            </div>
            <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3" v-show="item.active==='si'" @click="item.active='no'">Ocultar</span>
            <p v-show="item.active==='si'" v-html="item.respuesta" class="p-4"></p>
            
            </section>
        </div>
        </article>
        </div>
    
    `,
    data(){
        return{
            nombre:'Programa de Ingreso al Instituo Rosario Castellanos (PIIRC)',
            mostrar:'si',
            preguntas_show:'no',
            preguntas:[
                {active:'no', pregunta: '¿Cómo ingreso a la plataforma del PIIRC?',respuesta:'Estimado aspirante.<br>Para poder ingresar a la plataforma abra la siguiente liga: (insertar liga)<br>Requiere escribir el número del Folio y la contraseña (fecha de nacimiento con el formato aaammdd).'},
                {active:'no', pregunta: 'Al intentar ingresar a la plataforma del PIIRC, marca que mis datos son erróneos.',respuesta:'Apreciable aspirante para dar seguimiento a la solicitud, es importante que envíe un mensaje por medio de la Mesa de ayuda con los siguientes datos: <ul><li>Nombre completo</li><li>CURP</li><li>Folio</li><li>Grupo</li><li>Captura de pantalla donde se aprecia lo que nos describe</li></ul><br>Saludos cordiales.' },
                {active:'no', pregunta: 'No puedo aceptar el código de ética ¿Qué hago?',respuesta:'Apreciable aspirante para dar seguimiento a la solicitud es importante que envíe un mensaje por medio de la Mesa de ayuda con los siguientes datos: <ul><li>Nombre completo</li><li>CURP</li><li>Folio</li><li>Grupo</li><li>Captura de pantalla donde se aprecie lo que describe</li></ul><br>Saludos cordiales.' },
                {active:'no', pregunta: '¿Cómo recupero mi folio?',respuesta:'Apreciable aspirante:<br>Para recuperar su folio ingrese a la siguiente liga: <a target="_blank" href="http://app.rcastellanos.cdmx.gob.mx/piirc/">http://app.rcastellanos.cdmx.gob.mx/piirc/</a><br>Le sugerimos guardarlo o anotarlo en un lugar seguro, considere que se trata de un dato personal.<br>Saludos cordiales.' },
                {active:'no', pregunta: '¿Me pueden ayudar a cambiar mis datos en la plataforma de PIIRC?',respuesta:'Apreciable aspirante:<br>Los datos que aparecen en la plataforma son los que se registraron en la convocatoria, mismos que se pasan a PIIRC, si alguno de ellos se encuentran con algun error en su captura, no hay ningún problema ya que, una vez concluya satisfactoriamente todas las actividades del PIIRC, continua el proceso de inscripcíon y con los documentos oficiales se asentarán los datos.<br> ¡Éxito!' },
                {active:'no', pregunta: '¿Cuál es el puntaje para aprobar el PIIRC?',respuesta:'Apreciable aspirante:<br>De acuerdo a la convocatoria para que logre ingresar al IRC es necesario entregar en tiempo y forma todas y cada una de las actividades previstas en cada módulo, así como cumplir con los criterios de entrega que se solicitan en ellas.<br>Saludos cordiales.' },
                {active:'no', pregunta: '¿Por qué no puedo ingresar al modulo de PIIRC?',respuesta:'Apreciable aspirante para dar seguimiento a la solicitud es importante que envíe un mensaje por medio de la Mesa de ayuda con los siguientes datos:<br> <ul><li>Nombre completo</li><li>CURP</li><li>Folio</li><li>Captura de pantalla donde se aprecie lo que describe<br>Saludos cordiales.</li>' },
                {active:'no', pregunta: 'Ya finalicé el PIIRC, ¿Cuándo podré revisar los resultados?',respuesta:'Apreciable aspirante:<br>Los resultados serán publicados en la fecha mencionada en la  la convocatoria: liga de la convocatoria.<br>Es importante revisar en la fecha indicada, los anuncios publicados en el banner del sitio web del instituto:<br><a href="https://www.rcastellanos.cdmx.gob.mx/">https://www.rcastellanos.cdmx.gob.mx/</a><br>Saludos cordiales.' }, 

            ]
        }
    },
    methods:{
        activar: function(){
            this.mostrar='si'
            
        },
        desactivar: function(){
            this.mostrar=''
        },
        activar_preguntas: function(){
            
            this.preguntas_show='si'
        },
        desactivar_preguntas: function(){
            
            this.preguntas_show='no'
        },
    }
});

Vue.component('grupo3',{
    template: 
    `
    <div>
    <article >   
    <div class="d-flex mb-2 rounded btn-faqs-contorno">
        <p class="btn btn-link text-white d-flex" @click="activar_preguntas"><span class="align-self-center">+</span></p>
        <p class="alert m-0 align-self-center" @click="activar_preguntas" v-html="nombre" role="alert"> </p>
    </div>
    <div v-show="preguntas_show==='si'">
    <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3"  @click="desactivar_preguntas">Ocultar</span>
    <section v-show="mostrar==='si'" v-for="(item, index) in preguntas">
            <div class="d-flex mb-2 rounded">
                <p class="btn btn-link text-white d-flex" @click="item.active='si'"><span class="align-self-center">+</span></p>
                <p class="alert m-0 align-self-center" v-html="(index+1) + '.-' + item.pregunta" role="alert"> </p>
            </div>
            <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3" v-show="item.active==='si'" @click="item.active='no'">Ocultar</span>
            <p v-show="item.active==='si'" v-html="item.respuesta" class="p-4"></p>
            
            </section>
        </div>
        </article>
        </div>
    
    `,
    data(){
        return{
            nombre:'Inscripciones',
            mostrar:'si',
            preguntas_show:'no',
            preguntas:[
                {active:'no', pregunta: 'Si aparezco en la lista de resultados, ¿qué debo hacer para inscribirme?',respuesta:'Apreciable estudiante:<br>Le invitamos a mantenerse atento a la información que será publicada en nuestro portal:<a target="_blank" href="https://www.rcastellanos.cdmx.gob.mx/">https://www.rcastellanos.cdmx.gob.mx/</a><br>O bien escriba a:<br>dasuntosestudiantiles.irc@gmail.com<br>Saludos cordiales.' },
                {active:'no', pregunta: '¿Qué puedo hacer si se me pasó la fecha de inscripción?',respuesta:'Apreciable estudiante:<br> Los resultados fueron publicados en el sitio web del Instituto a partir en la fecha señalada en la convocatoria, si su folio aparece en la lista de resultados, es importante se presente en la unidad académica que seleccionó  a la brevedad con su documentación completa para realizar el trámite de inscripción:<ul><li>Certificado de bachillerato original.</li><li>Clave Única de Registro de Población (CURP).</li><li>Copia de la credencial del INE por ambos lados.</li><li>Acta de nacimiento original.</li><li>Copia del comprobante de domicilio de la CDMX o Zona Metropolitana (máximo tres meses de antigüedad).</li><li>Dos fotografías de frente en fondo blanco tamaño infantil.</li><li>Ficha técnica llenada en computadora <a target="_blank" href="https://www.rcastellanos.cdmx.gob.mx/storage/app/media/ficha_tecnica_alum.pdf">https://www.rcastellanos.cdmx.gob.mx/storage/app/media/ficha_tecnica_alum.pdf</a></li>Saludos cordiales.</ul>' },
            ]
        }
    },
    methods:{
        activar: function(){
            this.mostrar='si'
            
        },
        desactivar: function(){
            this.mostrar=''

        },
        activar_preguntas: function(){
            
            this.preguntas_show='si'
        },
        desactivar_preguntas: function(){
            
            this.preguntas_show='no'
        },
    }
});

Vue.component('grupo4',{
    template: 
    `
    <div>
    <article >   
    <div class="d-flex mb-2 rounded btn-faqs-contorno">
        <p class="btn btn-link text-white d-flex" @click="activar_preguntas"><span class="align-self-center">+</span></p>
        <p class="alert m-0 align-self-center" @click="activar_preguntas" v-html="nombre" role="alert"> </p>
    </div>
    <div v-show="preguntas_show==='si'">
    <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3"  @click="desactivar_preguntas">Ocultar</span>
    <section v-show="mostrar==='si'" v-for="(item, index) in preguntas">
            <div class="d-flex mb-2 rounded">
                <p class="btn btn-link text-white d-flex" @click="item.active='si'"><span class="align-self-center">+</span></p>
                <p class="alert m-0 align-self-center" v-html="(index+1) + '.-' + item.pregunta" role="alert"> </p>
            </div>
            <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3" v-show="item.active==='si'" @click="item.active='no'">Ocultar</span>
            <p v-show="item.active==='si'" v-html="item.respuesta" class="p-4"></p>
            
            </section>
        </div>
        </article>
        </div>
    
    `,
    data(){
        return{
            nombre:'Reinscripciones',
            mostrar:'si',
            preguntas_show:'no',
            preguntas:[
                {active:'no', pregunta: '¿Cuándo y cómo debo reinscribirme?',respuesta:'Apreciable estudiante, consulte la información en nuestro portal:<br><a href=https://www.rcastellanos.cdmx.gob.mx/ target="_blank">https://www.rcastellanos.cdmx.gob.mx/</a><br>O bien escribe a:<br>dasuntosestudiantiles.irc@gmail.com<br>Le invitamos a mantenerse atento a la información que será publicada para realizar el trámite.<br>Saludos cordiales.' },
                {active:'no', pregunta: '¿Dónde tengo que hacer mi  reinscripción a las licenciaturas a distancia?',respuesta:'Apreciable estudiante:<br>La información aparece en el portal institucional, donde encontrará las fechas, trámites y documentación necesaria.<br> <a target="_blank" href=https://www.rcastellanos.cdmx.gob.mx/ target="_blank">https://www.rcastellanos.cdmx.gob.mx/</a>Saludos cordiales.' },
                {active:'no', pregunta: 'Se pasaron las fechas, ¿qué puedo hacer?',respuesta:'Apreciable estudiante:<br>La dirección encargada de estos trámites es la de asuntos estudiantiles, por lo cual es necesario que se ponga en contacto con esta instancia, a través  del siguiente correo electrónico:<br>dasuntosestudiantiles.irc@gmail.com<br>Es importante incluir su nombre completo, modalidad, carrera, semestre, CURP y folio.<br>Saludos cordiales.' },

            ]
        }
    },
    methods:{
        activar: function(){
            this.mostrar='si'
            
        },
        desactivar: function(){
            this.mostrar=''
        },
        activar_preguntas: function(){
            
            this.preguntas_show='si'
        },
        desactivar_preguntas: function(){
            
            this.preguntas_show='no'
        },
    }
});

Vue.component('grupo5',{
    template: 
    `
    <div>
    <article >   
    <div class="d-flex mb-2 rounded btn-faqs-contorno">
        <p class="btn btn-link text-white d-flex" @click="activar_preguntas"><span class="align-self-center">+</span></p>
        <p class="alert m-0 align-self-center" @click="activar_preguntas" v-html="nombre" role="alert"> </p>
    </div>
    <div v-show="preguntas_show==='si'">
    <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3"  @click="desactivar_preguntas">Ocultar</span>
    <section v-show="mostrar==='si'" v-for="(item, index) in preguntas">
            <div class="d-flex mb-2 rounded">
                <p class="btn btn-link text-white d-flex" @click="item.active='si'"><span class="align-self-center">+</span></p>
                <p class="alert m-0 align-self-center" v-html="(index+1) + '.-' + item.pregunta" role="alert"> </p>
            </div>
            <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3" v-show="item.active==='si'" @click="item.active='no'">Ocultar</span>
            <p v-show="item.active==='si'" v-html="item.respuesta" class="p-4"></p>
            
            </section>
        </div>
        </article>
        </div>
    
    `,
    data(){
        return{
            nombre:'Licenciaturas a distancia (Estudiantes y Docentes)',
            mostrar:'si',
            preguntas_show:'no',
            preguntas:[
                {active:'no', pregunta: '¿Cómo puedo ingresar al aula virtual?',respuesta:'Apreciable estudiante:<br>Los datos de ingreso al aula son su Usuario (en minúsculas) y Contraseña (su fecha de nacimiento con el formato ddmmaaaa ejemplo 15101985).<br>La URL del aula es: http://189.240.71.202/cvirtual/<br>Saludos cordiales.' },
                {active:'no', pregunta: 'Marca error cuando ingreso mis datos de acceso.',respuesta:'Apreciable estudiante: <br>En caso de tener problemas con sus datos de acceso deberá enviar correo a la siguiente dirección:<br>lad@educacion.cdmx.gob.mx<br>Es importante incluir su nombre completo, modalidad, carrera, semestre, CURP y folio.<br>Saludos cordiales.' },
                {active:'no', pregunta: 'Tengo problemas con mis actividades (foros y espacios de tareas, exámenes).',respuesta:'Apreciable estudiante<br>Para dar seguimiento a su solicitud, por favor envie al correo electrónico lad@educacion.cdmx.gob.mx la siguiente información:<ul><li>Nombre completo</li><li>Semestre (recursa o no recursa)</li><li>Grupo</li><li>Carrera</li><li>Folio</li><li>Captura de pantalla en la que se observe lo que reporta.</li></ul><br>Saludos cordiales' },
                {active:'no', pregunta: 'Mi nombre tiene un error en plataforma.',respuesta:'Apreciable estudiante:<br>Para modificar en plataforma su nombre debe enviar la imagen de su identificación oficial al correo electrónico lad@educacion.cdmx.gob.mx  para realizar el ajuste.<br>Es importante mencionar su nombre completo, carrera y semestre<br>Saludos cordiales' },
                {active:'no', pregunta: 'Tengo problemas para evaluar a mis estudiantes o habilitar los foros.',respuesta:'Apreciable docente:<br>Para dar seguimiento la solicitud, por favor envíe al correo electrónico lad@educacion.cdmx.gob.mx la siguiente información:<ul><li>Nombre completo</li><li>Carrera y Semestre en el que colabora</li><li>Nombre de la asignatura</li><li>Captura de pantalla en la que se observe lo que reporta.</li><br>Saludos cordiales' },
                {active:'no', pregunta: 'Me retrase con mis actividades, ¿qué puedo hacer?',respuesta:'Apreciable estudiante:<br>Las actividades se habilitan conforme al calendario que aparece en el aula virtual y cerrarán el día que concluye el bloque, por lo cual le invitamos a ponerse en contacto con su docente en línea para generar estrategias que le permitan concluir exitosamente el módulo.<br>Saludos cordiales' },
                {active:'no', pregunta: '¿Cómo registro mis exámenes extraordinarios?',respuesta:'Apreciable estudiante:<br>La información la encontrará en el portal institucional, aparecerán las fechas y el proceso de registro de exámenes extraordinarios.<br> <a target="_blank" href="https://www.rcastellanos.cdmx.gob.mx/"> https://www.rcastellanos.cdmx.gob.mx/ </a><br>Saludos cordiales.' },
                {active:'no', pregunta: 'Se pasaron las fechas de registro de extraordinarios, ¿ahora qué hago?',respuesta:'Apreciable estudiante:<br>Deberá esperar al siguiente periodo de registro de exámenes extraordinarios<br>Saludos cordiales' },


            ]
        }
    },
    methods:{
        activar: function(){
            this.mostrar='si'
            
        },
        desactivar: function(){
            this.mostrar=''
        },
        activar_preguntas: function(){
           
            this.preguntas_show='si'
        },
        desactivar_preguntas: function(){
           
            this.preguntas_show='no'
        },
    }
});

Vue.component('grupo6',{
    template: 
    `
    <div>
    <article >   
    <div class="d-flex mb-2 rounded btn-faqs-contorno">
        <p class="btn btn-link text-white d-flex" @click="activar_preguntas"><span class="align-self-center">+</span></p>
        <p class="alert m-0 align-self-center" @click="activar_preguntas" v-html="nombre" role="alert"> </p>
    </div>
    <div v-show="preguntas_show==='si'">
    <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3"  @click="desactivar_preguntas">Ocultar</span>
    <section v-show="mostrar==='si'" v-for="(item, index) in preguntas">
            <div class="d-flex mb-2 rounded">
                <p class="btn btn-link text-white d-flex" @click="item.active='si'"><span class="align-self-center">+</span></p>
                <p class="alert m-0 align-self-center" v-html="(index+1) + '.-' + item.pregunta" role="alert"> </p>
            </div>
            <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3" v-show="item.active==='si'" @click="item.active='no'">Ocultar</span>
            <p v-show="item.active==='si'" v-html="item.respuesta" class="p-4"></p>
            
            </section>
        </div>
        </article>
        </div>
    
    `,
    data(){
        return{
            nombre:'Asuntos estudiantiles',
            mostrar:'si',
            preguntas_show:'no',
            preguntas:[
                {active:'no', pregunta: '¿En dónde y cuándo serán las clases de recuperación?',respuesta:'Apreciable estudiante:<br>En el portal del instituto le invitamos a consultar  el banner con información sobre el programa de recuperación y el calendario de exámenes extraordinarios.<br><a target="_blank" href="https://www.rcastellanos.cdmx.gob.mx/"> https://www.rcastellanos.cdmx.gob.mx/ </a><br>Saludos cordiales.' },
                {active:'no', pregunta: '¿Dónde puedo consultar los resultados de los exámenes extraordinarios?',respuesta:'Apreciable estudiante:<br>Le sugerimos acercarse a ventanilla de Asuntos Estudiantiles en la Unidad Académica correspondiente.<br>Saludos cordiales' },
                {active:'no', pregunta: '¿Qué debo hacer para tramitar el IMSS?',respuesta:'Apreciable estudiante:<br>En nuestro portal podrá localizar la información para realizar su alta ante el IMSS<br>https://www.rcastellanos.cdmx.gob.mx/<br>Le invitamos a leer detenidamente el <a href="https://www.rcastellanos.cdmx.gob.mx/storage/app/media/presentacion_pow_seguro.pdf" target="_blank">documento</a><br>Si tiene alguna duda es importante ponerse en contacto con la dirección de asuntos estudiantiles mediante el siguiente correo electrónico: dasuntosestudiantiles.irc@gmail.com<br>Saludos cordiales.' },
            ]
        }
    },
    methods:{
        activar: function(){
            this.mostrar='si'
            
        },
        desactivar: function(){
            this.mostrar=''
        },
        activar_preguntas: function(){
            
            this.preguntas_show='si'
        },
        desactivar_preguntas: function(){
            
            this.preguntas_show='no'
        },
    }
});

Vue.component('grupo7',{
    template: 
    `
    <div>
    <article >   
    <div class="d-flex mb-2 rounded btn-faqs-contorno">
        <p class="btn btn-link text-white d-flex" @click="activar_preguntas"><span class="align-self-center">+</span></p>
        <p class="alert m-0 align-self-center" @click="activar_preguntas" v-html="nombre" role="alert"> </p>
    </div>
    <div v-show="preguntas_show==='si'">
    <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3"  @click="desactivar_preguntas">Ocultar</span>
    <section v-show="mostrar==='si'" v-for="(item, index) in preguntas">
            <div class="d-flex mb-2 rounded">
                <p class="btn btn-link text-white d-flex" @click="item.active='si'"><span class="align-self-center">+</span></p>
                <p class="alert m-0 align-self-center" v-html="(index+1) + '.-' + item.pregunta" role="alert"> </p>
            </div>
            <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3" v-show="item.active==='si'" @click="item.active='no'">Ocultar</span>
            <p v-show="item.active==='si'" v-html="item.respuesta" class="p-4"></p>
            
            </section>
        </div>
        </article>
        </div>
    
    `,
    data(){
        return{
            nombre:'Prácticas profesionales',
            mostrar:'si',
            preguntas_show:'no',
            preguntas:[
                {active:'no', pregunta: '¿Qué son las prácticas profesionales?',respuesta:'Son un conjunto de actividades de carácter temporal, que vinculan el aprendizaje en el aula y el entrenamiento laboral. Estas actividades son realizadas por los estudiantes, antes de su incursión formal en el trabajo.' },
                {active:'no', pregunta: '¿En qué momento puedo realizar mis prácticas profesionales?',respuesta:'El componente dual del modelo educativo del IRC implica la transferencia directa del aprendizaje de escenarios académicos a escenarios profesionalizantes. Cuando el estudiante cumpla con el 70% de los créditos totales de su licenciatura, pondrá en práctica los conocimientos teóricos, habilidades y destrezas adquiridas en alguna institución u organismo público, del sector social o privado con el que el Instituto tenga convenio.Apreciable estudiante:<br>Le sugerimos acercarse a ventanilla de Asuntos Estudiantiles en la Unidad Académica correspondiente.<br>Saludos cordiales' },
                {active:'no', pregunta: '¿Cuánto duran las prácticas profesionales?',respuesta:'Las prácticas profesionales tienen una duración de 480 horas en un periodo de 6 meses.' },
            ]
        }
    },
    methods:{
        activar: function(){
            this.mostrar='si'
            
        },
        desactivar: function(){
            this.mostrar=''
        },
        activar_preguntas: function(){
            
            this.preguntas_show='si'
        },
        desactivar_preguntas: function(){
            
            this.preguntas_show='no'
        },
    }
});

Vue.component('grupo8',{
    template: 
    `
    <div>
    <article >   
    <div class="d-flex mb-2 rounded btn-faqs-contorno">
        <p class="btn btn-link text-white d-flex" @click="activar_preguntas"><span class="align-self-center">+</span></p>
        <p class="alert m-0 align-self-center" @click="activar_preguntas" v-html="nombre" role="alert"> </p>
    </div>
    <div v-show="preguntas_show==='si'">
    <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3"  @click="desactivar_preguntas">Ocultar</span>
    <section v-show="mostrar==='si'" v-for="(item, index) in preguntas">
            <div class="d-flex mb-2 rounded">
                <p class="btn btn-link text-white d-flex" @click="item.active='si'"><span class="align-self-center">+</span></p>
                <p class="alert m-0 align-self-center" v-html="(index+1) + '.-' + item.pregunta" role="alert"> </p>
            </div>
            <span class="btn mt-2 ocultar rounded-0 pt-3 pb-3" v-show="item.active==='si'" @click="item.active='no'">Ocultar</span>
            <p v-show="item.active==='si'" v-html="item.respuesta" class="p-4"></p>
            
            </section>
        </div>
        </article>
        </div>
    
    `,
    data(){
        return{
            nombre:'Servicio social',
            mostrar:'si',
            preguntas_show:'no',
            preguntas:[
                {active:'no', pregunta: '¿Qué es el Servicio social?',respuesta:'Se entiende por servicio social aquellas actividades de carácter obligatorio y temporal que realizan los estudiantes del IRC de acuerdo con la naturaleza de su profesión en beneficio de la sociedad, sus clases más desprotegidas y el Estado; actividad por la que podrá en casos excepcionales obtener alguna retribución. El Servicio Social podrá ser de carácter unidisciplinario, interdisciplinario o multidisciplinario.' },
                {active:'no', pregunta: '¿Dónde puedo desarrollar mi servicio social?',respuesta:'En instituciones del sector social, público o privado que tengan previamente registrado y avalado el programa de Servicio Social por el IRC.' },
                {active:'no', pregunta: '¿Cuánto tiempo dura el Servicio social?',respuesta:'El número de horas que se deberán cubrir se especifica en el programa del Servicio Social. La duración de las actividades para acreditar el Servicio Social no podrá ser menor de 480 (cuatrocientos ochenta horas).' },
                {active:'no', pregunta: '¿Qué necesito para realizar mi Servicio Social?',respuesta:'I. Cumplir con al menos el 70% de los créditos académicos previstos en el Plan de Estudios correspondiente;</br> II. Encontrarse en situación escolar regular;</br> III. Elaborar una solicitud que contenga datos generales, nombre del programa de Servicio Social en el que participará y una carta donde explique la forma en la que el programa de Servicio Social se vincula con la carrera que estudió.' },
                {active:'no', pregunta: '¿Con quién tiene convenios el IRC?',respuesta:'Estas son algunas instituciones con las que tenemos convenio de colaboración: Red ECOS de la CDMX, con algunas las alcaldías (Azcapotzalco y Magdalena Contreras), Universidad Pedagógica Nacional (UPN), Unión de Universidades deAmérica Latinay el Caribe (UDUAL), Instituto Local de la Infraestructura Física Educativa de la Ciudad de México (ILIFECDMX), Secretaría de Pueblos y Barrios Originarios y Comunidades Indígenas Residentes (SEPI), Instituto del Deporte de la Ciudad de México (INDEPORTE), Universidad Autónoma de la Ciudad de México (UACM), Foro Consultivo de Ciencia y Tecnología, y se seguirán sumando organismos del sector público, privado y gubernamental.' },
            ]
        }
    },
    methods:{
        activar: function(){
            this.mostrar='si'
            
        },
        desactivar: function(){
            this.mostrar=''
        },
        activar_preguntas: function(){
            
            this.preguntas_show='si'
        },
        desactivar_preguntas: function(){
            
            this.preguntas_show='no'
        },
    }
});

let vm=new Vue({
    el:'#faqs',
    data(){
        return{
            faqs: 'false',
            
            
          mostrar:'no',
          
        }
    },
    methods:{
        activar: function(){
            this.mostrar='si'
            
        },
        desactivar: function(){
            this.mostrar=''
        },
        activar_faqs: function(){
            this.faqs='true'
        },
        desactivar_faqs: function(){
            this.faqs='false'
        },
        
        
    },
    
        
    }
)
