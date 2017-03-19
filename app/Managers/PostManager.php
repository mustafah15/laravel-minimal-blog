<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/19/17
 * Time: 10:51 PM
 */

namespace App\Managers;

use App\Repositories\PostRepository;
use League\Fractal\Manager;

class PostManager extends Manager
{
    protected $postRepository ;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
    }

}