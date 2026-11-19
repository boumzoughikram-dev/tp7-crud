<?php require_once '../database/connexion.php';
$id = (int)($_GET['id'] ?? $_POST['id'] ?? 0);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $st = $pdo->prepare("UPDATE etudiant SET nom=?, prenom=?, email=?, id_formation=? WHERE id_etudiant=?");
    $st->execute([$_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['id_formation'], $id]);
    header('Location: index.php'); exit;
}
$st = $pdo->prepare("SELECT * FROM etudiant WHERE id_etudiant=?");
$st->execute([$id]);
$e = $st->fetch(PDO::FETCH_ASSOC);
if (!$e) die('Étudiant introuvable');
$formations = $pdo->query("SELECT id_formation, titre FROM formation ORDER BY titre")->fetchAll(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"><title>Modifier étudiant</title></head>
<body>
<p><a href="index.php">Retour à la liste</a></p>
<h1>Modifier l'étudiant</h1>
<form method="post">
  <input type="hidden" name="id" value="<?= $id ?>">
  <p>Nom : <input name="nom" value="<?= h($e['nom']) ?>" required></p>
  <p>Prénom : <input name="prenom" value="<?= h($e['prenom']) ?>" required></p>
  <p>Email : <input type="email" name="email" value="<?= h($e['email']) ?>" required></p>
  <p>Formation :
    <select name="id_formation" required>
      <?php foreach ($formations as $f): ?>
        <option value="<?= $f['id_formation'] ?>" <?= $f['id_formation'] == $e['id_formation'] ? 'selected' : '' ?>><?= h($f['titre']) ?></option>
      <?php endforeach; ?>
    </select></p>
  <button>Mettre à jour</button>
</form>
</body></html>