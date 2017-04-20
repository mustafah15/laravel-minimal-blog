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
    public function getAllCategories()
    {
        $data = $this->categoryRepository->getAllCategoriesWithPosts();

        return $this->wrapCollection($data->toArray());
    }

    /**
     * @param $categoryId
     * @return int
     */
    public function deleteCategoryWithId($categoryId)
    {
        $category = $this->categoryRepository->getItemByID($categoryId);

        if (!$category) {
            return redirect(route('manageCategories'));
        }

        $category->delete();
        return redirect(route('manageCategories'));
    }

    /**
     * @param $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function storeNewCategory($data)
    {
        unset($data['_token']);

        return $this->categoryRepository->addItem($data);
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
            'posts'=> (new PostManager())->wrapCollection($category['posts'],'wrapperForCategoryListing'),
            'post_number'=>count($category['posts']),
        ];
    }

    public function updateCategoryWithId($categoryId, $data)
    {
        unset($data['_token']);

        return $this->categoryRepository->editItem($categoryId, $data);
    }
}