<?php

namespace App\Managers;

use App\Repositories\PostRepository;

class PostManager extends BaseManager
{
    protected $postRepository ;

    /**
     * PostManager constructor.
     */
    public function __construct()
    {
        $this->postRepository = new PostRepository();
    }

    /**
     *
     */
    public function getAllPosts()
    {
       $posts =  $this->postRepository->getPostsWithUsers();
       return $this->wrapCollection($posts->toArray());
    }

    /**
     * Wrapper for post API
     * @param $post
     * @return array
     */
    public function wrap($post)
    {
        return [
            'title' => $post['title'],
            'content'=> $post['content'],
            'by_user' => $post['user'],
            'created'=> $post['created_at'],
        ];
    }
}