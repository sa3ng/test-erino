<?php

include_once '../phpScripts/globals.php';
require_once '../phpScripts/register_functions.php';

if (array_key_exists("REQUEST_METHOD", $_SERVER))
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        registerUser(
            $LOCALHOST_CREDENTIALS,
            [
                "email_register" => $_POST["email-register"],
                "user_register" => $_POST["user-register"],
                "pass_register" => $_POST["pass-register"],
            ]
        );
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- JQUERY 3.6 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="../resources/js/register.js"></script>

    <!-- CSS FILE -->
    <link rel="stylesheet" href="../resources/css/style.css">
</head>

<section class="hero is-link">
    <div class="hero-body">
      <p class="title" style="text-align: center;">
       Voters' Companion
      </p>
      <p class="subtitle" style="text-align: center;">
       <em>Your one stop shop for voting and candidate information!</em> 
      </p>
    </div>
  </section>


<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="Home.html">
      <img src="../resources/images/VC-logo" width="112" height="25">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="Home.html">
        Home
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="Candidates.html">
          Candidates
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            Presidential
          </a>
          <a class="navbar-item">
            Vice Presidential
          </a>
          <a class="navbar-item">
            Senatorial
          </a>
   
        </div>
         </div>

      <a class="navbar-item" href="ForumPage.html">
        Forums
      </a>

      
      <a class="navbar-item" href="AboutUs.html">
        About Us
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-link" href="usrRegister.php">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light" href="index.php">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>

<body>
    <section class="hero register-hero is-fullheight">
        <section class="section is-large">
            <div class="container">
                <div class="columns">
                    <div class="column is-10 is-offset-1">
                        <div class="columns register-boxes">
                            <!-- Sign Up Texts -->
                            <div class="column mr-3 mb-5">
                                <h1 class="title is-1 has-text-left has-text-black">
                                    <span>Sign-Up!</span>
                                </h1>
                                <hr class="hr register-hr">
                                <h1 class="subtitle is-3 has-text-left has-text-black"><span>Welcome to Voter's
                                        Companion!
                                    </span><span></span></h1>
                                <script src="https://unpkg.com/typewriter-effect@2.3.1/dist/core.js"></script>
                                <h1 class="subtitle is-4 has-text-left has-text-black"><span>A Platform for your
                                        Political
                                    </span><span id="typing"></span></h1>

                                <p class="subtitle">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis ex deleniti
                                    aliquam tempora libero excepturi vero soluta odio optio sed.
                                </p>
                            </div>
                            <!-- Sign Up Form -->
                            <div class="column">
                                <form id="register-form" action=<?php
                                                                echo "'" . $_SERVER["PHP_SELF"] . "'";
                                                                ?> method="POST">
                                    <h1 class="title">Enter your details here</h1>
                                    <div class="field">
                                        <div class="control">
                                            <input id="email-register" name="email-register" class="input is-size-5 register-input" required type="email" placeholder="[EMAIL NEXT TIME]">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <input id="user-register" name="user-register" class="input is-size-5 register-input" required type="text" placeholder="Username">
                                    </div>

                                    <div class="field">
                                        <input id="pass-register" name="pass-register" class="input is-size-5 register-input" required type="password" placeholder="Password">
                                    </div>
                                    <p name=error-pass class='hidden has-text-danger-dark'>Error: Passwords don't match</p>

                                    <div class="field">
                                        <input id="re-pass-register" name="re-pass-register" class="input is-size-5 register-input" required type="password" placeholder="Re-enter Password">
                                    </div>
                                    <p name="error-pass" class='hidden has-text-danger-dark'>Error: Passwords don't match</p>

                                    <div class="field is-grouped is-grouped-centered">
                                        <input id="register-submits" class="button" type="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</body>

<!-- 
    JS ANIMATION
 -->
<script>
    var app = document.getElementById('typing');

    var typewriter = new Typewriter(app, {
        loop: "true"
    });

    var stringarr = ["<strong>Opinions</strong>", "<strong>Words</strong>", "<strong>Expressions</strong>"];


    function repeat(typewriter, string) {
        typewriter.typeString(string)
            .pauseFor(1500)
            .deleteAll()
            .start();
    }

    stringarr.forEach(element => {
        repeat(typewriter, element);
    });
</script>

</html>