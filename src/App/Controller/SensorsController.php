<?php
namespace App\Controller;


use App\Service\SensorService;
use Symfony\Component\HttpFoundation\JsonResponse;

class SensorsController
{
    /**
     * @var SensorService
     */
    protected $sensorService;

    public function __construct(SensorService $sensorService)
    {
        $this->sensorService = $sensorService;
    }

    public function getSensors()
    {
        return new JsonResponse($this->sensorService->getW1List());
    }
}