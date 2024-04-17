<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moja_baza";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Povezava ni uspela: " . $conn->connect_error);
}

$sql = "SELECT * FROM izdelki WHERE id = 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ime_izdelka = $row["ime"];
    $opis = $row["opis"];
    $cena = $row["cena"];
    $slika = $row["slika"];
} else {
    echo "Izdelek ni bil najden.";
}
?>
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
        <div class="main__content1">
        <h1><?php echo $ime_izdelka; ?></h1>
          <p><?php echo $opis; ?></p>
          <p>Cena: <?php echo $cena; ?>€</p>
          <form action="dodaj_v_kosarico.php" method="post">
                <input type="hidden" name="id_izdelka" value="2">
                <button type="submit" name="add_to_cart" class="dodaj">Dodaj v košarico</button>
          </form>
        </div>
        <div class="main__slika--container"><img src="<?php echo $slika; ?>" alt="Slika izdelka" id="main__slika"></div>
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
