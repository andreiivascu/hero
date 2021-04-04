<?php

namespace App\Hero;

class Hero
{
    protected $name;
    protected $health;
    protected $strength;
    protected $defence;
    protected $speed;
    protected $luck;
    protected $skills = [];
    
    /**
     * setName
     *
     * @param  string $value
     * @return void
     */
    public function setName(string $value)
    {
        $this->name = $value;
    }
    
    /**
     * getName
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * setHealth
     *
     * @param  int $value
     * @return void
     */
    public function setHealth(int $value)
    {
        $this->health = $value;
    }
    
    /**
     * getHealth
     *
     * @return int
     */
    public function getHealth()
    {
        return $this->health;
    }
    
    /**
     * setStrength
     *
     * @param  int $value
     * @return void
     */
    public function setStrength(int $value)
    {
        $this->strength = $value;
    }
    
    /**
     * getStrength
     *
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }
    
    /**
     * setDefence
     *
     * @param  int $value
     * @return void
     */
    public function setDefence(int $value)
    {
        $this->defence = $value;
    }
    
    /**
     * getDefence
     *
     * @return int
     */
    public function getDefence()
    {
        return $this->defence;
    }
    
    /**
     * setSpeed
     *
     * @param  int $value
     * @return void
     */
    public function setSpeed(int $value)
    {
        $this->speed = $value;
    }
    
    /**
     * getSpeed
     *
     * @return int
     */
    public function getSpeed()
    {
        return $this->speed;
    }
    
    /**
     * setLuck
     *
     * @param  int $value
     * @return void
     */
    public function setLuck(int $value)
    {
        $this->luck = $value;
    }
    
    /**
     * getLuck
     *
     * @return int
     */
    public function getLuck()
    {
        return $this->luck;
    }
    
    /**
     * setSkills
     *
     * @param  array $value
     * @return void
     */
    public function setSkills(array $value)
    {
        $this->skills = $value;
    }
    
    /**
     * getSkills
     *
     * @return array
     */
    public function getSkills()
    {
        return $this->skills;
    }
    
    /**
     * isAlive
     *
     * @return bool
     */
    public function isAlive()
    {
        return $this->getHealth() > 0;
    }
}
