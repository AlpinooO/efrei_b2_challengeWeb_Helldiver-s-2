
<div id="root">
        <div class="logo-container">
            <img class="logo" src="./data/Images/Helldivers_2_logo.webp">
        </div>

        <h1 class="title">
            STRATAGEM HERO ONLINE
        </h1>

        <div class="interactable-center-container" id="interactable-center-container">
            <h2 class="stratagem-name" id="stratagem-name">
                HI :) You shouldn't see this
            </h2>

            <table class="stratagems-table" id="stratagems-table">
                <tr>
                    <td><img class="stratagem-icon" id="stratagem-icon-0" src="data/Images/stratagem Icons/Strat Resupply mk1.png"></td>
                    <td><img class="stratagem-icon" id="stratagem-icon-1" src="data/Images/stratagem Icons/Strat Resupply mk1.png"></td>
                    <td><img class="stratagem-icon" id="stratagem-icon-2" src="data/Images/stratagem Icons/Strat Resupply mk1.png"></td>
                    <td><img class="stratagem-icon" id="stratagem-icon-3" src="data/Images/stratagem Icons/Strat Resupply mk1.png"></td>
                </tr>
            </table>

            <table class="arrows-table" id="arrows-container">
                <tr>
                    <td><img class="arrow-image" src="data/Images/Arrows/Arrow_4_U.png"></td>
                    <td><img class="arrow-image" src="data/Images/Arrows/Arrow_1_D.png"></td>
                    <td><img class="arrow-image" src="data/Images/Arrows/Arrow_2_L.png"></td>
                    <td><img class="arrow-image" src="data/Images/Arrows/Arrow_3_R.png"></td>
                </tr>
            </table>

            <div class="time-remaining-container">
                <div id="time-remaining-bar"></div>
            </div>

            <div id="mobile-button-container" hidden="hidden">
                <button onclick="keypress('ArrowUp')" class="mobile-button">🡅</button>
                <table class="arrows-table">
                    <tr>
                        <td><button onclick="keypress('ArrowLeft')" class="mobile-button">🡄</button></td>
                        <td><button onclick="keypress('ArrowDown')" class="mobile-button">🡇</button></td>
                        <td><button onclick="keypress('ArrowRight')" class="mobile-button">🡆</button></td>
                    </tr>
                </table>
            </div>  
        </div>

        <div class="game-over-popup" id="game-over-popup" hidden="hidden">
            <h1 class="title" id="score-readout">SCORE: ##</h1>
            <p id="completed-strategems-readout"></p>
            <div>
                
                <button onclick="copyShare()" id="share-button">
                    Share your score!
                </button>

                <br>
                
                <button onclick="copyShare(true)" id="share-button-spamless">
                    Spam Filter Compatible Share
                </button>

            </div>
            <br>
            <button onclick="window.location.reload()" id="refresh-button">
                Reinforce! (Play Again)
                <table class="arrows-table" id="refresh-arrows-container">
                    <tr>
                        <td><img class="arrow-image" src="data/Images/Arrows/Arrow_4_U.png"></td>
                        <td><img class="arrow-image" src="data/Images/Arrows/Arrow_1_D.png"></td>
                        <td><img class="arrow-image" src="data/Images/Arrows/Arrow_2_L.png"></td>
                        <td><img class="arrow-image" src="data/Images/Arrows/Arrow_3_R.png"></td>
                    </tr>
                </table>
            </button>
        </div>

        <div class="game-config-popup-container" id="game-config-popup">
            <div class="game-config-popup">
                <p class="game-config-popup__title">Change your keybinds</p>
                <div class="game-config-popup__key-bindings">
                    <div class="key-bind-container key-bind-container--up">
                        <p>
                            <img class="arrow-image" src="data/Images/Arrows/U - Copy.png">
                        </p>
                        <input name="up" type="text">
                    </div>
                    <div class="key-bind-container key-bind-container--left">
                        <p>
                            <img class="arrow-image" src="data/Images/Arrows/L - Copy.png">
                        </p>
                        <input name="left" type="text">
                    </div>
                    <div class="key-bind-container key-bind-container--down">
                        <p>
                            <img class="arrow-image" src="data/Images/Arrows/D - Copy.png">
                        </p>
                        <input name="down" type="text">
                    </div>
                    <div class="key-bind-container key-bind-container--right">
                        <p>
                            <img class="arrow-image" src="data/Images/Arrows/R - Copy.png">
                        </p>
                        <input name="right" type="text">
                    </div>
                </div>
                <div class="game-config-popup__action-buttons">
                    <button role="button" data-action-type="game-config--save" class="button save-button">save</button>
                    <button role="button" data-action-type="game-config--close" class="button close-button">close</button>
                </div>
            </div>
        </div>
        <div class="info">
            <div class="info__config-actions-container">
                <button role="button" data-action-type="game-config--open" class="button">change keybinds</button>
            </div>
            <p class="larger-info">
                Check out Helldivers 2 on <a href="https://store.steampowered.com/app/553850/HELLDIVERS_2/" target="_blank">Steam</a> and <a href="https://www.playstation.com/en-us/games/helldivers-2/" target="_blank">Playstation</a>!<br>
            </p>
            Made with 💖 by <a href="https://github.com/CombustibleToast" target="_blank">CombustibleToast</a><br> 
            Additional contributions by 
            <a href="https://github.com/CombustibleToast/StratagemHeroOnline/pulls?q=is%3Apr+author%3ASavageCore" target="_blank">SavageCore</a>, 
            <a href="https://github.com/CombustibleToast/StratagemHeroOnline/pulls?q=is%3Apr+author%3Arrliu" target="_blank">rrliu</a>, 
            <a href="https://github.com/CombustibleToast/StratagemHeroOnline/pulls?q=is%3Apr+author%3AAlexander-ilyin3" target="_blank">Alexander-ilyin3</a>, 
            <a href="https://github.com/CombustibleToast/StratagemHeroOnline/pulls?q=is%3Apr+author%3AHAYD323" target="_blank">HAYD323</a>, 
            and <a href="https://github.com/nvigneux/Helldivers-2-Stratagems-icons-svg" target="_blank">nvigneux</a> for the images. Thank you! <br>
            Play the original Helldivers 1 version <a href="Old/index.html">here</a>.<br>
            View the source code <a href="https://github.com/CombustibleToast/StratagemHeroOnline" target="_blank">on Github</a> or report an issue <a href="https://github.com/CombustibleToast/StratagemHeroOnline/issues" target="_blank">here</a><br>
            Not affiliated with Helldivers, Arrowhead Studios, or Playstation Studios. Please don't sue me :)<br>
        </div>
    </div>4
</body>
<script type="text/javascript" src="./data/HD2-Sequences.json"></script>
<script type="text/javascript" src="./script.js"></script>