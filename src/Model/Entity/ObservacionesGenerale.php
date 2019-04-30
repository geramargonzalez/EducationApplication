<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ObservacionesGenerale Entity
 *
 * @property int $id
 * @property string $descripcion
 * @property int $id_user
 * @property int $id_centro
 * @property int $id_turno
 * @property \Cake\I18n\FrozenTime $created
 * @property string $modifed
 * @property bool $status
 */
class ObservacionesGenerale extends Entity
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
        'descripcion' => true,
        'id_user' => true,
        'id_centro' => true,
        'id_turno' => true,
        'created' => true,
        'modified' => true,
        'status' => true
    ];
}
