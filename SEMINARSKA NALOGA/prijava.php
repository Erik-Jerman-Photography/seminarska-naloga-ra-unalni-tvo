<!DOCTYPE html>
<html lang="sl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Erik Jerman Photography | Prijava</title>
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
        <h2>Prijava</h2>
        <form action="prijava.php" method="post">
          <input
            type="text"
            name="username"
            placeholder="Uporabniško ime"
            required
            autocomplete="off"
          />
          <input
            type="password"
            name="password"
            placeholder="Geslo"
            required
            autocomplete="off"
          />
          <input type="submit" value="Prijava" />
        </form>
      </div>
      <div class="signup-text">
        <a href="registracija.php">Še nisi registriran? Klikni tukaj!</a>
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
$password = $_POST['password'];
}

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT * FROM uporabniki WHERE username='$username'";
$result = $conn->query($sql);

session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {

            $_SESSION['user_id'] = $row['id'];
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('Neuspešna prijava. Preverite svoje podatke.'); window.location.href = 'prijava.php';</script>";
        }
    } else {
        echo "<script>alert('Uporabnik ne obstaja. Prosimo, registrirajte se.'); window.location.href = 'registracija.php';</script>";
    }
}

$conn->close();
?>

