
<?php
include("db.php");

if (isset($_POST["slett"])) {
    $klassekode = $_POST["klassekode"];

    $sql = "DELETE FROM klasse WHERE klassekode = ?";
    $stmt = mysqli_prepare($tilkobling, $sql);
    mysqli_stmt_bind_param($stmt, "s", $klassekode);

   
try {
    mysqli_stmt_execute($stmt);
    echo "Klassen er slettet!";
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1451) {
        echo "Klassen kan ikke slettes fordi det finnes studenter i klassen.";
    } else {
        echo "Kunne ikke slette klassen.";
    }
}


    mysqli_stmt_close($stmt);
}
?>

<h1>Slett klasse</h1>

<form method="post">
    Velg klasse:
    <select name="klassekode" required>
        <?php
        $sql = "SELECT * FROM klasse";
        $resultat = mysqli_query($tilkobling, $sql);

        while ($rad = mysqli_fetch_array($resultat)) {
            $kode = htmlspecialchars($rad["klassekode"]);
            $navn = htmlspecialchars($rad["klassenavn"]);

            echo "<option value='$kode'>$kode - $navn</option>";
        }
        ?>
    </select>

    <br><br>
    
<input type="submit"
       name="slett"
       value="Slett klasse"
       onclick="return confirm('Er du sikker på at du vil slette klassen?');">

</form>

<br>
<a href="index.php">Tilbake til forsiden</a>
