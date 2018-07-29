<?php

namespace App\Factory;

use App\Flyweight\Character;

class CharacterFactory
{
    private static $instance;

    private $Characters = [];

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new CharacterFactory();
        }
        return self::$instance;
    }

    public function addCharacter($char)
    {
        if (!array_key_exists($char, $this->Characters)) {
            $this->Characters[$char] = new Character($char);
        }
    }

    public function getCharacters()
    {
        return $this->Characters;
    }

    public final function __clone()
    {
        throw new \Exception('This Instance is Not Clone');
    }

    public final function __wakeup()
    {
        throw new \Exception('This Instance is Not unserialize');
    }

}