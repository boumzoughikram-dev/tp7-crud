<?php require_once '../database/connexion.php';
$rows = $pdo->query("SELECT e.*, f.titre AS formation
    FROM etudiant e JOIN formation f ON e.id_formation = f.id_formation
    ORDER BY e.id_etudiant")->fetchAll(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Étudiants</title>
<link rel="stylesheet" href="../style/style.css">
</head>
<body>
<p><a href="../index.php">Accueil</a></p>
<h1>Étudiants</h1>
<p><a href="create.php">+ Ajouter un étudiant</a></p>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Formation</th><th>Actions</th></tr>
<?php foreach ($rows as $r): ?>
<tr>
  <td><?= h($r['id_etudiant']) ?></td><td><?= h($r['nom']) ?></td><td><?= h($r['prenom']) ?></td>
  <td><?= h($r['email']) ?></td><td><?= h($r['formation']) ?></td>
  <td><a href="edit.php?id=<?= $r['id_etudiant'] ?>">Modifier</a> |
      <a href="delete.php?id=<?= $r['id_etudiant'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a></td>
</tr>
<?php endforeach; ?>
</table>
</body></html>