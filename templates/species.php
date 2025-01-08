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
                    <img src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/7/72/AutomatonoutposticonHD.png"/><p>Robots Cyborgs communiste Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel quia in repellendus, minus error dolorem culpa eaque impedit, eum delectus itaque nemo natus illum veniam esse? Impedit hic quae facere!Loreml lo</p> 
                </div>
                <div class="description-faction" x-show="tab === 'Terminides'">
                    <img src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/0/04/TerminidNestIcon.png"/> <p>Carburant Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias atque delectus sit quo, quae laudantium est non ducimus earum, excepturi optio praesentium recusandae eligendi quidem fuga obcaecati voluptates, aliquam possimus.</p>
                </div>
                <div class="description-faction" x-show="tab === 'Illuminates'">
                    <img src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/2/22/Illuminate_Icon.png"/> <p>Squids Lorem Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta quos doloremque corporis quia, porro nostrum temporibus corrupti aperiam sapiente, eius optio alias similique neque sequi deleniti ipsum mollitia magnam quod?</p>
                    
                </div>
            </div>
        </div>  
        <div class="species-container" x-show="tab === 'Automates'">
            <h2 class="species-title">Enemies de la démocracie</h2>
            <div  x-cloak x-data="{ tabTypes: 'Auto1' }">
                <ul class="tab-list">
                    <li class="tab-item">
                        <a class="tab-link tab-link:hover"
                            :class="{ 'selected' : tabTypes === 'Auto1' }" href="#"
                            @click.prevent="tabTypes = 'Auto1'">Auto1</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link tab-link:hover"
                            :class="{ 'selected' : tabTypes === 'Auto2' }" href="#"
                            @click.prevent="tabTypes = 'Auto2'">Auto2</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link tab-link:hover"
                            :class="{ 'selected' : tabTypes === 'Auto3' }" href="#"
                            @click.prevent="tabTypes = 'Auto3'">Auto3</a>
                    </li>
                </ul>
                <div>
                    <div class="description-faction" x-show="tabTypes === 'Auto1'">
                        <img src=""/> Mechant Robot 1
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Auto2'">
                        <img src=""/> CarburantAAA
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Auto3'">
                        <img src=""/> 
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
                        <a class="tab-link tab-link:hover"
                            :class="{ 'selected' : tabTypes === 'Termi1' }" href="#"
                            @click.prevent="tabTypes = 'Termi1'">Termi1</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link tab-link:hover"
                            :class="{ 'selected' : tabTypes === 'Termi2' }" href="#"
                            @click.prevent="tabTypes = 'Termi2'">Termi2</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link tab-link:hover"
                            :class="{ 'selected' : tabTypes === 'Termi3' }" href="#"
                            @click.prevent="tabTypes = 'Termi3'">Termi3</a>
                    </li>
                </ul>
                <div>
                    <div class="description-faction" x-show="tabTypes === 'Termi1'">
                        <img src=""/> Mechant Carburant
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi2'">
                        <img src=""/> CarburantAAA
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Termi3'">
                        <img src=""/> 
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
                        <a class="tab-link tab-link:hover"
                            :class="{ 'selected' : tabTypes === 'Illumi1' }" href="#"
                            @click.prevent="tabTypes = 'Illumi1'">Illumi1</a>
                    </li>

                    <li class="tab-item">
                        <a class="tab-link tab-link:hover"
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
                        <img src=""/> Mechant citoyen
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Illumi2'">
                        <img src=""/> tentacu Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique eaque reiciendis libero atque minus, necessitatibus sed eum dicta fugiat! Possimus sed quasi ut, ipsam dolorem enim quos dolorum deleniti laudantium? Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolores quisquam veritatis ipsam vero quis recusandae! Nemo consequuntur excepturi dolorem animi laboriosam dolores sint ipsa. Ratione magnam dignissimos ipsa blanditiis.lo Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore dignissimos beatae perspiciatis voluptate quaerat illo veniam voluptatibus, harum at eum reprehenderit, autem velit quia magni maxime. Ullam numquam sit fugit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ex nobis pariatur non reiciendis explicabo repellat ratione, beatae vero optio amet, accusantium tempore excepturi mollitia facilis recusandae, maxime laudantium quas? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam repellat in asperiores error aspernatur saepe necessitatibus libero non eligendi, sit placeat illum commodi sunt aut corporis omnis doloremque consequatur at?
                    </div>

                    <div class="description-faction" x-show="tabTypes === 'Illumi3'">
                        <img src=""/> 
                        Bad squids
                    </div>
                </div>
            </div>
        </div>
    </div>