<?php

namespace App\Gameplay;

use App\Hero\Hero;

class Battle
{
    protected $players = [];
    protected $attacker;
    protected $defender;
    protected $damage;

    /**
     * setDamage
     *
     * @param  float $value
     * @return void
     */
    public function setDamage(float $value)
    {
        $this->damage = $value;
    }

    /**
     * getDamage
     *
     * @return float
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * startBattle
     *
     * @return void
     */
    public function startBattle()
    {
        $hero = new Hero();
        $hero->setName('Orderus');
        $hero->setHealth(rand(70, 100));
        $hero->setStrength(rand(70, 80));
        $hero->setDefence(rand(45, 55));
        $hero->setSpeed(rand(40, 50));
        $hero->setLuck(rand(10, 30));
        $hero->setSkills(['rapid strike' => 10, 'magic shield' => 20, 'luck' => $hero->getLuck()]);

        $wild_beast = new Hero();
        $wild_beast->setName('Wild Beast');
        $wild_beast->setHealth(rand(60, 90));
        $wild_beast->setStrength(rand(60, 90));
        $wild_beast->setDefence(rand(40, 60));
        $wild_beast->setSpeed(rand(40, 60));
        $wild_beast->setLuck(rand(25, 40));
        $wild_beast->setSkills(['luck' => $wild_beast->getLuck()]);

        $this->battle($hero, $wild_beast);
    }

    /**
     * battle
     *
     * @param  object $hero
     * @param  object $wild_beast
     * @return void
     */
    public function battle(object $hero, object $wild_beast)
    {
        $rounds = 20;
        for ($i = 0; $i < $rounds; $i++) {
            echo  'Round number ' . floatval($i + 1) . "<br>";
            if ($i == 0) {
                if ($hero->getSpeed() >= $wild_beast->getSpeed()) {
                    $players_order_set = false;
                    if ($hero->getSpeed() == $wild_beast->getSpeed()) {
                        $players_order_set = true;
                        if ($hero->getLuck() >= $wild_beast->getLuck()) {
                            $this->playersOrderStart($hero, $wild_beast);
                        } else {
                            $this->playersOrderStart($wild_beast, $hero);
                        }
                    }
                    if (!$players_order_set)
                        $this->playersOrderStart($hero, $wild_beast);
                } else {
                    $this->playersOrderStart($wild_beast, $hero);
                }
                echo $this->attacker->getName() . ' starts the attack';
                echo "<br>";
            } else {
                if ($i % 2 == 0) {
                    $this->turns(reset($this->players), end($this->players));
                } else {
                    $this->turns(end($this->players), reset($this->players));
                }
            }
            $this->attack();
            if (!$this->defender->isAlive()) {
                echo '<strong>' . $this->attacker->getName() . '</strong> won the battle!';
                break;
            }

            if ($i == $rounds - 1)
                echo 'The battle ended in a tie';
        }
    }

    /**
     * playersOrderStart
     *
     * @param  object $player1
     * @param  object $player2
     * @return void
     */
    protected function playersOrderStart(object $player1, object $player2)
    {
        array_push($this->players, $player1);
        array_push($this->players, $player2);
        $this->turns($player1, $player2);
    }

    /**
     * turns
     *
     * @param  object $attacker
     * @param  object $defender
     * @return void
     */
    protected function turns(object $attacker, object $defender)
    {
        $this->attacker = $attacker;
        $this->defender = $defender;
    }

    /**
     * attack
     *
     * @return void
     */
    public function attack()
    {
        echo $this->defender->getName() . ' had a health of ' . $this->defender->getHealth();
        echo '<br>';
        $this->setDamage($this->attacker->getStrength() - $this->defender->getDefence());
        $this->triggerSkills($this->attacker, 'rapid strike');
        $this->triggerSkills($this->defender, 'magic shield');
        $this->triggerSkills($this->defender, 'luck');
        echo $this->attacker->getName() . '\'s strike inflicted ' . $this->getDamage() . ' damage on ' . $this->defender->getName() . '<br>';
        $this->defender->setHealth($this->defender->getHealth() - $this->getDamage());
        echo $this->defender->getName() . ' has ' . $this->defender->getHealth() . ' health remaining<br><br>';
    }

    /**
     * triggerSkills
     *
     * @param  object $player
     * @param  object $skill
     * @return void
     */
    protected function triggerSkills(object $player, string $player_skill)
    {
        $chance = rand(1, 100);
        foreach ($player->getSkills() as $skill => $chance_percentage) {
            if ($skill == $player_skill && $chance <= $chance_percentage) {
                $this->applySkill($player, $player_skill);
            }
        }
    }

    /**
     * applySkill
     *
     * @param  object $player
     * @param  string $skill
     * @return void
     */
    protected function applySkill(object $player, string $skill)
    {
        echo 'Damage before ' . $this->getDamage() . '<br>';
        echo $player->getName() . ' used <strong>' . $skill . '</strong> skill<br>';

        switch ($skill) {
            case 'rapid strike':
                $this->setDamage($this->getDamage() * 2);
                break;

            case 'magic shield':
                $this->setDamage($this->getDamage() / 2);
                break;

            case 'luck':
                $this->setDamage(0);
                break;
        }
        echo 'Damage after ' . $this->getDamage() . '<br>';
    }
}
