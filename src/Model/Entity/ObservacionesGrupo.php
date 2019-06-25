<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ObservacionesGrupo Entity
 *
 * @property int $id
 * @property int $id_grupo
 * @property int $id_user
 * @property string $descripcion
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class ObservacionesGrupo extends Entity
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
        'id_grupo' => true,
        'id_user' => true,
        'descripcion' => true,
        'created' => true,
        'modified' => true
    ];
}
