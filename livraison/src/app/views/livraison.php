<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - E-commerce</title>
    <link rel="stylesheet" href="<?= Flight::request()->getBaseUrl() ?>/styles.css">
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
        <h1>Bienvenue sur notre site</h1>
        <section class="product-list">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Adresse Entrepot</th>
                        <th>Adresse Destination</th>
                        <th>Etat</th>
                        <th>Action</th>
                    </tr>
                </thead>
        <tbody>

            <tr>
                <td><?= $livraison['id_livraison'];?></td>
                <td><?= $livraison['adr_entrepot'];?></td>
                <td><?= $livraison['adr_destination'];?>
                <form action="<?= Flight::request()->getBaseUrl()?>/traiteModif" method="get">
                <td><?= $choix ;?></td> <!-- Note that the variable choix has been defined in routes-->
                <td>
                    <input type="hidden" name="id" value=<?= $livraison['id_livraison'];?>>
                    <input type="submit" value="Modifier">
                </td>
                </form>
                </td>
            </tr>
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


