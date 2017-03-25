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
     * @param $postId
     * @return array
     */
    public function getSinglePost($postId)
    {
        $post = $this->postRepository->getPostWithUserById($postId);

        return $this->wrap($post[0]->toArray());
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
     * Default Wrapper for post API
     * @param $post
     * @return array
     */
    public function wrap($post)
    {
        return [
            'title' => $post['title'],
            'content'=> $post['content'],
            'id'=>$post['id'],
            'url'=>route('post.show',['postId'=>$post['id']]),
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

    /**
     * @param $post
     * @return array
     */
    public function WrapperForCategoryListing($post)
    {
        return [
            'title' => $post['title'],
            'content'=> $post['content'],
            'id' => $post['id'],
            'url' => route('post.show',['postId'=>$post['id']]),
            'created' => $post['created_at'],
        ];
    }
}