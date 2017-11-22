<?php

$newcode = "students";

require('../../database/Connection.php');

$database = new Connection();
$db = $database->openConnection();

$file = "../../output/$newcode.txt";
$f = fopen($file, 'w'); // Open in write mode


$count = "select * from student LIMIT 0,10"; // SQL to get 10 records

foreach ($db->query($count) as $row) {

    $scoredata[] = implode("; ", $row);

}

fwrite($f, implode("\r\n", $scoredata));

fclose($f);

echo "<a href=../../output/$newcode.txt>TEST!</a>";

?>