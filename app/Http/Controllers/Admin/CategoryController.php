<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/25/17
 * Time: 3:28 AM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Managers\CategoryManager;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public $categoryManager ;

    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        $this->categoryManager = new CategoryManager();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = (new CategoryRepository())->getAllItems();

        return view('admin.categories.home',['categories'=>$categories]);
    }
}