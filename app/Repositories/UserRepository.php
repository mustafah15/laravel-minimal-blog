<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/18/17
 * Time: 2:41 PM
 */

namespace App\Repositories;

use App\User;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new User());
    }
}
