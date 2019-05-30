<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ObservacionesInforme Entity
 *
 * @property int $id
 * @property int $id_informe
 * @property string $titulo
 * @property string $descripcion
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class ObservacionesInforme extends Entity
{

    protected $_accessible = [
        'id_informe' => true,
        'id_alumno' => true,
        'descripcion' => true,
        'titulo' => true,
        'created' => true,
        'modified' => true
    ];

    
}
