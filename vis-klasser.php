
<?php
include("db.php");

$sql = "SELECT * FROM klasse";
$resultat = mysqli_query($tilkobling, $sql);

echo "<h1>Vis alle klasser</h1>";

echo "<table border='1'>";
echo "<tr>";
echo "<th>Klassekode</th>";
echo "<th>Klassenavn</th>";
echo "<th>Studiumkode</th>";
echo "</tr>";

while ($rad = mysqli_fetch_array($resultat)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($rad["klassekode"]) . "</td>";
    echo "<td>" . htmlspecialchars($rad["klassenavn"]) . "</td>";
    echo "<td>" . htmlspecialchars($rad["studiumkode"]) . "</td>";
    echo "</tr>";
}

echo "</table>";

echo "<br><a href='index.php'>Tilbake til forsiden</a>";

mysqli_close($tilkobling);
?>
