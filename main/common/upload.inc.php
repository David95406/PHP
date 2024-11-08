<?php

//van e ideiglenes nev?
if (isset($_FILES["fileToUpload"]["tmp_name"])) {
    $target_dir = "../uploads/";
    $filename = basename($_FILES["fileToUpload"]["name"]);
    $filetype = preg_split("/\./", $filename)[1];
    echo $filetype;
    $target_file = $target_dir . $_SESSION["id"] . "." . $filetype;

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "A  " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " fájl feltöltésre került!";
    } else {
        echo "Sajnos hiba történt a fájl feltöltése során.";
    }
}
