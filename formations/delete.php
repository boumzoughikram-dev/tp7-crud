<?php require_once '../database/connexion.php';
$id = (int)($_GET['id'] ?? 0);
try {
    $st = $pdo->prepare("DELETE FROM formation WHERE id_formation = ?");
    $st->execute([$id]);
    header('Location: index.php'); exit;
} catch (PDOException $e) {
    echo "<p>Suppression impossible : cette formation contient encore des étudiants ou des modules. Supprimez-les d'abord.</p>";
    echo '<p><a href="index.php">Retour à la liste</a></p>';
}