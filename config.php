<?php
session_start();

global $pdo;

try {
    $pdo = new PDO("mysql:dbname=classificados;host=localhost:3306", "mateus", "mateus");
} catch(PDOException $e) {
    echo "Erro: ".$e->getMessage();
}