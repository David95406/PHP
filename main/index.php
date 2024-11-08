<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
    <title>Ulesrend</title>
</head>

<?php
require './common/db.inc.php';


$fejlec = array("#", "1. oszlop", "2. oszlop", "Folyosó", "3. oszlop", "4. oszlop", "Folyosó", "5.oszlop");


$name = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["keresett_nev"])) {
        $nameErr = "Name is required";
    } else {
        if (strlen($_POST["keresett_nev"]) < 2) {
            $nameErr = "Legalább legyen 2 karakter";
        } else {
            $name = $_POST["keresett_nev"];
        }
    }
}
include './common/navbar.inc.php'
?>


<table class="table caption-top table-striped table-bordered">
    <thead>
        <tr>
            <?php
            foreach ($fejlec as $sor) {
                echo "<td>" . $sor . "</td>";
            }
            ?>
        </tr>
    </thead>
    <caption>13.i Ülésrend</caption>
    <tbody class="table-group-divider">
        <tr>
            <?php
            $sql = "SELECT id, nev, sor, oszlop FROM Osztaly ORDER BY sor, oszlop";
            $result = $conn->query($sql);

            $sor = NULL;

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    if ($sor !== $row["sor"]) {
                        if ($sor !== NULL)
                            echo "</tr>"
            ?>
        <tr style="background-color: <?php echo $cellBgColor; ?>;">
            <th scope="row"><?php echo $row["sor"] + 1; ?></th>
<?php
                        $sor = $row["sor"];
                    }
                    $class = "";
                    if ($name != '') {
                        if (stripos($row["nev"], $name) !== FALSE) { // Change strpos to stripos
                            $class = " class=\"bg-danger\"";
                        }
                    }
                    //profil kep
                    if ($row["nev"] != " - ") {
                        $profileImage = "<img src='./uploads/default.jpg'></img>";
                    } else {
                        $profileImage = "";
                    }
                    $profilkep = "./uploads/" . $_SESSION["id"] . ".jpg"; //user profile
                    if (file_exists($profilkep) && $row["id"] == $_SESSION["id"]) {
                        $profileImage = "<img src='$profilkep'></img>";
                    }

                    $egyed = "<td " . $class . ">$profileImage" . $row["nev"] . "</td>";
                    if (isset($_SESSION["id"])) {
                        if ($_SESSION["id"] == $row["id"]) {
                            $egyed = "<td" . $class . ">$profileImage<a href='./profil.php'</a>" . $row["nev"] . "</td>";
                        }
                    }
                    echo $egyed;


                    if ($row["oszlop"] == 1 or $row["oszlop"] == 3) {
                        echo "<td>" . null . "</td>"; //$row[""] ?xd
                    }
                    //echo $row["id"] . $row["nev"] . " " . $row["sor"] . " " . $row["oszlop"] . "<br>";
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