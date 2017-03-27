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
use Illuminate\Http\Request;

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

    /**
     * @param $categoryId
     * @return int
     */
    public function destroy($categoryId)
    {
        return $this->categoryManager->deleteCategoryWithId($categoryId);
    }

    /**
     * @param $categoryId
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($categoryId, Request $request)
    {
        $category = $this->categoryManager->updateCategoryWithId($categoryId, $request->toArray());

        //check if category updated
        if(!$category)
            return redirect()->back()->withInput();

        return redirect(route('manageCategories'));
    }

    /**
     * @param $categoryId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($categoryId)
    {
        $category = (new CategoryRepository())->getItemByID($categoryId);

        return view('admin.categories.edit',['category'=>$category]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create ( )
    {
        return view('admin.categories.new');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store (Request $request )
    {
        $category = $this->categoryManager->storeNewCategory($request->toArray());

        //if no category created
        if(!$category)
            return redirect()->back()->withInput();

        return redirect(route('manageCategories'));
    }
}