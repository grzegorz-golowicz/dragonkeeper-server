<?php
namespace App\Service\Sensor;


use PhpGpio\Sensors\SensorInterface;

class DS18B20 extends \PhpGpio\Sensors\DS18B20 implements SensorInterface
{

}