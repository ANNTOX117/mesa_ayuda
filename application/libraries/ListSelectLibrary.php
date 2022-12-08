<?php

class ListSelectLibrary {
    public function sex_select()
    {
        $data = array(
            ''      => 'Selecciona tu sexo',
            '1'     => 'Hombre',
            '2'     => 'Mujer'
        );

        return $data;
    }

    public function user_type_select()
    {
        $data = array(
            ''      => 'Selecciona que tipo de usuario eres',
            '1'      => 'Estudiante',
            '2'      => 'Docente',
            '3'      => 'Administrativo',
            '4'      => 'Externo',
            '5'      => 'Aspirante'
        );
        return $data;
    }
}