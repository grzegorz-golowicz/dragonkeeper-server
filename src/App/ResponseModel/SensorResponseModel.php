<?php
namespace App\ResponseModel;


class SensorResponseModel extends AbstractResponseModel
{
    /**
     * @param array $sensorInfo
     * @return SensorResponseModel
     */
    public function setSensorInfo(array $sensorInfo)
    {
        foreach ($sensorInfo as $sensorParamKey => $sensorParamVal) {
            $this->data[$sensorParamKey] = $sensorParamVal;
        }

        return $this;
    }

    /**
     * @param $val
     * @return SensorResponseModel
     */
    public function setSensorValue($val)
    {
        $this->data['value'] = $val;

        return $this;
    }

}