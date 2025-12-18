<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - E-commerce</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="#" class="logo">E-Varotra</a>
                <ul class="menu">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="/add">Add product</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <h1>Liste des livraisons</h1>
        <section class="product-list">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre de produits</th>
                        <th>Adresse Entrepot</th>
                        <th>Adresse Destination</th>
                        <th>Etat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
        <tbody>
        <?php
            foreach($liste_livraison as $livraison) {
        ?>
            <tr>
                <td><?= $livraison['id_livraison'];?></td>
                <td><?= LivraisonDAO::compteColi($livraison['id_livraison']); ?></td>
                <td><?= $livraison['adr_entrepot'];?></td>
                <td><?= $livraison['adr_destination'];?></td>
                <td><?= $livraison['desc_etat'];?></td>
                <td><a href="<?= Flight::request()->getBaseUrl() ?>/modif/<?= $livraison['id_livraison']?>">Modifier</a></td>
            </tr>
            <?php
            }
        ?>
        </tbody>

            <!-- Ajoutez d'autres produits ici -->
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 E-Varotra</p>
    </footer>
</body>
</html>


