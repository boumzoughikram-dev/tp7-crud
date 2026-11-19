<?php require_once '../database/connexion.php';
$id = (int)($_GET['id'] ?? $_POST['id'] ?? 0);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $st = $pdo->prepare("UPDATE module SET nom_module=?, volume_horaire=?, id_formation=? WHERE id_module=?");
    $st->execute([$_POST['nom_module'], $_POST['volume_horaire'], $_POST['id_formation'], $id]);
    header('Location: index.php'); exit;
}
$st = $pdo->prepare("SELECT * FROM module WHERE id_module=?");
$st->execute([$id]);
$m = $st->fetch(PDO::FETCH_ASSOC);
if (!$m) die('Module introuvable');
$formations = $pdo->query("SELECT id_formation, titre FROM formation ORDER BY titre")->fetchAll(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"><title>Modifier module</title></head>
<body>
<p><a href="index.php">Retour à la liste</a></p>
<h1>Modifier le module</h1>
<form method="post">
  <input type="hidden" name="id" value="<?= $id ?>">
  <p>Intitulé : <input name="nom_module" value="<?= h($m['nom_module']) ?>" required></p>
  <p>Volume horaire : <input type="number" name="volume_horaire" value="<?= h($m['volume_horaire']) ?>" required></p>
  <p>Formation :
    <select name="id_formation" required>
      <?php foreach ($formations as $f): ?>
        <option value="<?= $f['id_formation'] ?>" <?= $f['id_formation'] == $m['id_formation'] ? 'selected' : '' ?>><?= h($f['titre']) ?></option>
      <?php endforeach; ?>
    </select></p>
  <button>Mettre à jour</button>
</form>
</body></html>