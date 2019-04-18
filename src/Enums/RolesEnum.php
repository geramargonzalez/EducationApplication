<?php
namespace App\Enums;

class RolesEnum {

    const PROFESOR = 1;
    const PROFESOR_ADMIN = 3;
    const MATERIA = 4;
    const TALLER = 5;
    const EDUCADOR = 6;
    const DIRECCION = 7;
    

    public static function GetList() {
        return [
            Self::PROFESOR => __('Profesor'),
            Self::PROFESOR_ADMIN => __('Profesor_admin'),
            Self::MATERIA => __('Materia'),
            Self::TALLER => __('Taller'),
            Self::EDUCADOR => __('Educador'),
            Self::DIRECCION => __('Direccion')
        ];
    }

    public static function Get($id) {
        if (!empty(Self::GetList()[$id])) {
            return Self::GetList()[$id];
        }
        return null;
    }
}
