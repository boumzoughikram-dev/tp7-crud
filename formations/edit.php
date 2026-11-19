<?php require_once '../database/connexion.php';
$id = (int)($_GET['id'] ?? $_POST['id'] ?? 0);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $st = $pdo->prepare("UPDATE formation SET titre=?, duree_mois=?, description=? WHERE id_formation=?");
    $st->execute([$_POST['titre'], $_POST['duree_mois'], $_POST['description'], $id]);
    header('Location: index.php'); exit;
}
$st = $pdo->prepare("SELECT * FROM formation WHERE id_formation=?");
$st->execute([$id]);
$f = $st->fetch(PDO::FETCH_ASSOC);
if (!$f) die('Formation introuvable'); ?>
<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"><title>Modifier formation</title></head>
<body>
<p><a href="index.php">Retour à la liste</a></p>
<h1>Modifier la formation</h1>
<form method="post">
  <input type="hidden" name="id" value="<?= $id ?>">
  <p>Titre : <input name="titre" value="<?= h($f['titre']) ?>" required></p>
  <p>Durée (mois) : <input type="number" name="duree_mois" value="<?= h($f['duree_mois']) ?>" required></p>
  <p>Description :<br><textarea name="description"><?= h($f['description']) ?></textarea></p>
  <p>Prix : <input type="number" name="prix" value="<?= h($f['prix']) ?>"></p>
  
  <button>Mettre à jour</button>
</form>
</body></html>