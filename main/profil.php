<?php
require './common/db.inc.php';

include './common/navbar.inc.php';


if (isset($_FILES["fileToUpload"]["tmp_name"])) {
    $target_dir = "./uploads/";
    $filename = basename($_FILES["fileToUpload"]["name"]);
    $filetype = preg_split("/\./", $filename)[1];
    $target_file = $target_dir . $_SESSION["id"] . "." . $filetype;

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "A  " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " fájl feltöltésre került!";
    } else {
        echo "Sajnos hiba történt a fájl feltöltése során.";
    }
}

?>

<head>
    <title>Profilkép beállítása</title>
</head>
<form action="./profil.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="File feltöltése" name="submit">
</form>

<?php
$conn->close();
?>