<?php
namespace App\ResponseModel;


class StatusResponseModel extends AbstractResponseModel
{
    /**
     * @param string $status
     * @return StatusResponseModel
     */
    public function setStatus($status)
    {
        $this->data['status'] = $status;

        return $this;
    }

    /**
     * @param string $uptime
     * @return StatusResponseModel
     */
    public function setUpTime($uptime)
    {
        $this->data['uptime'] = $uptime;

        return $this;
    }

    /**
     * @param float $cpuTemp
     * @return StatusResponseModel
     */
    public function setCpuTemp($cpuTemp)
    {
        $this->data['cpuTemp'] = $cpuTemp;

        return $this;
    }
}