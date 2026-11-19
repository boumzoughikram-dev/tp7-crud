<?php require_once '../database/connexion.php';
$id = (int)($_GET['id'] ?? 0);
$st = $pdo->prepare("DELETE FROM etudiant WHERE id_etudiant = ?");
$st->execute([$id]);
header('Location: index.php');