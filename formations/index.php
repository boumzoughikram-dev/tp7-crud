<?php require_once '../database/connexion.php';
$rows = $pdo->query("SELECT * FROM formation ORDER BY id_formation")->fetchAll(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Formations</title>
<link rel="stylesheet" href="../style/style.css">
</head>
<body>
<p><a href="../index.php">Accueil</a></p>
<h1>Formations</h1>
<p><a href="create.php">+ Ajouter une formation</a></p>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Titre</th><th>Durée (mois)</th><th>Description</th><th>prix</th><th>Actions</th></tr>
<?php foreach ($rows as $r): ?>
<tr>
  <td><?= h($r['id_formation']) ?></td><td><?= h($r['titre']) ?></td>
  <td><?= h($r['duree_mois']) ?></td><td><?= h($r['description']) ?></td><td><?= h($r['prix']) ?></td>
  <td><a href="edit.php?id=<?= $r['id_formation'] ?>">Modifier</a> |
      <a href="delete.php?id=<?= $r['id_formation'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a></td>
</tr>
<?php endforeach; ?>
</table>
</body></html>