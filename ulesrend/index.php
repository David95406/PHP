<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ülésrend</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <?php
    /*
    $ulesrend = array(
        "1. oszlop" => array("1. oszlop", "Marci", "Melinda", "", ""),
        "2. oszlop" => array("2. oszlop", "Tanár", "Domonkos", "Roland", ""),
        "1. folyoso" => array("1. folyosó", "", "", "", ""),
        "3. oszlop" => array("3. oszlop", "Máté", "Bercel", "Dávid", "Attila"),
        "4. oszlop" => array("4. oszlop", "Áron", "Balázs", "Leon", "Ákos"),
        "2. folyoso" => array("2. folyosó", "", "", "", ""),
        "5. oszlop" => array("5. oszlop", "üres", "üres", "Viktor", "Miklos")
    );
    */

    $ulesrend = array(
        array("1. oszlop", "", "Marci", "Melinda", ""),
        array("2. oszlop", "Tanár", "Domonkos", "Roland", ""),
        array("1. folyosó", "", "", "", ""),
        array("3. oszlop", "Máté", "Bercel", "Dávid", "Attila"),
        array("4. oszlop", "Áron", "Balázs", "Leon", "Ákos"),
        array("2. folyosó", "", "", "", ""),
        array("5. oszlop", "", "", "Viktor", "Miklos")
    );

    $ujulesrend = array(
        array(" - ", "Tanári asztal", "Gulyás Zsolt Máté", "Lénárt Áron", "-"),
        array("Mészáros Marcell", "Básti Domonkos", "Keindl Bercel", "Kiss Balázs", "-"),
        array("Csik Melinda", "Karakas Olivér Roland", "Ábrahám Dávid", "Détári Leon", "Togyeriska Viktor"),
        array(" - ", " - ", "Giczi Attila", "Preil Ákos", "Sivinger Miklós")
    );
    ?>

</head>

<body>
    <!--
    sima html
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">1</th>
                <th scope="col">2</th>
                <th scope="col">3</th>
                <th scope="col">4</th>
                <th scope="col">5</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td>Tanár</td>
                <td>Máté</td>
                <td>Áron</td>
                <td></td>
            </tr>
            <tr>
                <td>Marci</td>
                <td>Domonkos</td>
                <td>Bercel</td>
                <td>Balazs</td>
                <td></td>
            </tr>
            <tr>
                <td>Melinda</td>
                <td>Karakas</td>
                <td>Dávid</td>
                <td>Leon</td>
                <td>Viktor</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Attila</td>
                <td>Ákos</td>
                <td>Miklos</td>
            </tr>
        </tbody>
    </table>
-->

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Első Oszlop</th>
                <th scope="col">Második Oszlop</th>
                <th scope="col">Folyosó</th>
                <th scope="col">Harmadik Oszlop </th>
                <th scope="col">Negyedik Oszlop</th>
                <th scope="col">Folyosó</th>
                <th scope="col">Ötödik Oszlop</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($ujulesrend as $sor) { ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>

                    <?php
                    foreach ($sor as $oszlop => $nev) {
                        echo "<td>" . $nev . "</td>";
                        if ($oszlop == 1 or $oszlop == 3) {
                            echo "<td></td>";
                        }
                    }
                    ?>
                    <!--
                    <td><?php echo $sor[0]; ?></td>
                    <td><?php echo $sor[1]; ?></td>
                    <td> </td>
                    <td><?php echo $sor[2]; ?> </td>
                    <td><?php echo $sor[3]; ?></td>
                    <td> </td>
                    <td><?php echo $sor[4]; ?></td>
                    -->
                </tr>
            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>


    <?php
    echo "<table class='table table-bordered'>";
    for ($sor = 0; $sor < count($ulesrend[0]); $sor++) {
        echo "<tr>";

        for ($oszlop = 0; $oszlop < count($ulesrend); $oszlop++) {
            if ($sor == 0) {
                echo "<th>" . $ulesrend[$oszlop][$sor] . "</th>";
            } else {
                echo "<td>" . $ulesrend[$oszlop][$sor] . "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>