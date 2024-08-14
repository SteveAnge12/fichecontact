<?php
// Page de confirmation (confirmation.php)

// Récupérer les informations du formulaire depuis la session ou les variables POST
// Assurez-vous que les données sont correctement validées et échappées pour éviter les failles XSS
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de la Soumission</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Confirmation de Soumission</h1>
        <p>Merci pour votre soumission ! Voici les informations que vous avez fournies :</p>
        <table>
            <tr>
                <th>Heure d'Arrivée</th>
                <td><?php echo htmlspecialchars($_POST['heure_arrivee']); ?></td>
            </tr>
            <tr>
                <th>Date</th>
                <td><?php echo htmlspecialchars($_POST['date']); ?></td>
            </tr>
            <!-- Ajoutez les autres champs de la même manière -->
        </table>
        <a href="contact.html">Retour au Formulaire</a>
    </div>
</body>
</html>
