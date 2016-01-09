<?php
namespace App\Controller;


use App\ResponseModel\SensorResponseModel;
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

    public function getSensorValue($uid)
    {
        $res = new SensorResponseModel();
        $res->setSensorInfo($this->sensorService->getDeviceInfo($uid));
        $res->setSensorValue($this->sensorService->getSensorValueByUid($uid));

        return new JsonResponse($res->toArray());
    }
}