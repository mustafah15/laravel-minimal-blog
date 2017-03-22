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

    public function getPostsByCategoryId($categoryId)
    {
        //todo
    }

    /**
     * return all posts
     * @return array
     */
    public function getAllPosts()
    {
       $posts =  $this->postRepository->getPostsFullData();
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
            'user' =>
                [
                    'name' => $post['user']['name'],
                    'email' => $post['user']['email'],
                ],
            'category'=>
                [
                    'name'=>$post['category']['name'],
                    'id'=>$post['category']['id']
                ],
            'created'=> $post['created_at'],
        ];
    }
}