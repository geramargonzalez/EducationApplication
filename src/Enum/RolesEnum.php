<?php
namespace App\Enum;

class RolesEnum {

    const PROFESOR = 1;
    const USER = 2;

    public static function GetList() {
        return [
            Self::PROFESOR => __('Profesor'),
            Self::PROFESOR_ADMIN => __('Profesor_admin'),
        ];
    }

    public static function Get($id) {
        if (!empty(Self::GetList()[$id])) {
            return Self::GetList()[$id];
        }
        return null;
    }
}
