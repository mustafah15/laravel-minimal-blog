<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use App\Managers\PostManager;
use Illuminate\Http\Request;


class PostController extends ApiController
{

    protected $postManager;

    public function __construct()
    {
        $this->postManager =  new PostManager();
    }


    public function index()
    {
        return view('posts.all');
    }

    public function store(Request $request)
    {

    }

    public function create()
    {

    }

    public function destroy($postId)
    {

    }

    public function update($postId)
    {

    }

    public function show($postId)
    {
       return view('posts.post',['postId'=>$postId]);
    }

    public function edit($postId)
    {

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
     * @return array response
     */
    public function getDataForSinglePost($postId)
    {
        $data = $this->postManager->getSinglePost($postId);

        if (!$data)
            $this->setStatusCode(404)->respondWithError('Post Not Found!');

        return $this->setStatusCode(200)->respond($data);
    }
}
