<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Erik Jerman Photography | Domov</title>
    <link
      rel="icon"
      type="image/png"
      href="slike/znak_bel_outline_32x32.png"
    />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
  </head>
  <body>
    <!-- MENI -->
    <nav class="navbar">
      <div class="navbar__container">
        <a href="index.php" id="navbar__logo"><img src="slike/logo_bel.png" id="navbar__logo" alt="Erik Jerman Photography"></img></a>
        <div class="navbar__toggle" id="mobile-meni">
          <span class="prvi-meni"></span>
          <span class="prvi-meni"></span>
          <span class="prvi-meni"></span>
        </div>
        <ul class="navbar__meni">
          <li class="navbar__item">
            <a href="index.php" class="navbar__links"> Domov </a>
          </li>
          <li class="navbar__item">
            <a href="trgovina.php" class="navbar__links"> Trgovina </a>
          </li>
          <li class="navbar__item">
            <a href="kosarica.php" class="navbar__links"> Košarica </a>
          </li>
          <li class="navbar__gumb">
              <?php include 'header.php'; ?>
          </li>
        </ul>
      </div>
    </nav>
    <!-- pozdravna stran -->
    <div class="main">
      <div class="main__container">
        <div class="main__content">
          <h1>Erik Jerman</h1>
          <h2>Photography</h2>
          <p>Si želiš čudovitih fotografij?</p>
          <button class="main__gumb"><a href="trgovina.php">Pojdi v trgovino</a></button>
        </div>
        <div class="main__slika--container"><img src="slike/metulj.jpg" alt="glavna fotografija" id="main__slika"></div>
      </div>
    </div>

    <!-- predogled trgovine -->
    <div class="slika">
      <h1>Trgovina</h1>
      <div class="slika__container">
        <div class="slika__card" id="Klevevz">
          <h2>Klevevž</h2>
          <p>24mm, f/22, 1/8 s, ISO 100</p>
          <button><a href="klevevz.php">Več</a></button>
        </div>
        <div class="slika__card" id="Oleander">
          <h2>Oleander</h2>
          <p>50mm, f/2.8, 1/1250 s, ISO 100</p>
          <button><a href="oleander.php">Več</a></button>
        </div>
      </div>
    </div>

    <!-- Noga -->
    <div class="noga__container">
      <div class="noga__links">
        <div class="noga__link--wrapper">
          <div class="noga__link--items">
            <h2>Kontakt</h2>
            <a href="tel:">Tel: 123456789</a>
            <a href="mailto: erik@jerman.photo">Mail: erik@jerman.photo</a>
          </div>
        </div>
        <div class="noga__link--wrapper">
          <div class="noga__link--items">
            <h2>Socialna omrežja</h2>
            <a href="https://www.instagram.com/erik.jerman/" target="_blank">Instagram</a>
            <a href="https://www.threads.net/@erik.jerman" target="_blank">Threads</a>
            <a href="https://www.facebook.com/profile.php?id=100016764365107/" target="_blank">Facebook</a>
          </div>
        </div>
      </div>
      <div class="social__media">
        <div class="social__media--wrap">
          <div class="noga__logo">
            <a href="index.php" class="noga__logo"><img src="slike/logo_bel.png" id="noga__logo" alt="Erik Jerman Photography"></a>
          </div>
        <p class="website__rights">© Erik Jerman Photography 2024. Vse pravice pridržane.</p>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
