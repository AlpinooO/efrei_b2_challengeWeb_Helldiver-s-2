<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status de la guerre</title>
    <script src="javascripts/script.js"></script>
</head>
<body>
    <h1>Status de la guerre</h1>
    <div id="map-container" class="map-info">
        <h3>Loading latest news...</h3>
    </div>
    <?php if (isset($data) && count($data) > 0): ?>
            <ul>
                <?php foreach ($data as $planet): ?>
                    <li>
                        <strong><?= htmlspecialchars($planet['name']); ?></strong>: <?= htmlspecialchars($planet['status']); ?>
                        <br>
                        Coordinates: <?= htmlspecialchars($planet['coordinates']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <h3>No data available</h3>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
