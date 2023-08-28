<?php

namespace App\Http\Services\Contracts;

Interface ConsolidatedGraphContract
{
    /**
     * Set legends, provided by controller from config.consolidatedgraph.legends.
     *
     */
    public function setLegends ($legends);

    /**
     * Set the selected column to display
     *
     * @param array $column
     */
    public function setSelectedColumn ($column);

    /**
     * Set counters for generating chart series, index is from config.consolidatedgraph.legends.
     *
     */
    public function setcounters ();

    /**
     * Get the consilidated data to be use in chart.
     *
     */
    public function getConsolidatedData ();

    /**
     *  Set the chart series.
     *
     */
    public function setSeriesThenCategories();
}
