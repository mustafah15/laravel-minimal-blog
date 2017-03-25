<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/23/17
 * Time: 1:24 AM
 */

namespace App\Managers;


use App\Repositories\CategoryRepository;

class CategoryManager extends BaseManager
{

    protected $categoryRepository ;

    /**
     * CategoryManager constructor.
     */
    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    /**
     * @param $categoryId
     * @return array
     */
    public function getSingleCategoryWithPosts($categoryId)
    {
        $category = $this->categoryRepository->getCategoryByIdWithPosts($categoryId);

        return $this->wrap($category[0]->toArray());
    }

    /**
     * get All system categories
     * @return array
     */
    public function getAllCategories ()
    {
        $data = $this->categoryRepository->getAllItems();

        return $this->wrapCollection($data->toArray());
    }

    /**
     * @param $category
     * @return array
     */
    public function wrap($category)
    {
        return [
            'name'=>$category['name'],
            'id'=>$category['id'],
            'description'=>$category['description'],
            'url'=>route('category.show',['categoryId'=>$category['id']]),
            'posts'=> (new PostManager())->wrapCollection($category['posts'],'WrapperForCategoryListing'),
        ];
    }
}