<?php require_once '../database/connexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $st = $pdo->prepare("INSERT INTO module (nom_module, volume_horaire, id_formation) VALUES (?, ?, ?)");
    $st->execute([$_POST['nom_module'], $_POST['volume_horaire'], $_POST['id_formation']]);
    header('Location: index.php'); exit;
}
$formations = $pdo->query("SELECT id_formation, titre FROM formation ORDER BY titre")->fetchAll(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"><title>Ajouter module</title></head>
<body>
<p><a href="index.php">Retour à la liste</a></p>
<h1>Ajouter un module</h1>
<form method="post">
  <p>Intitulé : <input name="nom_module" required></p>
  <p>Volume horaire : <input type="number" name="volume_horaire" min="1" required></p>
  <p>Formation :
    <select name="id_formation" required>
      <option value="">-- Choisir --</option>
      <?php foreach ($formations as $f): ?>
        <option value="<?= $f['id_formation'] ?>"><?= h($f['titre']) ?></option>
      <?php endforeach; ?>
    </select></p>
  <button>Enregistrer</button>
</form>
</body></html>