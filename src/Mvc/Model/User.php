<?php

namespace DesignPatterns\Mvc\Model;

use DesignPatterns\Mvc\Model;

/**
 * @property string $nickname
 * @property string $desc
 * @property string $password
 */
class User extends Model
{
    public static $table = 'user';
}
