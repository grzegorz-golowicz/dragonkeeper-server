<?php
namespace App\Service;


use App\Service\Sensor\DS18B20;

class SensorService
{
    const W1_PATH = '/sys/bus/w1/devices/';

    private $allowedPrefix = array('28-');

    public function getW1List()
    {
        $res = array();
        $iterator = new \DirectoryIterator(self::W1_PATH);
        foreach ($iterator as $device) {
            if ($this->isAllowedDevice($device->getFilename())) {
                $res[] = $this->getDeviceInfo($device->getFilename());
            }
        }

        return $res;
    }

    public function getSensorValueByUid($uid)
    {
        return $this->getSensorDriverByUid($uid)->read();
    }

    public function getSensorDriverByUid($uid)
    {
        //FIXME on this moment supported is only one sensor so hardcode it.
        return new DS18B20($uid);
    }

    /**
     * @param string $uid
     * @return array()
     */
    public function getDeviceInfo($uid)
    {
        //FIXME this should return Object
        //FIXME this function should use info from driver's classes. for now only one sensor is supported so hardcode info.
        return array(
            'measured' => 'temp',
            'unit' => '°C',
            'part' => 'DS18B20+',
            'code' => 28,
            'uid' => $uid
        );
    }


    /**
     * @param string $uid
     * @return bool
     */
    private function isAllowedDevice($uid)
    {
        foreach($this->allowedPrefix as $prefix) {
            if (0 === strpos($uid, $prefix)) return true;
        }

        return false;
    }
}