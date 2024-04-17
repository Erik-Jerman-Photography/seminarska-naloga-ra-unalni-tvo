<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moja_baza";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Povezava ni uspela: " . $conn->connect_error);
}

function pridobi_podatke_iz_baze($id_izdelka) {

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "moja_baza";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Povezava ni uspela: " . $conn->connect_error);
  }

  $sql = "SELECT ime, cena, slika FROM izdelki WHERE id = ?";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param("i", $id_izdelka);

  $stmt->execute();

  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $stmt->close();
      $conn->close();
      return $row;
  } else {
      $stmt->close();
      $conn->close();
      return array();
  }
}

$skupna_cena = 0;
if (isset($_SESSION['kosarica']) && !empty($_SESSION['kosarica'])) {
    foreach ($_SESSION['kosarica'] as $id_izdelka => $kolicina) {
        $podatki_izdelka = pridobi_podatke_iz_baze($id_izdelka);
        $skupna_cena += ($podatki_izdelka['cena']) * $kolicina;
    }
}   else {
        echo "<style>.noga__container { height: 60vh; }</style>";
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Erik Jerman Photography | Košarica</title>
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
    <!-- pozdravna stran -->
    <div class="main--kosarica">
      <div class="main__container--kosarica">
        <div class="main__content--kosarica">
        <h1>Košarica</h1>
          <ul id="kosarica-list">
        <?php if (isset($_SESSION['kosarica']) && !empty($_SESSION['kosarica'])): ?>
            <?php foreach ($_SESSION['kosarica'] as $id_izdelka => $kolicina): ?>
                <li class="izdelek">
                    <div class="izdelek--podatki">
                    <?php
                        $podatki_izdelka = pridobi_podatke_iz_baze($id_izdelka);
                    ?>
                    <p>Izdelek: <?php echo $podatki_izdelka['ime']; ?></p>
                    <p>Cena: <?php echo $podatki_izdelka['cena']; ?>€</p>
                    <p>Količina: <?php echo $kolicina; ?></p>
                    <form action="odstrani_izdelek.php" method="post">
                        <input type="hidden" name="id_izdelka" value="<?php echo $id_izdelka; ?>">
                        <button type="submit" class="dodaj">Odstrani iz košarice</button>
                    </form>
                    </div>
                    <div class="izdelek--slika">
                    <img src="<?php echo $podatki_izdelka['slika']; ?>" alt="<?php echo $podatki_izdelka['ime'];?>" width="100" height="100" id="main__slika"></div>
                </li>
            <?php endforeach; ?>
              <p>Skupni znesek: <span><?php echo $skupna_cena; ?>€</span></p>
              <form action="potrdi.php" method="post">
                <button type="submit" class="dodaj">Potrdi naročilo</button>
              </form>
        <?php else: ?>
            <p>Vaša košarica je prazna.</p>
        <?php endif; ?>
    </ul>
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
            <a href="https://www.threads.net/@erik.jerman/" target="_blank">Threads</a>
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