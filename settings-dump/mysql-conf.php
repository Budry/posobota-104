<?php

$dbName = "";
$host = "";
$user = "";
$password = "";
$dsn = "mysql:dbname={$dbName};host={$host}";

$pdo = new \PDO($dsn, $user, $password);

$query = $pdo->query("SHOW VARIABLES");

$rows = $query->fetchAll();

$output = fopen(__DIR__ . '/mysql-config.cnf', 'a+');
fwrite($output, "[mysqld]" . PHP_EOL);
foreach ($rows as $row) {
    if (!empty($row['Value']))
        fwrite($output, "{$row['Variable_name']} = {$row['Value']}" . PHP_EOL);
}
fclose($output);