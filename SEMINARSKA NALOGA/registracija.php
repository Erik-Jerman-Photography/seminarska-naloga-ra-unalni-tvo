<!DOCTYPE html>
<html lang="sl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Erik Jerman Photography | Registracija</title>
    <link rel="icon" type="image/png" href="slike/znak_bel_outline_32x32.png" />
    <link rel="stylesheet" href="styles.css" />
    <link
      rel="stylesheet"
      href="https://necolas.github.io/normalize.css/8.0.1/normalize.css"
    />
  </head>
  <body class="prijava-basic">
    <div class="p-container">
      <div class="prijava-container">
        <h2>Registracija</h2>
        <form action="registracija.php" method="post">
          <label for="username">Uporabniško ime:</label>
          <input
            type="text"
            id="username"
            name="username"
            required
          /><br /><br />
          <label for="ime">Ime:</label>
          <input type="text" id="ime" name="ime" required /><br /><br />
          <label for="priimek">Priimek:</label>
          <input type="text" id="priimek" name="priimek" required /><br /><br />
          <label for="email">E-pošta:</label>
          <input type="text" id="email" name="email" required /><br /><br />
          <label for="password">Geslo:</label>
          <input
            type="password"
            id="password"
            name="password"
            required
          /><br /><br />
          <input type="submit" value="Registriraj se" />
        </form>
      </div>
      <div class="signup-text">
        <a href="prijava.php">Si že registriran? Klikni tukaj!</a>
      </div>
    </div>
  </body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moja_baza";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Povezava ni uspela: " . $conn->connect_error);
}
if(!empty($_POST['username'])) {
$username = $_POST['username'];
$ime = $_POST['ime'];
$priimek = $_POST['priimek'];
$email = $_POST['email'];
$password = $_POST['password'];


$username = mysqli_real_escape_string($conn, $username);
$ime = mysqli_real_escape_string($conn, $ime);
$priimek = mysqli_real_escape_string($conn, $priimek);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT * FROM uporabniki WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "Uporabniško ime že obstaja. Prosimo izberite drugo.";
} else {

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $insert_sql = "INSERT INTO uporabniki (username, ime, priimek, email, password) VALUES ('$username', '$ime', '$priimek', '$email', '$hashed_password')";
    if ($conn->query($insert_sql) === TRUE) {
        echo "Nov uporabnik uspešno dodan.";
        header ("Location: prijava.php");
        exit;
    } else {
        echo "Napaka pri dodajanju novega uporabnika: " . $conn->error;
    }
}
}
$conn->close();
?>
