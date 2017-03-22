<?php

namespace App\Managers;

abstract class BaseManager
{

    /**
     * @param $item
     * @return array
     */
    public abstract function wrap($item);


    /**
     * @param array $items
     * @return array
     */
    public function wrapCollection(array $items)
    {
        return array_map([$this, 'wrap'],$items);
    }
}