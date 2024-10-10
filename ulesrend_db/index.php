<?php
//pjyNqjVz_Fx4DW6N
$servername = "localhost";
$username = "php_teszter";
$password = "pjyNqjVz_Fx4DW6N";
$dbname = "php_teszt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
echo "<h1 style='font-size: 200px'>kiraly</h1>";

$osztaly = array(
    array("-", "Tanári asztal", "Gulyás Zsolt Máté", "Lénárt Áron", "-"),
    array("Mészáros Marcell Zsolt", "Básti Domonkos", "Keindl Bercel", "Kiss Balázs", "-"),
    array("Csik Melinda", "Karakas Olivér Roland", "Ábrahám Dávid János", "Détári Leon", "Togyeriska Viktor"),
    array("-", "-", "Giczi Attila István", "Preil Ákos Levente", "Sivinger Miklós Martin")
);

foreach($osztaly as $kulcs => $sor) {
    foreach($sor as $oszlop => $nev){
        $sql = "INSERT INTO osztaly (nev, sor, oszlop) VALUES ('".$nev."', $kulcs, $oszlop)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }
}
*/




?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ülésrend (adatbázis)</title>
</head>

<body class="p-5 text-center bg-secondary-subtle">
    <h1>13.i 1. csoport</h1>
    <h2 class="mb-4">Ülésrend</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Első oszlop</th>
                <th scope="col">Második oszlop</th>
                <th scope="col">Folyosó</th>
                <th scope="col">Harmadik oszlop </th>
                <th scope="col">Negyedik oszlop</th>
                <th scope="col">Folyosó</th>
                <th scope="col">Ötödik oszlop</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT id, nev, sor, oszlop FROM osztaly";
            $result = $conn->query($sql);

            $sor = NULL;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($sor !== $row["sor"]) {
                        if ($sor !== NULL) echo "</tr>";
            ?>
                        <tr>
                            <th scope="row"><?php echo $row["sor"] + 1 ?></th>
                <?php
                        $sor = $row["sor"];
                    }
                    echo "<td>" . $row["nev"] . "</td>";
                    if ($row["oszlop"] == 1 || $row["oszlop"] == 3) {
                        echo ("<td></td>");
                    };
                }
            } else {
                echo "0 results";
            }
                ?>
                        </tr>
        </tbody>
    </table>
</body>

</html>
<?php
$conn->close();
?>