<?php

namespace App\Jobs\Reordering\Utils;

class Ordering
{
    /**
     * Default variables
     */
    protected $orders = [];

    /**
     * Set campaign order from calculate::class
     *
     * @param  array  $orders
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
    }

    /**
     * Get the new campaign ids Order
     *
     * @return array
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Determine the type of reordering then reorder
     *
     * @param  int  $orderBy
     * @return void
     */
    public function reorderBy($orderBy)
    {
        if (count($this->orders) <= 0) {
            return;
        }

        switch ($orderBy) {
            //Order campaign ascending
            case 1:
                asort($this->orders);
                break;
                //Order campaign descending
            case 2:
                arsort($this->orders);
                break;
                //Randomize campaign order
            case 3:
                $this->orders = $this->shuffleAssoc($this->orders);
                break;
        }
    }

    /**
     * Random reordering
     *
     * @param  array  $array
     * @return array
     */
    protected function shuffleAssoc($array)
    {
        //Initialize
        $new = [];
        //Get array's keys and shuffle them.
        $keys = array_keys($array);
        shuffle($keys);

        //Create same array, but in shuffled order.
        foreach ($keys as $key) {
            $new[$key] = $array[$key];
        }

        return $new;
    }
}
