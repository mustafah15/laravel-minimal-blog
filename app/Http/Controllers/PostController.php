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

    }

    public function edit($postId)
    {

    }

    public function getAll()
    {
        $data = $this->postManager->getAllPosts();

        return  $this->setStatusCode(200)->respond($data);
    }

}
