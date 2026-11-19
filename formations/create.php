<?php require_once '../database/connexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $st = $pdo->prepare("INSERT INTO formation (titre, duree_mois, description) VALUES (?, ?, ?)");
    $st->execute([$_POST['titre'], $_POST['duree_mois'], $_POST['description']]);
    header('Location: index.php'); exit;
} ?>
<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"><title>Ajouter formation</title></head>
<body>
<p><a href="index.php">Retour à la liste</a></p>
<h1>Ajouter une formation</h1>
<form method="post">
  <p>Titre : <input name="titre" required></p>
  <p>Durée (mois) : <input type="number" name="duree_mois" min="1" required></p>
  <p>Description :<br><textarea name="description"></textarea></p>
  <p>Prix : <input type="number" name="prix"></p>
  <button>Enregistrer</button>
</form>
</body></html>