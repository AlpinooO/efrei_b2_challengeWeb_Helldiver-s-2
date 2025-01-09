<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs"></script>
</head>

<div class="main-container" x-cloak x-data="{ tab: 'Automates' }">
        <div class="species-container">
            <h2 class="species-title">Enemies de la démocracie</h2>
            <ul class="tab-list">
                <li class="tab-item">
                    <a class="tab-link tab-link:hover"
                        :class="{ 'selected' : tab === 'Automates' }" href="#"
                        @click.prevent="tab = 'Automates'">Automates</a>
                </li>
                <li class="tab-item">
                    <a class="tab-link tab-link:hover"
                        :class="{ 'selected' : tab === 'Terminides' }" href="#"
                        @click.prevent="tab = 'Terminides'">Terminides</a>
                </li>
                <li class="tab-item">
                    <a class="tab-link tab-link:hover"
                        :class="{ 'selected' : tab === 'Illuminates' }" href="#"
                        @click.prevent="tab = 'Illuminates'">Illuminates</a>
                </li>
            </ul>
            <div>
                <div class="description-faction" x-show="tab === 'Automates'">
                    <img class="faction-logo" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/7/72/AutomatonoutposticonHD.png"/><p>Robots Cyborgs communiste Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel quia in repellendus, minus error dolorem culpa eaque impedit, eum delectus itaque nemo natus illum veniam esse? Impedit hic quae facere!Loreml lo</p> 
                </div>
                <div class="description-faction" x-show="tab === 'Terminides'">
                    <img class="faction-logo" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/0/04/TerminidNestIcon.png"/> <p>Carburant Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias atque delectus sit quo, quae laudantium est non ducimus earum, excepturi optio praesentium recusandae eligendi quidem fuga obcaecati voluptates, aliquam possimus.</p>
                </div>
                <div class="description-faction" x-show="tab === 'Illuminates'">
                    <img class="faction-logo" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/2/22/Illuminate_Icon.png"/> <p>Squids Lorem Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta quos doloremque corporis quia, porro nostrum temporibus corrupti aperiam sapiente, eius optio alias similique neque sequi deleniti ipsum mollitia magnam quod?</p>
                    
                </div>
            </div>
        </div>  
        <div class="species-container" x-show="tab === 'Automates'">
            <h2 class="species-title">Enemies de la démocracie</h2>
            <div  x-cloak x-data="{ tabTypes: 'Auto1' }">
                <ul class="tab-list">
                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Auto1' }" href="#"
                            @click.prevent="tabTypes = 'Auto1'">Auto1</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Auto2' }" href="#"
                            @click.prevent="tabTypes = 'Auto2'">Auto2</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Auto3' }" href="#"
                            @click.prevent="tabTypes = 'Auto3'">Auto3</a>
                    </li>
                </ul>
                <div>
                    <div class="description-faction" x-show="tabTypes === 'Auto1'">
                        <img class="Enemies-image" src=""/> Mechant Robot 1
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Auto2'">
                        <img class="Enemies-image" src=""/> CarburantAAA
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Auto3'">
                        <img class="Enemies-image" src=""/> 
                        Squidsssss
                    </div>
                </div>
            </div>
        </div>
        <div class="species-container" x-show="tab === 'Terminides'">
            <h2 class="species-title">Enemies de la démocracie</h2>
            <div  x-cloak x-data="{ tabTypes: 'Termi1' }">
                <ul class="tab-list">
                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Termi1' }" href="#"
                            @click.prevent="tabTypes = 'Termi1'">Scavenger</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Termi2' }" href="#"
                            @click.prevent="tabTypes = 'Termi2'">Pouncer</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Termi3' }" href="#"
                            @click.prevent="tabTypes = 'Termi3'">Bile Spitter</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Termi4' }" href="#"
                            @click.prevent="tabTypes = 'Termi4'">Warrior</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Termi5' }" href="#"
                            @click.prevent="tabTypes = 'Termi5'">Hive Guard</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Termi6' }" href="#"
                            @click.prevent="tabTypes = 'Termi6'">Hunter</a>
                    </li>
                    
                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Termi7' }" href="#"
                            @click.prevent="tabTypes = 'Termi7'">Brood Commander</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Termi8' }" href="#"
                            @click.prevent="tabTypes = 'Termi8'">Stalker</a>
                    </li>
                    
                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Termi9' }" href="#"
                            @click.prevent="tabTypes = 'Termi9'">Shrieker</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Termi10' }" href="#"
                            @click.prevent="tabTypes = 'Termi10'">Bile Spewer</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Termi11' }" href="#"
                            @click.prevent="tabTypes = 'Termi11'">Nursing Spewer</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Termi12' }" href="#"
                            @click.prevent="tabTypes = 'Termi12'">Charger</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Termi11' }" href="#"
                            @click.prevent="tabTypes = 'Termi11'">Impaler</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Termi12' }" href="#"
                            @click.prevent="tabTypes = 'Termi12'">Bile Titan</a>
                    </li>
                </ul>
                <div>
                    <div class="description-faction" x-show="tabTypes === 'Termi1'">
                        <img class="Enemies-image" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/1/18/Scavenger.png"/> Mechant Carburant
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi2'">
                        <img class="Enemies-image" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/4/47/Pouncer_1.png"/> CarburantAAA
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi3'">
                        <img class="Enemies-image" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/7/71/Bile_Spitter_II.webp"/> 
                        Gros carburant
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi4'">
                        <img class="Enemies-image" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/c/cb/Warrior_Enemy_Icon.png"/> Mechant Carburant
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi5'">
                        <img class="Enemies-image" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/b/b2/Terminid_Hive_Guard_Updated.png"/> CarburantAAA
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi6'">
                        <img class="Enemies-image" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/7/79/Hunter_Enemy_Icon.png"/> 
                        Gros carburant
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi7'">
                        <img class="Enemies-image" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/a/aa/Brood_Commander_Enemy_Icon.png"/> Mechant Carburant
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi8'">
                        <img class="Enemies-image" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/1/16/Stalker_Enemy_Icon.png"/> CarburantAAA
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi9'">
                        <img class="Enemies-image" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/9/92/ShriekerRender.png"/> 
                        Gros carburant
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi10'">
                        <img class="Enemies-image" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/8/8f/Bile_Spewer_Enemy_Icon.png"/> Mechant Carburant
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi11'">
                        <img class="Enemies-image" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/5/5d/Nursing_Spewer_1.png/> CarburantAAA
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi12'">
                        <img class="Enemies-image" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/9/98/Behemoth_Charger_Enemy_Icon.png"/> 
                        Gros carburant
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi13'">
                        <img class="Enemies-image" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/3/31/Impaler.png"/> CarburantAAA
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi14'">
                        <img class="Enemies-image" src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/9/9e/Bile_Titan_II.webp"/> 
                        Gros carburant
                    </div>
                </div>
            </div>
        </div>
        <div class="species-container" x-show="tab === 'Illuminates'">
            <h2 class="species-title">Enemies de la démocracie</h2>
            <div  x-cloak x-data="{ tabTypes: 'Illumi1' }">
                <ul class="tab-list">
                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Illumi1' }" href="#"
                            @click.prevent="tabTypes = 'Illumi1'">Illumi1</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link"
                            :class="{ 'selected' : tabTypes === 'Illumi2' }" href="#"
                            @click.prevent="tabTypes = 'Illumi2'">Illumi2</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link tab-link:hover"
                            :class="{ 'selected' : tabTypes === 'Illumi3' }" href="#"
                            @click.prevent="tabTypes = 'Illumi3'">Illumi3</a>
                    </li>
                </ul>
                <div>
                    <div class="description-faction" x-show="tabTypes === 'Illumi1'">
                        <img class="Enemies-image" src=""/> Mechant citoyen
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Illumi2'">
                        <img class="Enemies-image" src=""/> tentacu Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique eaque reiciendis libero atque minus, necessitatibus sed eum dicta fugiat! Possimus sed quasi ut, ipsam dolorem enim quos dolorum deleniti laudantium? Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolores quisquam veritatis ipsam vero quis recusandae! Nemo consequuntur excepturi dolorem animi laboriosam dolores sint ipsa. Ratione magnam dignissimos ipsa blanditiis.lo Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore dignissimos beatae perspiciatis voluptate quaerat illo veniam voluptatibus, harum at eum reprehenderit, autem velit quia magni maxime. Ullam numquam sit fugit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ex nobis pariatur non reiciendis explicabo repellat ratione, beatae vero optio amet, accusantium tempore excepturi mollitia facilis recusandae, maxime laudantium quas? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam repellat in asperiores error aspernatur saepe necessitatibus libero non eligendi, sit placeat illum commodi sunt aut corporis omnis doloremque consequatur at? tentacu Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique eaque reiciendis libero atque minus, necessitatibus sed eum dicta fugiat! Possimus sed quasi ut, ipsam dolorem enim quos dolorum deleniti laudantium? Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolores quisquam veritatis ipsam vero quis recusandae! Nemo consequuntur excepturi dolorem animi laboriosam dolores sint ipsa. Ratione magnam dignissimos ipsa blanditiis.lo Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore dignissimos beatae perspiciatis voluptate quaerat illo veniam voluptatibus, harum at eum reprehenderit, autem velit quia magni maxime. Ullam numquam sit fugit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ex nobis pariatur non reiciendis explicabo repellat ratione, beatae vero optio amet, accusantium tempore excepturi mollitia facilis recusandae, maxime laudantium quas? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam repellat in asperiores error aspernatur saepe necessitatibus libero non eligendi, sit placeat illum commodi sunt aut corporis omnis doloremque consequatur at? tentacu Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique eaque reiciendis libero atque minus, necessitatibus sed eum dicta fugiat! Possimus sed quasi ut, ipsam dolorem enim quos dolorum deleniti laudantium? Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolores quisquam veritatis ipsam vero quis recusandae! Nemo consequuntur excepturi dolorem animi laboriosam dolores sint ipsa. Ratione magnam dignissimos ipsa blanditiis.lo Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore dignissimos beatae perspiciatis voluptate quaerat illo veniam voluptatibus, harum at eum reprehenderit, autem velit quia magni maxime. Ullam numquam sit fugit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ex nobis pariatur non reiciendis explicabo repellat ratione, beatae vero optio amet, accusantium tempore excepturi mollitia facilis recusandae, maxime laudantium quas? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam repellat in asperiores error aspernatur saepe necessitatibus libero non eligendi, sit placeat illum commodi sunt aut corporis omnis doloremque consequatur at? tentacu Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique eaque reiciendis libero atque minus, necessitatibus sed eum dicta fugiat! Possimus sed quasi ut, ipsam dolorem enim quos dolorum deleniti laudantium? Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolores quisquam veritatis ipsam vero quis recusandae! Nemo consequuntur excepturi dolorem animi laboriosam dolores sint ipsa. Ratione magnam dignissimos ipsa blanditiis.lo Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore dignissimos beatae perspiciatis voluptate quaerat illo veniam voluptatibus, harum at eum reprehenderit, autem velit quia magni maxime. Ullam numquam sit fugit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ex nobis pariatur non reiciendis explicabo repellat ratione, beatae vero optio amet, accusantium tempore excepturi mollitia facilis recusandae, maxime laudantium quas? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam repellat in asperiores error aspernatur saepe necessitatibus libero non eligendi, sit placeat illum commodi sunt aut corporis omnis doloremque consequatur at?
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Illumi3'">
                        <img class="Enemies-image" src=""/> 
                        Bad squids
                    </div>
                </div>
            </div>
        </div>
    </div>