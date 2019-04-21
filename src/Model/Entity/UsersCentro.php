<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersCentro Entity
 *
 * @property int $id
 * @property int $id_centro
 * @property int $id_user
 */
class UsersCentro extends Entity
{
    protected $_accessible = [
        'id_centro' => true,
        'id_user' => true,
        'id_turno' => true
    ];
}
