<?php

class Person
{
    const MAX_POSSIBLE_AGE = 50;

    private static $maxAge = 0;

    private $username;
    private $email;
    private $age;

    public static function getOldest()
    {
        return self::$maxAge;
    }

    public function __construct($username, $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    public function __toString()
    {
        return \sprintf('%s (%s)', $this->username, $this->email);
    }

    public function __get($name)
    {
        $baseMethodName = \ucfirst($name);
        $getter = 'get' . $baseMethodName;

        if (\method_exists($this, $getter)) {
            return $this->$getter();
        } elseif (\method_exists($this, 'set' . $baseMethodName)) {
            throw new \LogicException(\sprintf("Property '%s' is write-only!)", $name));
        }

        throw new \LogicException(
            \sprintf("Property '%s' does not exists in class %s", $name, self::class)
        );
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }

    public function __unset($name)
    {
        $this->$name = null;
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
        if ($age > self::MAX_POSSIBLE_AGE) {
            throw new \PersonAgeValidationException(
                "Cannot create person with provided age " . $age
            );
        }

        $this->age = $age;

        if ($age > self::$maxAge) {
            self::$maxAge = $age;
        }
    }
}
