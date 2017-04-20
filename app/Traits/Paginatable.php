<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/21/17
 * Time: 11:11 PM
 */

namespace App\Traits;

trait Paginatable
{

    /**
     * Paginate returned items by 10
     *
     * @return mixed
     */
    public function paginateAllItem()
    {
        return $this->model->paginate(10);
    }
}
