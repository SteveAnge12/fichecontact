<?php
// Configuration des informations de connexion à la base de données
$servername = "localhost";
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL
$password = ""; // Remplacez par votre mot de passe MySQL
$dbname = "fiche_contact";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$message = '';
$message_type = '';

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Préparer la requête SQL
    $stmt = $conn->prepare("INSERT INTO formulaire (
        heure_arrivee, 
        date, 
        numero_ticket, 
        nom, 
        matricule, 
        telephone, 
        nom_representant, 
        telephone_representant, 
        reclamation, 
        demande, 
        heure_prise_en_charge, 
        traitement_effectue, 
        nom_signature_charged_acceuil, 
        signature_assure
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Erreur de préparation : " . $conn->error);
    }

    // Lier les paramètres
    $reclamation = isset($_POST['reclamation']) ? implode(", ", $_POST['reclamation']) : '';
    $demande = isset($_POST['demande']) ? implode(", ", $_POST['demande']) : '';

    // Spécifiez les types de paramètres
    $stmt->bind_param(
        "ssssssssssssss",
        $_POST['heure_arrivee'],
        $_POST['date'],
        $_POST['numero_ticket'],
        $_POST['nom'],
        $_POST['matricule'],
        $_POST['telephone'],
        $_POST['nom_representant'],
        $_POST['telephone_representant'],
        $reclamation,
        $demande,
        $_POST['heure_prise_en_charge'],
        $_POST['traitement_effectue'],
        $_POST['nom_signature_charged_acceuil'],
        $_POST['signature_assure']
    );

    // Exécuter la requête
    if ($stmt->execute()) {
        $message = "Les données ont été enregistrées avec succès.";
        $message_type = 'success';
    } else {
        $message = "Erreur : " . $stmt->error;
        $message_type = 'error';
    }

    $stmt->close();
    $conn->close();
}

// Inclure le code HTML ici
include('contact.html'); // Remplacez par le nom de votre fichier HTML
?>
