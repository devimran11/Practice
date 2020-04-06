<?php

$pdo = new PDO('mysql:hostname=127.0.0.1;dbname=oop-2', 'root', '');

$stat = $pdo->prepare("SELECT * from students");

$stat->execute();

var_dump($stat->fetchColumn());