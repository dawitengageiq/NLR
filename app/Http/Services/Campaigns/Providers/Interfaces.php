<?php
namespace App\Http\Services\Campaigns\Providers;

use App\Http\Services\Campaigns\Lists;
use App\Http\Services\Campaigns\ListsApiOnePage;
use App\Http\Services\Campaigns\ListsApiMultiplePage;

class Interfaces
{
    /**
     * Application container, to be supplemented.
     *
     */
    protected $app;

    /**
     * Current path.
     *
     */
    protected $path = '';

    /**
     * Path name of campaign list interface.
     *
     */
    protected $contract = '\App\Http\Services\Contracts\CampaignListContract';

    /**
     * Path name list with class name equivalent.
     *
     */
    protected $className = [
        'test/get_campaign_list' => Lists::class,
        'api/get_campaign_list' => Lists::class,
    ];


    /**
     * Instantiate.
     *
     * @param Illuminate\Foundation\Application $app
     */
    public function __construct(\Illuminate\Foundation\Application $app) {
        $this->app = $app;
        $this->path = $app->request->path();

        $this->execute();
    }

    /**
     * Static function.
     *
     * @param Illuminate\Foundation\Application $app
     */
    public static function bind (\Illuminate\Foundation\Application $app)
    {
        new Static($app);
    }

    /**
     * Bind the class to use.
     *
     */
	protected function execute ()
    {
        if($className = $this->resolveClassName()) {
            if (class_exists($className)) $this->app->bind($this->contract, $className);
        }
    }


    /**
     * Resolve what class to use.
     *
     * @return object
     */
	protected function resolveClassName ()
    {
        if(array_key_exists($this->path, $this->className)) {
            return $this->className[$this->path];
        }

        return '';
    }
}
