<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation de livraison</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
    <div class="row">
        <div class="col">
            <?php foreach($products as $p)  {
                ?>
            <div class="card" style="max-width: 320px">
            <img src="images/<?= $p['img'] ?>" class="card-img-top" alt="Product Image">
            <div class="card-body">
                <h5 class="card-title"><?= $p['nom'] ?></h5>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="h5 mb-0">$<?= $p['prix'] ?></span>
                    <div>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                        <small class="text-muted">Masse: <?= $p['masse']?> kg</small>
                    </div>
                </div>
            </div>
                <div class="card-footer d-flex justify-content-between bg-light product-card" id="div-product<?= $p['id'] ?>">
                    <button class="btn btn-primary btn-sm product-button" data-id="<?= $p['id'] ?>">+</button>
                    <button class="btn btn-primary btn-sm delete-product-button" data-id="<?= $p['id'] ?>">-</button>
                </div>
            </div>
            <?php
            }?>
        </div>
        <div class="col">
            <form id="form-livraison">
                <label for="entrepot_depart">Entrepot depart</label>
                <select name="id_entrepot" id="">
                    <?php foreach($entrepots as $entrepot) {
                        ?>
                            <option value="<?= $entrepot['id'] ?>"><?= $entrepot['adr_entrepot'] ?></option>
                        <?php
                    } ?>
                </select>
                <label for="adr_destination">Adresse destination</label>
                <input type="text" name="adr_destination">
                <label for="voiture">Voiture</label>
                <input type="text" name="voiture">
                <label for="chauffeur">Chauffeur</label>
                <select name="id_chauffeur">
                    <?php foreach($chauffeurs as $chauffeur) {
                        ?>
                            <option value="<?= $chauffeur['id'] ?>"><?= $chauffeur['nom'] ?></option>
                        <?php
                    } ?>
                </select>
                <label for="salaire">Salaire chauffeur</label>
                <input type="number" name="salaire_chauffeur" id="">
                <label for="date_livraison">Date livraison</label>
                <input type="date" name="date_livraison" id="">
                <button type="submit">Commencer livraison</button>
            </form>
            <!-- <div id="added-products">
                <h3>Produits ajoute au coli: </h3>
                <div id="div-product">
                    <p>
                        <span id="quantity"></span>
                    </p>
                </div>
            </div> -->
        </div>
    </div>
    <script src="/js/script-livraison.js" type="text/javascript" nonce="<?= htmlspecialchars($nonce)?>">
    </script>
</body>
</html>