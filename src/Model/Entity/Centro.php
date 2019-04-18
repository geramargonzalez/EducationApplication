<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Centro Entity
 *
 * @property int $id
 * @property string $name
 * @property string $direccion
 * @property string $tel
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $created
 */
class Centro extends Entity
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
        'direccion' => true,
        'tel' => true,
        'id_subsistema' => true,
        'modified' => true,
        'created' => true
    ];
}
