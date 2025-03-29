<?php
function napboldatum($nap) {
    $ev = 1;

    // Évek kiszámítása
    while ($nap >= 365) {
        if (($ev % 4 == 0 && $ev % 100 != 0) || ($ev % 400 == 0)) {
            if ($nap >= 366) {
                $nap -= 366;
            } else {
                break;
            }
        } else {
            $nap -= 365;
        }
        $ev++;
    }

    // Ellenőrizzük, hogy az utolsó év szökőév-e
    $szokoev = (($ev % 4 == 0 && $ev % 100 != 0) || ($ev % 400 == 0));

    // Hónapok napjai (szökőév esetén február 29 napos)
    $honapok = [31, $szokoev ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    $honap = 1;

    // Hónapok levonása
    foreach ($honapok as $napok) {
        if ($nap >= $napok) {
            $nap -= $napok;
            $honap++;
        } else {
            break;
        }
    }

    // Mivel 1-től kezdjük, a napot is 1-től számoljuk
    return ($ev) . " év, " . ($honap) . " hónap, " . ($nap + 1) . " nap";
}

echo napboldatum(203499);  // Pl. 10000 napra
?>
