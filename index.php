<?php
echo "<h1>Filer på serveren</h1>";

echo "<pre>";
print_r(scandir(__DIR__));
echo "</pre>";
?>
