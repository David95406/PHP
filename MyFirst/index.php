<?php
$txt = "World";

$a = 2;
$b = 9;
$c = "4";
$d = true;
$e = false;
$f = true * 7;
$x = true / 11;

echo "Hello $txt!<br>";
echo (($a + $b + $c + $d) * $e) + $f;
echo "<br>", $x, "<br>";
echo var_dump($x);
?>

<p>hello</p>
<?php
echo " world!";

function getAladar(): string {
    $return_value = "Aladar";
    return $return_value;
}

echo "<br>", getAladar(), "<br>";

static $leon = "Leon";
echo $leon;

function changeLeon(): void {
    global $leon;
    $leon = "Lon";
}
changeLeon();
echo "<br>", $leon;
echo str_split($leon,round(strlen($leon) / 2))[1];
echo "<br>", strlen($leon);

$v = 5;
$k = 4;
echo "<br>", $v <=> $k;

/**
 * "" -> php felfogja hogy valtozo
 * '' -> sima szoveg
 */

$i = 0;
while ($i < 10) {
    $i++;
    echo "$i";
    if ($i == 4) continue;
}

for ($i = 0; $i < rand(1, 200); $i++) {
    echo "<br><p>Hello World! $i</p>";
}

?>