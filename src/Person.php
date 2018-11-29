<?php

class Person
{
    const MAX_POSSIBLE_AGE = 50;

    private $username;
    private $email;
    private $age;

    private static $maxAge = 0;

    public static function getOldest() {
        return self::$maxAge;
    }


    public function __construct($username, $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        echo "[DEBUG] " . $this -> username;
        if ($age > self::MAX_POSSIBLE_AGE) {
            echo "cannot create person with provided age with $age". \PHP_EOL;
            return;
        }
        $this->age = $age;

        if ($age > self::$maxAge) {
            self::$maxAge = $age;
        }
    }
}
