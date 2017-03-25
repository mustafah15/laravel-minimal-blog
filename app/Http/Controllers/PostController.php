<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use App\Managers\PostManager;

class PostController extends ApiController
{

    protected $postManager;

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->postManager =  new PostManager();
    }


    /**
     * show all posts
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('posts.all');
    }

    /**
     * show single post
     * @param $postId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($postId)
    {
       return view('posts.post',['postId'=>$postId]);
    }

    /**
     * return all posts data
     * @return array response
     */
    public function getData()
    {
        $data = $this->postManager->getAllPosts();

        return  $this->setStatusCode(200)->respond($data);
    }

    /**
     * return single post data
     * @param $postId
     * @return Api\response
     */
    public function getDataForSinglePost($postId)
    {
        $data = $this->postManager->getSinglePost($postId);

        if (!$data)
            return $this->setStatusCode(404)->respondWithError('Post Not Found!');

        return $this->setStatusCode(200)->respond($data);
    }
}
