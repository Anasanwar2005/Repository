
<?php
$server = "b-studentsql-1.usn.no";
$brukernavn = getenv("DB_USER");
$passord = getenv("DB_PASSWORD");
$database = "273810";

$tilkobling = mysqli_connect(
    $server,
    $brukernavn,
    $passord,
    $database
);

if (!$tilkobling) {
    die("Kunne ikke koble til databasen");
}

mysqli_set_charset($tilkobling, "utf8mb4");
?>
