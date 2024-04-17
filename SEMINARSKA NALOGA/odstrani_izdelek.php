<?php
session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location: prijava.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_izdelka'])) {
    $id_izdelka = $_POST['id_izdelka'];

    if (!is_numeric($id_izdelka)) {

        header("Location: kosarica.php");
        exit;
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "moja_baza";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Povezava ni uspela: " . $conn->connect_error);
    }

    if (isset($_SESSION['kosarica'][$id_izdelka])) {
        unset($_SESSION['kosarica'][$id_izdelka]);
    }

    $user_id = $_SESSION['user_id'];
    $sql = "DELETE FROM kosarica WHERE id_uporabnik = $user_id AND id_izdelka = $id_izdelka";

    if ($conn->query($sql) !== TRUE) {
        echo "Napaka pri odstranjevanju iz baze: " . $conn->error;
    }

    header("Location: kosarica.php");
    exit;
} else {

    header("Location: kosarica.php");
    exit;
}
?>
