<?php
session_start();

$servername = "localhost";
$username = "peca";
$password = "peca";
$dbname = "php_teszt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = "";

$loginStatus = "";
if (isset($_POST["felhasznalonev"]) and isset($_POST["jelszo"])) {
    $sql = "SELECT id, nev, jelszo, felhasznalonev FROM osztaly WHERE felhasznalonev = \"" . $_POST["felhasznalonev"] . "\"";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // elkódolt jelszó összevetése
        $row = $result->fetch_assoc();
        if ($row['jelszo'] === hash('sha256', $_POST['jelszo'])) {
            // belépett felhasználó
            $loginStatus =  "Belépett";
            $_SESSION["nev"] = $row['nev'];
            $_SESSION["id"] = $row['id'];
            $loginStatus = "Üdv " . $_SESSION["nev"] . "!";
        } else {
            // hibás jelszó
            $loginStatus = "Hibás jelszó";
        }
    } else {
        // nincs ilyen felhasználónév
        $loginStatus = "Nincs ilyen felhasználónév";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ülésrend (Fájlfeltöltés)</title>
</head>

<body class="text-center bg-secondary-subtle">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menü</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Főoldal</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION["id"])) {
                            echo '<a class="nav-link" href="#">Kilépés</a>';
                        } else {
                            echo '<a class="nav-link" href="#">Belépés</a>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mt-5 d-flex flex-column align-items-center">
        <h1 class="mb-4">Bejelentkezés</h1>
        <p class="mb-3 fw-bold">
            <?php
            if (isset($loginStatus)) {
                echo $loginStatus;
            }
            ?>
        </p>
        <form class="w-50 form-group" action="login.php" method="post">
            <div class="mb-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="felhasznalonev" name="felhasznalonev" placeholder="Felhasználónév">
                    <label for="felhasznalonev">Felhasználónév</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="jelszo" name="jelszo" placeholder="Jelszó">
                    <label for="jelszo">Jelszó</label>
                </div>
            </div>
            <button type="submit" class="btn btn-success py-2 w-100">Bejelentkezés</button>
        </form>
    </div>
</body>

</html>