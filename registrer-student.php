
<?php
include("db.php");

if (isset($_POST["registrer"])) {

    $brukernavn = $_POST["brukernavn"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $klassekode = $_POST["klassekode"];

    $sql = "INSERT INTO student
            (brukernavn, fornavn, etternavn, klassekode)
            VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($tilkobling, $sql);

    mysqli_stmt_bind_param(
        $stmt, "ssss",
        $brukernavn, $fornavn, $etternavn, $klassekode
    );

   

try {
    mysqli_stmt_execute($stmt);
    echo "Studenten er registrert!";
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        echo "Brukernavnet finnes allerede. Velg et annet brukernavn.";
    } else {
        echo "Kunne ikke registrere studenten.";
    }
}



    mysqli_stmt_close($stmt);
}
?>

<h1>Registrer student</h1>

<form method="post">

    Brukernavn:
    <input type="text" name="brukernavn"
           maxlength="7" required>
    <br><br>

    Fornavn:
    <input type="text" name="fornavn"
           maxlength="50" required>
    <br><br>

    Etternavn:
    <input type="text" name="etternavn"
           maxlength="50" required>
    <br><br>

    Klasse:
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

    <input type="submit" name="registrer"
           value="Registrer student">

</form>

<br>
<a href="index.php">Tilbake til forsiden</a>
