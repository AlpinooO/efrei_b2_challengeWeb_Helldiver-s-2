<div class="container" id="container">
    <div class="form-container sign-up">
        <form action="/log" method="post">
            <h1>Créer un compte</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-steam"></i></a>
            </div>
            <span>ou utiliser votre email pour céer votre compte</span>
            <input type="hidden" name="register" value="register" />
            <input type="email" name="email" placeholder="email" />
            <input type="text" name="name" placeholder="name" />
            <input type="password" name="password" placeholder="password" />
            <input type="submit" class="submit" value="S'enregistrer" />
        </form>
    </div>
    <div class="form-container sign-in">
        <form action="/log" method="post">
            <h1>Connexion</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-steam"></i></a>
            </div>
            <span>ou utiliser votre email et mot de passe</span>
            <input type="hidden" name="register" value="login" />
            <input type="email" name="email" placeholder="email" />
            <input type="password" name="password" placeholder="password" />
            <a href="#">Mot de passe oublié?</a>
            <input type="submit" class="submit" value="Se connecter" />
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Bon retour parmi nous!</h1>
                <p>Entrez vos données personnelles pour profiter de toutes les fonctionnalités</p>
                <button class="hidden" id="login">Se connecter</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Bienvenu citoyen!</h1>
                <p>Enregistrez vous avec vos données personnelles pour profiter de toutes les fonctionnalités</p>
                <button class="hidden" id="register">S'enregistrer</button>
            </div>
        </div>
    </div>
</div>
<?php if (isset($data['error'])) {
  echo '<p class="error">' . $data['error'] . '</p>';
}
if (isset($data['success'])) {
  echo '<p class="success">' . $data['success'] . '</p>';
}
?>


<script src="/javascripts/log.js"></script>