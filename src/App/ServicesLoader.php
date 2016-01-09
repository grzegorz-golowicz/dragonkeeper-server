<?php
namespace App;

use App\Enum\ServiceEnum;
use App\Service\SensorService;
use App\Service\StatusService;
use Silex\Application;

class ServicesLoader
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function bindServices()
    {
        $this->app[ServiceEnum::SERVICE_STATUS] = $this->app->share(function () {
            return new StatusService();
        });

        $this->app[ServiceEnum::SERVICE_SENSORS] = $this->app->share(function () {
            return new SensorService();
        });
    }
}