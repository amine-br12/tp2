<?php
require_once 'autoloader.php';

class PokemonEau extends Pokemon {
    public function attack(Pokemon $p): int {
        $damage = parent::attack($p);

        if ($p instanceof PokemonFeu) {
            $damage *= 2;
        } elseif ($p instanceof PokemonEau || $p instanceof PokemonPlante) {
            $damage *= 0.5;
        }

        $p->setHp($p->getHp() - $damage);
        return $damage;
    }
}