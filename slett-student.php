
<?php
include("db.php");

$melding = "";

if (isset($_POST["slett"])) {
    $brukernavn = $_POST["brukernavn"];

    $sql = "DELETE FROM student WHERE brukernavn = ?";
    $stmt = mysqli_prepare($tilkobling, $sql);

    mysqli_stmt_bind_param($stmt, "s", $brukernavn);

    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $melding = "Studenten er slettet!";
        } else {
            $melding = "Studenten finnes ikke.";
        }
    } else {
        $melding = "Kunne ikke slette studenten.";
    }

    mysqli_stmt_close($stmt);
}
?>

<h1>Slett student</h1>

<p><?php echo htmlspecialchars($melding); ?></p>

<form method="post">

    Velg student:
    <select name="brukernavn" required>
        <?php
        $sql = "SELECT * FROM student";
        $resultat = mysqli_query($tilkobling, $sql);

        while ($rad = mysqli_fetch_array($resultat)) {
            $brukernavn = htmlspecialchars($rad["brukernavn"]);
            $fornavn = htmlspecialchars($rad["fornavn"]);
            $etternavn = htmlspecialchars($rad["etternavn"]);

            echo "<option value='$brukernavn'>
                  $brukernavn - $fornavn $etternavn
                  </option>";
        }
        ?>
    </select>

    <br><br>

    <input type="submit" name="slett" value="Slett student">

</form>

<br>
<a href="index.php">Tilbake til forsiden</a>

<?php
mysqli_close($tilkobling);
?>
