<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EvidenciasResultado Entity
 *
 * @property int $id
 * @property int $id_evidencia
 * @property string $descripcion
 * @property bool $status
 */
class EvidenciasResultado extends Entity
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
        'id_evidencia' => true,
        'descripcion' => true,
        'status' => true
    ];
}
