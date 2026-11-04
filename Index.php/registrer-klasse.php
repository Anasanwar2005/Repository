
<?php
include("db.php");

if (isset($_POST["registrer"])) {

    $klassekode = $_POST["klassekode"];
    $klassenavn = $_POST["klassenavn"];
    $studiumkode = $_POST["studiumkode"];

    $sql = "INSERT INTO klasse
            (klassekode, klassenavn, studiumkode)
            VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($tilkobling, $sql);

    mysqli_stmt_bind_param(
        $stmt, "sss",
        $klassekode, $klassenavn, $studiumkode
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "Klassen er registrert!";
    } else {
        echo "Kunne ikke registrere klassen.";
    }

    mysqli_stmt_close($stmt);
}
?>

<h1>Registrer klasse</h1>

<form method="post">
    Klassekode: <input type="text" name="klassekode"
        maxlength="5" required><br><br>

    Klassenavn: <input type="text" name="klassenavn"
        maxlength="50" required><br><br>

    Studiumkode: <input type="text" name="studiumkode"
        maxlength="50" required><br><br>

    <input type="submit" name="registrer"
        value="Registrer klasse">
</form>

<br>
<a href="index.php">Tilbake til forsiden</a>
