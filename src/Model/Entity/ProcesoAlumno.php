<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProcesoAlumno Entity
 *
 * @property int $id
 * @property int $id_alumno
 * @property int $conducta
 * @property int $rendimiento
 * @property int $expresion_oral
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class ProcesoAlumno extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id_alumno' => true,
        'conducta' => true,
        'rendimiento' => true,
        'expresion_oral' => true,
        'created' => true,
        'modified' => true,
        'promedio' => true
    ];
}
