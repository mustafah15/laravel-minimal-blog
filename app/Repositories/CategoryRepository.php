<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/18/17
 * Time: 2:51 PM
 */

namespace App\Repositories;

use App\Category;

class CategoryRepository extends BaseRepository
{
    /**
     * CategoryRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(new Category());
    }

    /**
     * @param $categoryId
     * @return mixed
     */
    public function getCategoryByIdWithPosts($categoryId)
    {
        return $this->model
            ->with('posts')
            ->where('id', $categoryId)
            ->get();
    }

    /**
     * @return array
     */
    public function getAllCategoriesWithPosts()
    {
        return $this->model->with('posts')->get();
    }

}
