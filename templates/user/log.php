<div class="container" id="container">
  <div class="form-container sign-up">
    <form action="/log" method="post">
      <h1>Create Account</h1>
      <div class="social-icons">
        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-steam"></i></a>
      </div>
      <span>or use your email for registeration</span>
      <input type="hidden" name="register" value="register" />
      <input type="email" name="email" placeholder="email" />
      <input type="text" name="name" placeholder="name" />
      <input type="password" name="password" placeholder="password" />
      <input type="submit" class="submit" value="Sign Up" />
    </form>
  </div>
  <div class="form-container sign-in">
    <form action="/log" method="post">
      <h1>Sign In</h1>
      <div class="social-icons">
        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-steam"></i></a>
      </div>
      <span>or use your email password</span>
      <input type="hidden" name="register" value="login" />
      <input type="email" name="email" placeholder="email" />
      <input type="password" name="password" placeholder="password" />
      <a href="#">Forget Your Password?</a>
      <input type="submit" class="submit" value="Sign In" />
    </form>
  </div>
  <div class="toggle-container">
    <div class="toggle">
      <div class="toggle-panel toggle-left">
        <h1>Welcome Back!</h1>
        <p>Enter your personal details to use all of site features</p>
        <button class="hidden" id="login">Sign In</button>
      </div>
      <div class="toggle-panel toggle-right">
        <h1>Hello, Friend!</h1>
        <p>Register with your personal details to use all of site features</p>
        <button class="hidden" id="register">Sign Up</button>
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


<script src="/javascripts/script.js"></script>