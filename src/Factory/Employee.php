<?php

require_once __DIR__ . '/EmployeeInterface.php';

abstract class Employee implements EmployeeInterface
{
    public function work()
    {
        echo \sprintf("[%s] is working\n", \spl_object_id($this));
    }

    public function pause($minutes)
    {
        echo \sprintf("[%s] paused work for %d minutes\n", \spl_object_id($this), $minutes);
    }
}
