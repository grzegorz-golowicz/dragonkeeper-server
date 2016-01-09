<?php
namespace App\Controller;


use App\Enum\StatusEnum;
use App\ResponseModel\StatusResponseModel;
use App\Service\StatusService;
use Symfony\Component\HttpFoundation\JsonResponse;

class StatusController
{
    /**
     * @var StatusService
     */
    protected $statusService;

    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    public function get()
    {
        $res = new StatusResponseModel();
        $res->setStatus(StatusEnum::STATUS_OK);
        $res->setUpTime($this->statusService->getUptime());
        $res->setCpuTemp($this->statusService->getCPUTemp());

        return new JsonResponse($res->toArray());
    }
}