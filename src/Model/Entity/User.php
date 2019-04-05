<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $materia
 * @property string $email
 * @property string $password
 * @property string $image
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $role_id
 * @property \App\Model\Entity\Role $role
 */
class User extends Entity
{

    protected $_accessible = [
        'name' => true,
        'surname' => true,
        'email' => true,
        'password' => true,
        'image' => true,
        'created' => true,
        'modified' => true,
        'role_id' => true,
        'id_centro' => true,
        'id_turno' => true
    ];

    protected $_hidden = [
        'password'
    ];
      protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
