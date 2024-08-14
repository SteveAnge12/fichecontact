<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résumé des Soumissions</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Résumé des Soumissions</h1>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Heure d'Arrivée</th>
                    <th>Date</th>
                    <!-- Ajoutez les autres colonnes ici -->
                </tr>
            </thead>
            <tbody>
                <!-- Remplir dynamiquement avec les données -->
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    </div>
</body>
</html>
