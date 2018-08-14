<?php

include 'pdosnip.php';

$stmt = $pdo->query('SELECT * from task');

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo htmlentities($row['task']) . "<br>";
}
