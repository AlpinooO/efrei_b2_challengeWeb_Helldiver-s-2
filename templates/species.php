<?php
$jsonFilePath = __DIR__ . '/../public/assets/json/Species.json';
$jsonData = file_get_contents($jsonFilePath);

if ($jsonData === false) {
    die("Error: Unable to read JSON file.");
}

$data = json_decode($jsonData, true);

if ($data === null) {
    die("Error: Unable to decode JSON data.");
}
?>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs"></script>
</head>

<div class="main-container" x-cloak x-data="{ tab: 'Automates' }">
    <div class="species-container">
        <h2 class="species-title">Enemies de la démocracie</h2>
        <ul class="tab-list-fac">
            <?php foreach ($data['factions'] as $faction): ?>
                <li class="tab-item">
                    <button class="tab-link"
                        :class="{ 'selected' : tab === '<?= $faction['name'] ?>' }"
                        @click.prevent="tab = '<?= $faction['name'] ?>'"><?= $faction['name'] ?></button>
                </li>
            <?php endforeach; ?>
        </ul>
        <div>
            <?php foreach ($data['factions'] as $faction): ?>
                <div class="description-faction" x-show="tab === '<?= $faction['name'] ?>'">
                    <img class="faction-logo" src="<?= $faction['description']['image'] ?>"/>
                    <p><?= $faction['description']['text'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php foreach ($data['factions'] as $faction): ?>
        <div class="species-container" x-show="tab === '<?= $faction['name'] ?>'">
            <h2 class="species-title">Enemies de la démocracie</h2>
            <div x-cloak x-data="{ tabTypes: '<?= $faction['units'][0]['name'] ?>' }">
                <ul class="tab-list">
                    <?php foreach ($faction['units'] as $unit): ?>
                        <li class="tab-item">
                            <button class="tab-link"
                                :class="{ 'selected' : tabTypes === '<?= $unit['name'] ?>' }"
                                @click.prevent="tabTypes = '<?= $unit['name'] ?>'"><?= $unit['name'] ?></button>
                        </li>
                    <?php endforeach; ?>
                </ul>
                
                    <?php foreach ($faction['units'] as $unit): ?>
                        <div class="description-faction" x-show="tabTypes === '<?= $unit['name'] ?>'">
                            <img class="Enemies-image" src="<?= $unit['image'] ?>"/> <p class="description-units"><?= $unit['description'] ?></p>
                        </div>
                    <?php endforeach; ?>
                
            </div>
        </div>
    <?php endforeach; ?>
</div>