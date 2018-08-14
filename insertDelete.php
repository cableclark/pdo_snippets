<?php
include 'pdosnip.php';


$stmt = $pdo->prepare("INSERT INTO `task` (`task`) VALUES (?)");

$stmt->bindValue(1, 'bigorcence');

$stmt->execute();


//named parametars

$stmt = $pdo->prepare("UPDATE `task` SET task = :newtask WHERE id = :id");

$stmt->bindValue(':newtask', 'Treba da jadam nesso');

$stmt->bindValue(':id', '9');

$stmt->execute();

//Deleting

$stmt = $pdo->prepare("DELETE `task` FROM task WHERE id = :id");

$stmt->bindValue(':id', '9');

$stmt->execute();





