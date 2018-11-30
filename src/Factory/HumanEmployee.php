<?php

require_once __DIR__ . '/Employee.php';

final class HumanEmployee extends Employee
{
    const EATING_PAUSE_DURATION = 60;

    public function eat()
    {
        $this->pause(self::EATING_PAUSE_DURATION);

        echo \sprintf("[%s] is eating...\n", \spl_object_id($this));
    }
}
