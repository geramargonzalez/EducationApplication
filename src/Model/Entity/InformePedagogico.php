<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InformePedagogico Entity
 *
 * @property int $id
 * @property string $titulo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class InformePedagogico extends Entity
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
        'titulo' => true,
        'cantEvidencias' => true,
        'id_centro' => true,
        'id_turno' => true,
        'created' => true,
        'status' => true,
        'modified' => true
    ];
}
