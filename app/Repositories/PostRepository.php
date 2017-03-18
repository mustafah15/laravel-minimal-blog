<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/18/17
 * Time: 2:53 PM
 */

namespace App\Repositories;

use App\Post;

class PostRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new Post());
    }
}