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
if (isset($_SESSION['user_id']) && isset($_SESSION['kosarica']) && !empty($_SESSION['kosarica'])) {
  $user_id = $_SESSION['user_id'];
  $query = "SELECT * FROM uporabniki WHERE id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $ime = $row['ime'];
      $priimek = $row['priimek'];
      $email = $row['email'];
  } else {
      echo "Napaka pri pridobivanju podatkov o uporabniku iz baze.";
  }
  $naročeni_izdelki = $_SESSION['kosarica'];
} else {
  header("Location: trgovina.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Potrdilo o naročilu</title>
    <link
      rel="icon"
      type="image/png"
      href="slike/znak_bel_outline_32x32.png"
    />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
  </head>
  <style>
        body {
            background-color: #181818;
        }
  </style>
  <body>
    <div class="narocilo">
      <div class="narocilo--uporabnik">
        <h2>Potrdilo o naročilu</h2>
        <p>Ime: <?php echo $ime; ?></p>
        <p>Priimek: <?php echo $priimek; ?></p>
        <p>E-pošta: <?php echo $email; ?></p>
      </div>
        <hr>
        <div class="narocilo--uporabnik">
          <h2>Naročeni izdelki:</h2>
          <ul>
            <?php foreach ($naročeni_izdelki as $id_izdelka => $kolicina): ?>
                <?php
                $podatki_izdelka = pridobi_podatke_iz_baze($id_izdelka);
                ?>
                <li>
                    <p>Ime izdelka: <?php echo $podatki_izdelka['ime']; ?></p>
                    <p>Cena: <?php echo $podatki_izdelka['cena']; ?>€</p>
                    <p>Količina: <?php echo $kolicina; ?></p>
                </li>
            <?php endforeach; ?>
          </ul>
          <form action="odjava.php" method="post">
            <button type="submit" class="dodaj">Oddaj naročilo</button>
          </form>
        </div>
    </div>
  </body>
</html>
