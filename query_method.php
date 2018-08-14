<?php

include 'pdosnip.php';

foreach($pdo->query('SELECT * from task') as $row) {
    echo htmlentities($row['task']). "<br>";
}
