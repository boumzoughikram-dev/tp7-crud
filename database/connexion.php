<?php
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=tp7_crud;charset=utf8mb4',
        'root', '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}
function h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }