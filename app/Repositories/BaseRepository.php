<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/18/17
 * Time: 1:20 PM
 */

namespace App\Repositories;

use App\Contracts\RepositoryContract;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Paginatable;

abstract class BaseRepository implements RepositoryContract
{
    use Paginatable;

    protected $model;


    /**
     * Get Class Model
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param Model $model
     * @return RepositoryContract $this
     */
    public function setModel(Model $model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Add New Entity
     * @param array $data
     * @return Model
     */
    public function addItem(array $data)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                if ($value) {
                    $this->model->$key = $value;
                }
            }
            $this->model->save();
        }
        return $this->model;
    }

    /**
     * Get Single Entity By id
     * @param $itemId
     * @return mixed
     */
    public function editItem($itemId, array $data)
    {
        $item =  $this->getItemByID($itemId);
        if ($data) {
            foreach ($data as $key => $value) {
                if ($value) {
                    $item->$key = $value;
                }
            }
            $item->save();
        }
        return $item;
    }

    /**
     * Get Single Entity By id
     * @param $itemId
     * @return Model
     */
    public function getItemByID($itemId)
    {
        return $this->model->find($itemId);
    }

    /**
     * Delete Item By Id
     * @param integer $itemId
     * @return integer
     */
    public function deleteItemById($itemId)
    {
        return $this->model->delete($itemId);
    }

    /**
     * Get All Entities at table
     * @return array $items
     */
    public function getAllItems()
    {
        return $this->model->all();
    }

    /**
     * @return array $items
     */
    public function paginateAllItem()
    {
        return $this->model->paginate(10);
    }
}
