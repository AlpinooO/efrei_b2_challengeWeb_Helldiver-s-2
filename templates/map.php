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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="javascripts/script.js"></script>
</head>
<body>
<div>
<h1>Rechercher une planète</h1>
    <form method="get">
        <input type="text" name="search" placeholder="Rechercher une planète..." value="<?= htmlspecialchars($searchQuery) ?>">
        <button type="submit">Rechercher</button>
    </form>

    <ul>
        <?php if (!empty($filteredPlanets)): ?>
            <?php foreach ($filteredPlanets as $planet): ?>
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
    </ul>
</div>

    <div id="map-container">
        <h3>Le programmeur est parti se battre pour la démocratie</h3>
    </div>

    
    <h1>La carte intéractive remplacant fait par le ministère de la vérité</h1>
<div>
    <a href="https://hd2galaxy.com/">La carte intéractive démocrate.</a></h2>
</div>
<script src="javascripts/script.js"></script>
</body>
</html>


