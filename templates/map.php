<?php
$jsonData = file_get_contents('assets/json/Planet.json'); 
$planets = json_decode($jsonData, true);

$searchQuery = isset($_GET['search']) ? strtolower($_GET['search']) : ''; 
$filteredPlanets = [];


foreach ($planets as $planet) {
    if (
        strpos(strtolower($planet['name']), $searchQuery) !== false ||
        strpos(strtolower($planet['sector']), $searchQuery) !== false ||
        (!empty($planet['biome']['description']) && strpos(strtolower($planet['biome']['description']), $searchQuery) !== false) ||
        (!empty($planet['environmentals']) && array_filter($planet['environmentals'], function ($env) use ($searchQuery) {
            return strpos(strtolower($env['name']), $searchQuery) !== false ||
            strpos(strtolower($env['description']), $searchQuery) !== false;
        }))
    ) {
        $filteredPlanets[] = $planet;
    }
}
?>

<div>
<h1>Rechercher une planète</h1>
    <form method="get">
        <input class="search" type="text" name="search" placeholder="Rechercher une planète..." value="<?= htmlspecialchars($searchQuery) ?>">
        <button class="search-button" type="submit">Rechercher</button>
    </form>

    <ul>
    <?php 
    // Limiter à 5 premières planètes
    $limitedPlanets = array_slice($filteredPlanets, 0, 5);
    $remainingPlanets = array_slice($filteredPlanets, 5);
    ?>

    <!-- Affichage des 5 premières planètes -->
    <?php if (!empty($limitedPlanets)): ?>
        <?php foreach ($limitedPlanets as $planet): ?>
            <li class="planet-item">
                <strong><?= htmlspecialchars($planet['name']) ?></strong> 
                <p><strong>Sector : </strong><?= htmlspecialchars($planet['sector']) ?></p>
                <?php if (!empty($planet['biome'])): ?>
                    <p><strong>Biome : </strong><?= htmlspecialchars($planet['biome']['slug']) ?></p>
                <?php endif; ?>
                <?php if (!empty($planet['environmentals'])): ?>
                    <ul>
                        <?php foreach ($planet['environmentals'] as $env): ?>
                            <li>
                                <strong><?= htmlspecialchars($env['name']) ?></strong>: <?= htmlspecialchars($env['description']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>Aucune planète trouvée.</li>
    <?php endif; ?>

    <!-- Affichage des planètes restantes, masquées par défaut -->
    <?php if (!empty($remainingPlanets)): ?>
        <ul id="remaining-planets" style="display: none;">
            <?php foreach ($remainingPlanets as $planet): ?>
                <li class="planet-item">
                    <strong><?= htmlspecialchars($planet['name']) ?></strong> 
                    <p><strong>Sector : </strong><?= htmlspecialchars($planet['sector']) ?></p>
                    <?php if (!empty($planet['biome'])): ?>
                        <p><strong>Biome : </strong><?= htmlspecialchars($planet['biome']['slug']) ?></p>
                    <?php endif; ?>
                    <?php if (!empty($planet['environmentals'])): ?>
                        <ul>
                            <?php foreach ($planet['environmentals'] as $env): ?>
                                <li>
                                    <strong><?= htmlspecialchars($env['name']) ?></strong>: <?= htmlspecialchars($env['description']) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- Boutons pour afficher plus ou moins de planètes -->
     <div class="planet-button-container">
    <?php if (!empty($remainingPlanets)): ?>
        <button class="planet-button" id="show-more-btn" onclick="showMorePlanets()">Voir plus de planètes</button>
        <button class="planet-button" id="show-less-btn" onclick="showLessPlanets()" style="display: none;">Voir moins de planètes</button>
    <?php endif; ?>
    </div>

</ul>


</div>



    
<h1>La carte intéractive faite par le ministère de la vérité</h1>
<div class="link-container">
    <a class="link" href="https://hd2galaxy.com/">La carte intéractive démocrate.</a>
</div>
<script src="javascripts/script.js"></script>
</body>
</html>


