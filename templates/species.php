<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs"></script>
</head>

<div class="" x-cloak x-data="{ tab: 'Automates' }">
    <h2 class="">Enemies de la démocracie</h2>
    <ul class="">
        <li class="">
            <a class=""
                :class="{ 'selected' : tab === 'Automates' }" href="#"
                @click.prevent="tab = 'Automates'">Automates</a>
        </li>
        <li class="">
            <a class=""
                :class="{ 'selected' : tab === 'Terminides' }" href="#"
                @click.prevent="tab = 'Terminides'">Terminides</a>
        </li>
        <li class="">
            <a class=""
                :class="{ 'selected' : tab === 'Illuminates' }" href="#"
                @click.prevent="tab = 'Illuminates'">Illuminates</a>
        </li>
    </ul>
    <div>
        <div x-show="tab === 'Automates'">
            <img src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/3/34/Automaton_Flag.png"/> Robots Cyborgs communiste
        </div>
        <div x-show="tab === 'Terminides'">
            <img src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/0/04/TerminidNestIcon.png"/> Carburant
        </div>
        <div x-show="tab === 'Illuminates'">
            <img src="https://static.wikia.nocookie.net/helldivers_gamepedia/images/2/22/Illuminate_Icon.png"/> 
            Squids
        </div>
    </div>


    <div>  
        <div x-show="tab === 'Automates'">
            <h2 class="">Enemies de la démocracie</h2>
            <div class="" x-cloak x-data="{ tabTypes: 'Auto1' }">
                <ul class="">
                    <li class="">
                        <a class=""
                            :class="{ 'selected' : tabTypes === 'Auto1' }" href="#"
                            @click.prevent="tabTypes = 'Auto1'">Auto1</a>
                    </li>

                    <li class="">
                        <a class=""
                            :class="{ 'selected' : tabTypes === 'Auto2' }" href="#"
                            @click.prevent="tabTypes = 'Auto2'">Auto2</a>
                    </li>

                    <li class="">
                        <a class=""
                            :class="{ 'selected' : tabTypes === 'Auto3' }" href="#"
                            @click.prevent="tabTypes = 'Auto3'">Auto3</a>
                    </li>
                </ul>
                <div>
                    <div x-show="tabTypes === 'Auto1'">
                        <img src=""/> Mechant Robot 1
                    </div>

                    <div x-show="tabTypes === 'Auto2'">
                        <img src=""/> CarburantAAA
                    </div>

                    <div x-show="tabTypes === 'Auto3'">
                        <img src=""/> 
                        Squidsssss
                    </div>
                </div>
            </div>
        </div>
        <div x-show="tab === 'Terminides'">
            <h2 class="">Enemies de la démocracie</h2>
            <div class="" x-cloak x-data="{ tabTypes: 'Termi1' }">
                <ul class="">
                    <li class="">
                        <a class=""
                            :class="{ 'selected' : tabTypes === 'Termi1' }" href="#"
                            @click.prevent="tabTypes = 'Termi1'">Termi1</a>
                    </li>

                    <li class="">
                        <a class=""
                            :class="{ 'selected' : tabTypes === 'Termi2' }" href="#"
                            @click.prevent="tabTypes = 'Termi2'">Termi2</a>
                    </li>

                    <li class="">
                        <a class=""
                            :class="{ 'selected' : tabTypes === 'Termi3' }" href="#"
                            @click.prevent="tabTypes = 'Termi3'">Termi3</a>
                    </li>
                </ul>
                <div>
                    <div x-show="tabTypes === 'Termi1'">
                        <img src=""/> Mechant Carburant
                    </div>

                    <div x-show="tabTypes === 'Termi2'">
                        <img src=""/> CarburantAAA
                    </div>

                    <div x-show="tabTypes === 'Termi3'">
                        <img src=""/> 
                        Gros carburant
                    </div>
                </div>
            </div>
        </div>
        <div x-show="tab === 'Illuminates'">
            <h2 class="">Enemies de la démocracie</h2>
            <div class="" x-cloak x-data="{ tabTypes: 'Illumi1' }">
                <ul class="">
                    <li class="">
                        <a class=""
                            :class="{ 'selected' : tabTypes === 'Illumi1' }" href="#"
                            @click.prevent="tabTypes = 'Illumi1'">Illumi1</a>
                    </li>

                    <li class="">
                        <a class=""
                            :class="{ 'selected' : tabTypes === 'Illumi2' }" href="#"
                            @click.prevent="tabTypes = 'Illumi2'">Illumi2</a>
                    </li>

                    <li class="">
                        <a class=""
                            :class="{ 'selected' : tabTypes === 'Illumi3' }" href="#"
                            @click.prevent="tabTypes = 'Illumi3'">Illumi3</a>
                    </li>
                </ul>
                <div>
                    <div x-show="tabTypes === 'Illumi1'">
                        <img src=""/> Mechant citoyen
                    </div>

                    <div x-show="tabTypes === 'Illumi2'">
                        <img src=""/> tentacu
                    </div>

                    <div x-show="tabTypes === 'Illumi3'">
                        <img src=""/> 
                        Bad squids
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>