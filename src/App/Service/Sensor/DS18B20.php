<?php
namespace App\Service\Sensor;


use App\Service\SensorService;
use PhpGpio\Sensors\SensorInterface;

class DS18B20 extends \PhpGpio\Sensors\DS18B20 implements SensorInterface
{
    public function __construct($uid)
    {
        $this->setBus(SensorService::W1_PATH . $uid . '/w1_slave');
    }
}