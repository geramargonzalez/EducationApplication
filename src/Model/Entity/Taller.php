<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Taller Entity
 *
 * @property int $id
 * @property string $name
 * @property int $id_profesor
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \App\Model\Entity\Alumno[] $alumnos
 */
class Taller extends Entity
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
        'name' => true,
        'role_id' => true,
        'id_user' => true,
        'id_centro' => true,
        'id_turno' => true,
        'created' => true,
        'modified' => true
    ];
}
 