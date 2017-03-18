<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/18/17
 * Time: 2:51 PM
 */

namespace App\Repositories;

use App\Category;

class CategoryRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new Category());
    }
}