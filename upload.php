<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Přehled Oscarů</title>
</head>
<body>
    <div class="container">
<?php
require_once 'classes/Oscar.php';
require_once 'classes/OscarManager.php';

if (
    array_key_exists('femaleFile', $_FILES)
    && array_key_exists('maleFile', $_FILES)
    && $_FILES['femaleFile']['error'] === UPLOAD_ERR_OK
    && $_FILES['maleFile']['error'] === UPLOAD_ERR_OK
) {
    $femaleOscars = \classes\OscarManager::loadOscars($_FILES['femaleFile']['tmp_name']);
    $maleOscars = \classes\OscarManager::loadOscars($_FILES['maleFile']['tmp_name']);

    // Zpracování dat a zobrazení výsledků
    echo '<h3 class="mt-3" style="text-align: center">Přehled oscarů podle roku</h3>';
    echo '<table class="table mt-3 mb-5">';
    echo '<thead><tr><th>Rok</th><th>Ženy</th><th>Muži</th></tr></thead>';
    echo '<tbody>';

    $oscarsByYear = \classes\OscarManager::sortOscarsByYear($maleOscars, $femaleOscars);
    foreach ($oscarsByYear as $year => $winners) {
        echo "<tr>";
        echo "<td>$year</td>";

        // Zobrazení ženských vítězek pro tento rok
        echo "<td>";
        if (!empty($winners['female'])) {
            foreach ($winners['female'] as $female) {
                echo "{$female['name']} ({$female['age']})<br>{$female['movie']}<br>";
            }
        } else {
            echo "No female winner";
        }
        echo "</td>";

        // Zobrazení mužských vítězů pro tento rok
        echo "<td>";
        if (!empty($winners['male'])) {
            foreach ($winners['male'] as $male) {
                echo "{$male['name']} ({$male['age']})<br>{$male['movie']}<br>";
            }
        } else {
            echo "No male winner";
        }
        echo "</td>";

        echo "</tr>";
    }

    echo '</tbody>';
    echo '</table>';

    $commonMovies = \classes\OscarManager::getCommonMovies($maleOscars, $femaleOscars);

    echo '<h3 class="mt-3" style="text-align: center">Přehled filmů, které obdržely oscary za mužskou i ženskou hlavní roli</h3>';
    echo '<table class="table mt-3 mb-5">';
    echo '<thead><tr><th>Název filmu</th><th>Rok</th><th>Herečka</th><th>Herec</th></tr></thead>';
    echo '<tbody>';

    foreach ($commonMovies as $movie) {
        echo "<tr><td>{$movie['movie']}</td><td>{$movie['year']}</td><td>{$movie['actress']}</td><td>{$movie['actor']}</td></tr>";
    }

    echo '</tbody>';
    echo '</table>';


}

?>
    </div>
</body>
</html>
