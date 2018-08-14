<?php
include 'pdosnip.php';

$stmt = $pdo->prepare('SELECT * from task WHERE id = ?');

$stmt->bindValue(1, '7');
$stmt->execute();



while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
    var_dump($row);

}



$stmt1 = $pdo->prepare('SELECT * from task WHERE id = ? AND task = ?');

$stmt1->bindValue(1, '13');
$stmt1->bindValue(2, 'igor');
$stmt1->execute();

while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
    
    echo htmlentities($row['task']). "<br>";

}

// with variables
$name = "igor";
$stmt2 = $pdo->prepare('SELECT * from task WHERE task = ?');

$stmt2->bindParam(1, $name);
$stmt2->execute();


while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    
    echo htmlentities($row['task']). "<br>";

}

