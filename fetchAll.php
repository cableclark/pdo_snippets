<?php
include 'pdosnip.php';

$stmt = $pdo->prepare('SELECT * from task WHERE task = ?');

 $stmt->bindValue(1, "Dickhead");

foreach ($results as $row) {
    
    $task = htmlentities($row['1']);

    echo $task . "<br> ";
}
