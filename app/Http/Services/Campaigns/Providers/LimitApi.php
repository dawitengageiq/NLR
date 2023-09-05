<?php

namespace App\Http\Services\Campaigns\Providers;

class LimitApi extends Limit
{
    /**
     * Instantiate.
     *
     * @param  Illuminate\Foundation\Application  $app
     * @param  array  $limit
     */
    public function __construct(
        \Illuminate\Foundation\Application $app,
        $limit
    ) {
        $this->app = $app;
        $this->limit = $limit;
        $this->stackType = $app->request->get('stack_type');

        $this->execute();
    }

    /**
     * Static function.
     *
     * @param  array  $args
     */
    public static function bind(...$args)
    {
        new static($args[0], $args[1]);
    }

    /**
     * Bind the class to use.
     */
    protected function execute()
    {
        // binding limit class
        $this->app->bind($this->contract, $this->limitType[$this->stackType]);

        $this->addDAta2Request();
    }

    /**
     * Add some data to request
     */
    protected function addDAta2Request()
    {
        $this->app->request->request->add(
            [
                'limit' => iterator_to_array(
                    $this->applyLimit(
                        array_keys(config('constants.MIXED_COREG_TYPE_FOR_ORDERING')),
                        $this->limit
                    )
                ),
            ]
        );
    }
}
