<?php
session_start();

if (isset($_SESSION['user_id'])) {

    $user_id = $_SESSION['user_id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "moja_baza";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Povezava ni uspela: " . $conn->connect_error);
    }

    $sql = "DELETE FROM kosarica WHERE id_uporabnik = $user_id";

    if ($conn->query($sql) !== TRUE) {
        echo "Napaka pri brisanju izdelkov iz baze: " . $conn->error;
    }

    unset($_SESSION['kosarica']);

    unset($_SESSION['user_id']);
    session_destroy();

    echo "Prejšnja stran: " . $_SESSION['prejsna_stran'];

    $prejsna_stran = isset($_SESSION['prejsna_stran']) ? $_SESSION['prejsna_stran'] : "index.php";
    header("Location: $prejsna_stran");
    exit;
} else {

    $prejsna_stran = isset($_SESSION['prejsna_stran']) ? $_SESSION['prejsna_stran'] : "index.php";
    header("Location: $prejsna_stran");
    exit;
}
?>
