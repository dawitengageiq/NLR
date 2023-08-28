<?php

namespace App\Http\Services\Contracts;


Interface ChartContract
{
    /**
     * Provide needed data for formating.
     *
     * @var Array $data
     */
    public function setData (Array $data);

    /**
     * Return the series data in group that will be use in views .
     *
     * @return Array
     */
    public function getGroupSeries ();

    /**
     * Return the series data in group of categories that will be use in views .
     *
     * @return Array
     */
    public function getGroupCategories ();

    /**
     * Return the series data in group of categories that will be use in views .
     *
     * @return Array
     */
    public function getActualRejection ();

    /**
     * Return the data that will be use in views .
     *
     * @return Array
     */
    public function getData ();

    /**
     * This is for development when cachesd is empty.
     * Debugging purposes
     *
     * @var Bolean $process
     */
    public function dummyData ($process = false);

    /**
     * Process on formatting data.
     *
     *
     * @var Bolean $view
     */
    public function formatData($view = true);
}
