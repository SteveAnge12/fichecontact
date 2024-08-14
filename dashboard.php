<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fiche_contact";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les dernières entrées du formulaire
$sql = "SELECT * FROM formulaire ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
$formData = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fiche.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Résumé des Informations</title>
    <style>
        .summary-container {
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 900px;
        }
        .summary-item {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container summary-container">
        <h2>Résumé des Informations</h2>
        <div class="summary-item">
            <h4>Heure d'arrivée:</h4>
            <p><?php echo htmlspecialchars($formData['heure_arrivee']); ?></p>
        </div>
        <div class="summary-item">
            <h4>Date:</h4>
            <p><?php echo htmlspecialchars($formData['date']); ?></p>
        </div>
        <!-- Ajoutez ici d'autres champs selon les besoins -->
        <div class="summary-item">
            <h4>Nom:</h4>
            <p><?php echo htmlspecialchars($formData['nom']); ?></p>
        </div>
        <div class="summary-item">
            <h4>Matricule:</h4>
            <p><?php echo htmlspecialchars($formData['matricule']); ?></p>
        </div>
        <div class="summary-item">
            <h4>Réclamations:</h4>
            <p><?php echo htmlspecialchars($formData['reclamation']); ?></p>
        </div>
        <div class="summary-item">
            <h4>Demandes:</h4>
            <p><?php echo htmlspecialchars($formData['demande']); ?></p>
        </div>
        <!-- Ajouter un bouton pour revenir au formulaire -->
        <a href="contact.html" class="btn btn-primary">Revenir au Formulaire</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
