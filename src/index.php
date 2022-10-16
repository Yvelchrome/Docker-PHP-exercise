<?php
include 'html_partials/head.php';
?>

<style>
  <?php
  include 'styles/style.css';
  ?>
</style>

<body class="index">

  <div class="title">
    <h1 class="title__h1">DOCKER PHP EXERCISE</h1>
    <h2 class="title__h2">Steven Godin</h2>
  </div>
  <section class="container container--sign-up">
    <form class="container__form" action="./php/connection/sign_up.php" method="post">
      <label class="container__form__label">
        Username
        <input class="container__form__input" name="username" type="text" pattern="^[aA-z0-9_-]{3,15}$" required></label>
      <label class="container__form__label">
        Password
        <input class="container__form__input" name="password" type="password" pattern="^[aA-z0-9_-]{3,15}$" required></label>
      <label class="container__form__label">Admin
        <span class=" container__form--checkbox">
          <input name="admin" type="checkbox">
          <span class="slider round"></span>
        </span>
      </label>
      <input class="container__form__submit" name="submit" type="submit" value="SIGN UP">
    </form>
    <p>Already registered ? <span class="underline">Log in</span></p>
  </section>
  <section class="container container--sign-in">
    <form class="container__form" action="./php/connection/sign_in.php" method="post">
      <label class="container__form__label">
        Username
        <input class="container__form__input" name="username" type="text" pattern="^[aA-z0-9_-]{3,15}$" required></label>
      <label class="container__form__label">
        Password
        <input class="container__form__input" name="password" type="password" pattern="^[aA-z0-9_-]{3,15}$" required></label>
      <input class="container__form__submit" name="connection" type="submit" value="SIGN IN">
    </form>
    <p>First visit ? <span class="underline">Register</span></p>
  </section>
  <script src="scripts/menuToggle.js"></script>
</body>