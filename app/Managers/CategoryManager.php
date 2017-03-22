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
     * @param $category
     * @return array
     */
    public function wrap($category)
    {
        return [
            'name'=>$category['name'],
            'id'=>$category['id'],
        ];
    }
}