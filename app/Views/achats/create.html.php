<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Sales</title>
    <link rel="stylesheet" href="/assets/styles/achat.css">
    <link rel="stylesheet" href="/assets/styles/header.css">
    <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
</head>
<body>
    <?php require_once 'components/users.php' ?>
    <div class="container">
        <h1>Gestion des Ventes de Médicaments</h1>
        <form id="saleForm" method="POST" action="">
            <div id="medicamentContainer">
                <div class="medicament-group">
                    <input required class="premier" type="text" class="medicament" placeholder="Nom du médicament">
                    <input required class="premier-1" type="number" class="prix" placeholder="Prix" readonly>
                    <input required class="premier-2" type="number" class="nombre" placeholder="Nombre">
                    <ul class="suggestions"></ul>
                </div>
            </div>
            <button type="button" id="addMedicament">Ajouter un médicament</button>
            <button type="submit">Enregistrer la vente</button>
        </form>
        <h2>Ventes enregistrées</h2>
        <ul id="salesList"></ul>
    </div>

    <script src="/assets/script/achats.js"></script>
</body>
</html>