<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moja_baza";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Povezava ni uspela: " . $conn->connect_error);
}
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['user_id'])) {

        header("Location: prijava.php");
        exit;
    }

    if (!isset($_POST['id_izdelka']) || !is_numeric($_POST['id_izdelka'])) {

        header("Location: trgovina.php");
        exit;
    }

    $id_izdelka = $_POST['id_izdelka'];

    if (!isset($_SESSION['kosarica'][$id_izdelka])) {

        $_SESSION['kosarica'][$id_izdelka] = 1;

        $user_id = $_SESSION['user_id'];
        $kolicina = $_SESSION['kosarica'][$id_izdelka];

        $sql = "INSERT INTO kosarica (id_uporabnik, id_izdelka, kolicina) VALUES ($user_id, $id_izdelka, $kolicina)";
        if ($conn->query($sql) !== TRUE) {
            echo "Napaka pri vstavljanju v bazo: " . $conn->error;
        }
    } else {

        $_SESSION['kosarica'][$id_izdelka]++;

        $user_id = $_SESSION['user_id'];
        $kolicina = $_SESSION['kosarica'][$id_izdelka];

        $sql = "UPDATE kosarica SET kolicina = $kolicina WHERE id_uporabnik = $user_id AND id_izdelka = $id_izdelka";
        if ($conn->query($sql) !== TRUE) {
            echo "Napaka pri posodabljanju v bazi: " . $conn->error;
        }
    }

    header("Location: kosarica.php");
    exit;
}
?>
