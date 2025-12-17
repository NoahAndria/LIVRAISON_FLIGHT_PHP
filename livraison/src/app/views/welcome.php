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
        <h1>Bienvenue sur notre boutique</h1>
        <section class="product-list">
        <?php 
            // echo sizeof($products);
            // var_dump($products);
            foreach($products as $product) {
        ?>

            <article class="product-card">
                <a href="produit/<?= $product['id'] ?>">
                    <img src="./images/<?= $product['img']?>" alt="<?= $product['nom']?>">
                    <h2><?= $product['nom']?></h2>
                    <p>Prix : <?= $product['prix']?> Ar</p>
                    <a href="delete/<?= $product['id'] ?>">Delete</a>
                    <a href="redirectupdate/<?= $product['id'] ?>">Update</a>
                </a>
            </article>
            <?php
            }
        ?>
            <!-- Ajoutez d'autres produits ici -->
        </section>
    </main>
    <footer>
        <p>&copy; 2025 E-Varotra</p>
    </footer>
</body>
</html>


