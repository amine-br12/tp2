<?php
require_once 'autoloader.php';

class PokemonPlante extends Pokemon {
    public function attack(Pokemon $p): int {
        $damage = parent::attack($p);

        if ($p instanceof PokemonEau) {
            $damage *= 2;
        } elseif ($p instanceof PokemonPlante || $p instanceof PokemonFeu) {
            $damage *= 0.5;
        }

        $p->setHp($p->getHp() - $damage);
        return $damage;
    }
}