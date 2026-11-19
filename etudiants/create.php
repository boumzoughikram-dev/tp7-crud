<?php require_once '../database/connexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $st = $pdo->prepare("INSERT INTO etudiant (nom, prenom, email, id_formation) VALUES (?, ?, ?, ?)");
    $st->execute([$_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['id_formation']]);
    header('Location: index.php'); exit;
}
$formations = $pdo->query("SELECT id_formation, titre FROM formation ORDER BY titre")->fetchAll(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"><title>Ajouter étudiant</title></head>
<body>
<p><a href="index.php">Retour à la liste</a></p>
<h1>Ajouter un étudiant</h1>
<form method="post">
  <p>Nom : <input name="nom" required></p>
  <p>Prénom : <input name="prenom" required></p>
  <p>Email : <input type="email" name="email" required></p>
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