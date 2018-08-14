<?php
include 'pdosnip.php';

$stmt1 = $pdo->prepare('SELECT * from task WHERE task = :todo');

$stmt1->bindValue(":todo", 'igor');

$stmt1->execute();


while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
    
    echo htmlentities($row['task']). "<br>";

}