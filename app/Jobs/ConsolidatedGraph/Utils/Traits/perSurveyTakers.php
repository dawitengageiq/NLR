<?php
namespace App\Jobs\ConsolidatedGraph\Utils\Traits;

trait perSurveyTakers
{
    /**
     * Legends value needs to convert to percentage.
     *
     * @var array
     */
    protected $stValue2Percent = [];

    /**
     * Division
     * @param  string $idx
     * @param  float $dividend
     * @param  float $divisor
     */
    protected function perSurveyTakers ($idx, $dividend, $divisor)
    {
        $total = ($divisor > 0) ? ($dividend/$divisor) : 0;
        if(array_key_exists($idx, $this->stValue2Percent)) $this->consolidatedData->$idx = number_format(($total * 100), 2, '.', '');
        else $this->consolidatedData->$idx = number_format($total, 2, '.', '');
    }

    /**
     * Value for revenue per survey takers.
     *
     * @param string $idx
     * @return void
     */
    protected function sourceRevenuePerSurveyTakers($idx)
    {
        if(!array_key_exists('source_revenue', $this->params)
        || !array_key_exists('survey_takers', $this->params)) {
            $this->consolidatedData->$idx = number_format(0, 2, '.', '');

            return;
        }

        $this->perSurveyTakers(
            $idx,
            $this->params['source_revenue'],
            $this->params['survey_takers']
        );

        return;
    }

    /**
     * Value for cpa per survey takers.
     *
     * @param string $idx
     * @return void
     */
    protected function cpaPerSurveyTakers($idx)
    {
        if(!array_key_exists('cpa_revenue', $this->params)
        || !array_key_exists('survey_takers', $this->params)) {
            $this->consolidatedData->$idx = number_format(0, 2, '.', '');

            return;
        }

        $this->perSurveyTakers(
            $idx,
            $this->params['cpa_revenue'],
            $this->params['survey_takers']
        );

        return;
    }

    protected function allInboxPerSurveyTakers($idx)
    {
        if(!array_key_exists('all_inbox_revenue', $this->params)
        || !array_key_exists('survey_takers', $this->params)) {
            $this->consolidatedData->$idx = number_format(0, 2, '.', '');

            return;
        }

        $this->perSurveyTakers(
            $idx,
            $this->params['all_inbox_revenue'],
            $this->params['survey_takers']
        );

        return;
    }

    protected function pushCpaRevenuePerSurveyTakers($idx)
    {
        if(!array_key_exists('push_revenue', $this->params)
        || !array_key_exists('survey_takers', $this->params)) {
            $this->consolidatedData->$idx = number_format(0, 2, '.', '');

            return;
        }

        $this->perSurveyTakers(
            $idx,
            $this->params['push_revenue'],
            $this->params['survey_takers']
        );

        return;
    }
}
