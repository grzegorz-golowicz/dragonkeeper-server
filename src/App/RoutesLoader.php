<?php
namespace App;
use App\Enum\ServiceEnum;
use Silex\Application;
class RoutesLoader
{
    private $app;
    public function __construct(Application $app)
    {
        $this->app = $app;

        $this->app[ServiceEnum::CONTROLLER_STATUS] = $this->app->share(function () {
            return new Controller\StatusController($this->app[ServiceEnum::SERVICE_STATUS]);
        });
    }

    public function bindRoutesToControllers()
    {
        $api = $this->app["controllers_factory"];

        $api->get('/status', $this->buldActionString(ServiceEnum::CONTROLLER_STATUS, 'get'));

        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $api);
    }

    /**
     * @param string $controller
     * @param string $actionName
     * @return string
     */
    private function buldActionString($controller, $actionName)
    {
        return sprintf('%s:%s', $controller, $actionName);
    }
}