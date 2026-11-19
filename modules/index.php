<?php require_once '../database/connexion.php';
$rows = $pdo->query("SELECT m.*, f.titre AS formation
    FROM module m JOIN formation f ON m.id_formation = f.id_formation
    ORDER BY m.id_module")->fetchAll(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Modules</title>
<link rel="stylesheet" href="../style/style.css">
</head>
<body>
<p><a href="../index.php">Accueil</a></p>
<h1>Modules</h1>
<p><a href="create.php">+ Ajouter un module</a></p>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Intitulé</th><th>Volume (h)</th><th>Formation</th><th>Actions</th></tr>
<?php foreach ($rows as $r): ?>
<tr>
  <td><?= h($r['id_module']) ?></td><td><?= h($r['nom_module']) ?></td>
  <td><?= h($r['volume_horaire']) ?></td><td><?= h($r['formation']) ?></td>
  <td><a href="edit.php?id=<?= $r['id_module'] ?>">Modifier</a> |
      <a href="delete.php?id=<?= $r['id_module'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a></td>
</tr>
<?php endforeach; ?>
</table>
</body></html>