

<?php
echo "<h2>PHP-mappe:</h2>";
echo __DIR__;

echo "<h2>Arbeidsmappe:</h2>";
echo getcwd();

echo "<h2>Mapper ett nivå opp:</h2>";
echo "<pre>";
print_r(scandir(dirname(__DIR__)));
echo "</pre>";
?>
