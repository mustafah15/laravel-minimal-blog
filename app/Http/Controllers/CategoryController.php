<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Api\ApiController;
use App\Managers\CategoryManager;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    protected $categoryManager ;

    public function __construct()
    {
        $this->categoryManager = new CategoryManager();
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

    public function destroy($categoryId)
    {

    }

    public function update($categoryId)
    {

    }

    public function show($categoryId)
    {

    }

    public function getData()
    {
//        $data =  $this->categoryManager
    }
}
