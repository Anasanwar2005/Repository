
<?php
include("db.php");

$sql = "SELECT * FROM student";
$resultat = mysqli_query($tilkobling, $sql);
?>

<h1>Vis alle studenter</h1>

<table border="1">
    <tr>
        <th>Brukernavn</th>
        <th>Fornavn</th>
        <th>Etternavn</th>
        <th>Klassekode</th>
    </tr>

    <?php
    while ($rad = mysqli_fetch_array($resultat)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($rad["brukernavn"]) . "</td>";
        echo "<td>" . htmlspecialchars($rad["fornavn"]) . "</td>";
        echo "<td>" . htmlspecialchars($rad["etternavn"]) . "</td>";
        echo "<td>" . htmlspecialchars($rad["klassekode"]) . "</td>";
        echo "</tr>";
    }

    mysqli_close($tilkobling);
    ?>
</table>

<br>
<a href="index.php">Tilbake til forsiden</a>
