<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Erik Jerman Photography | Trgovina</title>
    <link
      rel="icon"
      type="image/png"
      href="slike/znak_bel_outline_32x32.png"
    />
    <link rel="stylesheet" href="styles.css" />
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
    <!-- trgovina -->
    <div class="main">
      <div class="main__container--trgovina">
        <div class="main__content--trgovina">
          <h1>Trgovina fotografij</h1>
        </div>
      </div>
    </div>

    <!-- slike -->
    <div class="slika--trgovina">
      <div class="slika__container--trgovina">
        <div class="slika__card" id="Klevevž">
          <h2>Klevevž</h2>
          <p>24mm, f/22, 1/8 s, ISO 100</p>
          <button><a href="klevevz.php" target="_self">Več</a></button>
        </div>
        <div class="slika__card" id="Oleander">
          <h2>Oleander</h2>
          <p>50mm, f/2.8, 1/1250 s, ISO 100</p>
          <button><a href="oleander.php" target="_self">Več</a></button>
        </div>
        <div class="slika__card" id="Krka">
          <h2>Reka Krka</h2>
          <p>24mm, f/4, 1/640 s, ISO 250</p>
          <button><a href="krka.php" target="_self">Več</a></button>
        </div>
        <div class="slika__card" id="Metulj">
          <h2>Metulj</h2>
          <p>24mm, f/4, 1/640 s, ISO 250</p>
          <button><a href="metulj.php" target="_self">Več</a></button>
        </div>
        <div class="slika__card" id="Pogi">
          <h2>Tadej Pogačar</h2>
          <p>85mm, f/5.6, 1/2000 s, ISO 100</p>
          <button><a href="pogi.php" target="_self">Več</a></button>
        </div>
        <div class="slika__card" id="Visarje">
          <h2>Višarje</h2>
          <p>37mm, f/9, 1/320 s, ISO 100</p>
          <button><a href="visarje.php" target="_self">Več</a></button>
        </div>
        <div class="slika__card" id="Gorjanci">
          <h2>GHD Gorjanci</h2>
          <p>40mm, f/18, 1/200 s, ISO 100</p>
          <button><a href="gorjanci.php" target="_self">Več</a></button>
        </div>
        <div class="slika__card" id="Gumball">
          <h2>Gumball 3000</h2>
          <p>37mm, f/5.6, 1/400 s, ISO 100</p>
          <button><a href="gumball.php" target="_self">Več</a></button>
        </div>
        <div class="slika__card" id="Schonbrun">
          <h2>Schönbrunn</h2>
          <p>55mm, f/22, 1/160s, ISO 100</p>
          <button><a href="schonbrun.php" target="_self">Več</a></button>
        </div>
        <div class="slika__card" id="NM-Tek">
          <h2>Novomeški polmaraton</h2>
          <p>80mm, f/4, 1/2000 s, ISO 100</p>
          <button><a href="NM-Tek.php" target="_self">Več</a></button>
        </div>
        <div class="slika__card" id="Mohoric">
          <h2>Tour of Slovenia</h2>
          <p>84mm, f/5.6, 1/2000 s, ISO 100</p>
          <button><a href="Mohoric.php" target="_self">Več</a></button>
        </div>
        <div class="slika__card" id="Bled">
          <h2>Bled</h2>
          <p>18mm, f/7.1, 1/640 s, ISO 100</p>
          <button><a href="Bled.php" target="_self">Več</a></button>
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