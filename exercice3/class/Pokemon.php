<?php
class AttackPokemon {
    private int $attackMinimal;
    private int $attackMaximal;
    private float $specialAttack;
    private int $probabilitySpecialAttack;

    public function __construct(int $attackMinimal, int $attackMaximal, float $specialAttack, int $probabilitySpecialAttack) {
        $this->attackMinimal = $attackMinimal;
        $this->attackMaximal = $attackMaximal;
        $this->specialAttack = $specialAttack;
        $this->probabilitySpecialAttack = $probabilitySpecialAttack;
    }

    public function getAttackMinimal(): int {
        return $this->attackMinimal;
    }

    public function setAttackMinimal(int $attackMinimal): void {
        $this->attackMinimal = $attackMinimal;
    }

    public function getAttackMaximal(): int {
        return $this->attackMaximal;
    }

    public function setAttackMaximal(int $attackMaximal): void {
        $this->attackMaximal = $attackMaximal;
    }

    public function getSpecialAttack(): float {
        return $this->specialAttack;
    }

    public function setSpecialAttack(float $specialAttack): void {
        $this->specialAttack = $specialAttack;
    }

    public function getProbabilitySpecialAttack(): int {
        return $this->probabilitySpecialAttack;
    }

    public function setProbabilitySpecialAttack(int $probabilitySpecialAttack): void {
        $this->probabilitySpecialAttack = $probabilitySpecialAttack;
    }
}

class Pokemon {
    private string $name;
    private string $url;
    private int $hp;
    private AttackPokemon $attackPokemon;

    public function __construct(string $name, string $url, int $hp, int $attackMinimal, int $attackMaximal, float $specialAttack, int $probabilitySpecialAttack) {
        $this->name = $name;
        $this->url = $url;
        $this->hp = $hp;
        $this->attackPokemon = new AttackPokemon($attackMinimal, $attackMaximal, $specialAttack, $probabilitySpecialAttack);
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getUrl(): string {
        return $this->url;
    }

    public function setUrl(string $url): void {
        $this->url = $url;
    }

    public function getHp(): int {
        return $this->hp;
    }

    public function setHp(int $hp): void {
        $this->hp = $hp;
    }

    public function getAttackPokemon(): AttackPokemon {
        return $this->attackPokemon;
    }

    public function setAttackPokemon(AttackPokemon $attackPokemon): void {
        $this->attackPokemon = $attackPokemon;
    }
    public function getAttackMinimal(): int {
        return $this->attackPokemon->getAttackMinimal();
    }

    public function setAttackMinimal(int $attackMinimal): void {
        $this->attackPokemon->setAttackMinimal($attackMinimal);
    }

    public function getAttackMaximal(): int {
        return $this->attackPokemon->getAttackMaximal();
    }

    public function setAttackMaximal(int $attackMaximal): void {
        $this->attackPokemon->setAttackMaximal($attackMaximal);
    }

    public function getSpecialAttack(): float {
        return $this->attackPokemon->getSpecialAttack();
    }

    public function setSpecialAttack(float $specialAttack): void {
        $this->attackPokemon->setSpecialAttack($specialAttack);
    }

    public function getProbabilitySpecialAttack(): int {
        return $this->attackPokemon->getProbabilitySpecialAttack();
    }

    public function setProbabilitySpecialAttack(int $probabilitySpecialAttack): void {
        $this->attackPokemon->setProbabilitySpecialAttack($probabilitySpecialAttack);
    }

    public function isDead(): bool {
        return $this->hp <= 0;
    }

    public function attack(Pokemon $p): int {
        $attackPoints = rand($this->getAttackMinimal(), $this->getAttackMaximal());
        $isSpecialAttack = rand(1, 100) <= $this->getProbabilitySpecialAttack();

        if ($isSpecialAttack) {
            $damage = $attackPoints * $this->getSpecialAttack();
        } else {
            $damage = $attackPoints;
        }

        $p->setHp($p->getHp() - $damage);
        return $damage;
    }

    public function whoAmI(): void {
        echo "Name: " . $this->name . "\n";
        echo "Image URL: " . $this->url . "\n";
        echo "HP: " . $this->hp . "\n";
        echo "Attack Minimal: " . $this->getAttackMinimal() . "\n";
        echo "Attack Maximal: " . $this->getAttackMaximal() . "\n";
        echo "Special Attack Coefficient: " . $this->getSpecialAttack() . "\n";
        echo "Probability of Special Attack: " . $this->getProbabilitySpecialAttack() . "%\n";
    }
}