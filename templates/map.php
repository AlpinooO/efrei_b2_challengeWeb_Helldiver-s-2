<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    <script src="javascripts/script.js"></script>
</head>
<body>
<div x-data="planetSearch()" x-init="init()" class="search-container">
        <input 
            type="text" 
            placeholder="Rechercher une planète ou un secteur..." 
            x-model="searchQuery"
            class="search-input"
        />
        <button @click="search()" class="search-button">Rechercher</button>



         <ul class="planet-list">
            <template x-for="planet in filteredPlanets" :key="planet.name">
                <li class="planet-item">
                    <div>
                        <h4 x-text="planet.name"></h4>
                        <p>Secteur : <span x-text="planet.sector"></span></p>
                        <p x-text="planet.biome ? planet.biome.description : 'Aucune information sur le biome'"></p>
                        <div>
                            <h5>Dangers environnementaux :</h5>
                            <ul>
                                <template x-for="env in planet.environmentals" :key="env.name">
                                    <li>
                                        <strong x-text="env.name"></strong>: 
                                        <span x-text="env.description"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </li>
            </template>
        </ul>
    <div id="map-container">
        <h3>Le programmeur est parti se battre pour la démocratie</h3>
    </div>

    
    <h1>La carte intéractive remplacant fait par le ministère de la vérité</h1>

<a href="https://hd2galaxy.com/">La carte intéractive démocrate.</a></h2>
    </div>
</div>
<script src="javascripts/script.js"></script>
</body>
</html>


