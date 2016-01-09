<?php
namespace App\Service;


class StatusService
{
    public function getUptime()
    {
        $uptimeFile = file_get_contents('/proc/uptime');
        $uptimeValues = explode(' ', $uptimeFile);

        return floor($uptimeValues[0]);
    }

    public function getCPUTemp()
    {
        $cpuTempFile = file_get_contents('/sys/class/thermal/thermal_zone0/temp');

        return round($cpuTempFile/1000, 2);
    }
}