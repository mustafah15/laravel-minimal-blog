<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/18/17
 * Time: 2:53 PM
 */

namespace App\Repositories;

use App\Post;
use App\Traits\Paginatable;

class PostRepository extends BaseRepository
{
    use Paginatable;
    /**
     * PostRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(new Post());
    }

    /**
     * return posts with user relations
     * @return mixed
     */
    public function getPostsFullData()
    {
        return $this->model->with('user')
            ->with('comments')
            ->with('category')
            ->get();
    }

    /**
     * return single post with user relation by post_id
     * @param $postId
     * @return mixed
     */
    public function getPostWithUserById($postId)
    {
        return $this->model
            ->with('user')
            ->with('category')
            ->where('id', $postId)
            ->get();
    }

}
