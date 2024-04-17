<?php
if (!isset($_SESSION)) {
    session_start();
}

echo "<div class='navigation'>";
if (isset($_SESSION['user_id'])) {
    echo "<a href='odjava.php' class='prijava'>Odjava</a>";
} else {
    echo "<a href='prijava.php' class='prijava'>Prijava</a>";
}
echo "</div>";
?>
