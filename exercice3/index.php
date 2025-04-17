<?php
require_once 'autoloader.php';

$dracufeu = new PokemonFeu(
    "Dracaufeu Gigamax",
    "exercice3/pokemonImg/dracaufeu.png",
    200,
    10,
    100,
    2,
    20
);

$pikachu = new Pokemon(
    "Pikachu",
    "exercice3/pokemonImg/pikachu.png",
    200,
    30,
    80,
    4,
    20
);
$carapuce = new PokemonEau("Carapuce", "exercice3/pokemonImg/carapuce.png", 200, 15, 80, 1.5, 30);
$bulbizarre = new PokemonPlante("Bulbizarre", "exercice3/pokemonImg/bulbizarre.png", 200, 20, 70, 1.8, 25);
$combattant = [[$dracufeu, $pikachu],[$carapuce, $bulbizarre],[$pikachu, $carapuce],[$bulbizarre, $dracufeu]];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Battle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php foreach ($combattant as $pokemons): ?>
    <div class="container my-5">
        <div class="alert alert-primary row">les combattants</div>
        <?php
        $round = 1;
        $b = true;
        while ($b): ?>
            <div class="row">
                <?php foreach ($pokemons as $pokemon): ?>
                    <div class="card col">
                        <div class="card-header">
                        <p><?= $pokemon->getName() ?> <img src="<?= $pokemon->getUrl() ?>" width="100px" height="100px"></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Points: <?= $pokemon->getHp() ?></li>
                            <li class="list-group-item">Min Attack Points: <?= $pokemon->getAttackMinimal() ?></li>
                            <li class="list-group-item">Max Attack Points: <?= $pokemon->getAttackMaximal() ?></li>
                            <li class="list-group-item">Special Attack: <?= $pokemon->getSpecialAttack() ?></li>
                            <li class="list-group-item">Probability Special Attack: <?= $pokemon->getProbabilitySpecialAttack() ?></li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if(!$pokemons[0]->isDead() && !$pokemons[1]->isDead()):?>
            <div class="alert alert-danger row">
                <p>Round <?= $round ?></p>
                <div class="alert alert-secondary row">
                    <p class="col-6"><?= $pokemons[0]->attack($pokemons[1]) ?></p>
                    <p class="col-6"><?= $pokemons[1]->attack($pokemons[0]); ?></p>
                </div>
            </div>
            <?php else: $b=false?>
            <?php endif ?>
        <?php
            $round++;
            endwhile;
        ?>
        <div class="row">
            <?php $winner = $pokemons[0]->isDead() ? $pokemons[1] : $pokemons[0];?>
            <div class="alert alert-success">Le vainqueur est <img src="<?= $winner->getUrl() ?>" width="100px" height="100px"></div>
        </div>
    </div>
    <?php endforeach; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>