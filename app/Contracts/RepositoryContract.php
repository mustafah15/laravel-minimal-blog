<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/18/17
 * Time: 2:13 AM
 */

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface RepositoryContract
{
    /**
     * @param Model $model
     * @return mixed
     */
    public function setModel(Model $model);

    /**
     * @return Model $model
     */
    public function getModel();

    /**
     * Add New Entity
     * @param array $data
     * @return Model
     */
    public function addItem(array $data);

    /**
     * Update Single Entity By Id
     * @param $itemId
     * @param array $data
     * @return Model Item
     */
    public function editItem($itemId, array $data);

    /**
     * Get Single Entity By id
     * @param $itemId
     * @return Model
     */
    public function getItemByID($itemId);

    /**
     * Delete Item By Id
     * @param integer $itemId
     * @return integer
     */
    public function deleteItemById($itemId);

    /**
     * Get All Entities at table
     * @return array $items
     */
    public function getAllItems();
}
