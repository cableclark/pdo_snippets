<?php


$host = '127.0.0.1';
$db   = '';
$user = '';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $opt);

// Running queries. PDO::query()

$stmt = $pdo->query('SELECT name FROM users');

while ($row = $stmt->fetch())
{
    echo $row['name'] . "\n";
}

//Prepared statements

$sql = 'SELECT * FROM users WHERE email = ? AND status=?';
$stmt->execute([$email, $status]);
$user = $stmt->fetch();

//or

$sql = 'SELECT * FROM users WHERE email = :email AND status=:status';
$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email AND status=:status');
$stmt->execute(['email' => $email, 'status' => $status]);
$user = $stmt->fetch();


//Running SELECT INSERT, UPDATE, or DELETE statements

//UPDATE
$sql = "UPDATE users SET name = ? WHERE id = ?";
$pdo->prepare($sql)->execute([$name, $id]);

//DELETE
$stmt = $pdo->prepare("DELETE FROM goods WHERE category = ?");
$stmt->execute([$cat]);
$deleted = $stmt->rowCount();


//Getting data out of statement. foreach()

$stmt = $pdo->query('SELECT name FROM users');

foreach ($stmt as $row)
{
    echo $row['name'] . "\n";
}

//Getting data out of statement. fetch()

// PDO::FETCH_NUM returns enumerated array
// PDO::FETCH_ASSOC returns associative array
// PDO::FETCH_BOTH - both of the above
// PDO::FETCH_OBJ returns object
// PDO::FETCH_LAZY allows all three (numeric associative and object) methods without memory overhead.

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$news = $pdo->query('SELECT * FROM news')->fetchAll(PDO::FETCH_CLASS, 'News');


//Getting data out of statement. fetchColumn()

$stmt = $pdo->prepare("SELECT name FROM table WHERE id=?");
$stmt->execute([$id]);
$name = $stmt->fetchColumn();


// Getting number of rows in the table utilizing method chaining

$count = $pdo->query("SELECT count(*) FROM table")->fetchColumn();

