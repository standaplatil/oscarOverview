<?php

namespace classes;

class OscarManager
{
    public static function loadOscars($filePath): array {
        $file = fopen($filePath, 'r');
        $oscars = [];

        // Přeskočíme první řádek (hlavičku)
        fgetcsv($file);

        while (($data = fgetcsv($file)) !== FALSE) {
            if ($data[0] !== null) {
                $oscars[] = new Oscar($data[1], $data[3], $data[2], $data[4]);
            }
        }

        fclose($file);
        return $oscars;
}

    public static function sortOscarsByYear($maleOscars, $femaleOscars): array
    {
        // Seskupení dat podle roku
        $oscarsByYear = [];

        foreach ($femaleOscars as $femaleOscar) {
            $year = $femaleOscar->getYear();
            $oscarsByYear[$year]['female'][] = [
                'name' => $femaleOscar->getName(),
                'age' => trim($femaleOscar->getAge()),
                'movie' => $femaleOscar->getMovie(),
            ];
        }

        foreach ($maleOscars as $maleOscar) {
            $year = $maleOscar->getYear();
            $oscarsByYear[$year]['male'][] = [
                'name' => $maleOscar->getName(),
                'age' => trim($maleOscar->getAge()),
                'movie' => $maleOscar->getMovie(),
            ];
        }

        // Seřazení let
        ksort($oscarsByYear);
        return $oscarsByYear;
    }

    public static function getCommonMovies($maleOscars, $femaleOscars): array
    {
        foreach ($femaleOscars as $femaleOscar) {
            foreach ($maleOscars as $maleOscar) {
                if ($femaleOscar->getMovie() === $maleOscar->getMovie()) {
                    $commonMovies[] = [
                        'movie' => $femaleOscar->getMovie(),
                        'year' => $femaleOscar->getYear(),
                        'actress' => $femaleOscar->getName(),
                        'actor' => $maleOscar->getName()
                    ];
                }
            }
        }

        usort($commonMovies, fn($a, $b) => strcmp($a['movie'], $b['movie']));
        return $commonMovies;
    }
}