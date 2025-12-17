<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>Modification de produit </h1>
    <form action="/updatehandler" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_produit" value=<?= $product['id'] ?>>
        <label for="nom">Modifiez le nom du produit (si necessaire)</label>
        <input type="text" name="nom" value="<?= $product['nom'] ?>">
        <label for="prix">Modifiez le prix du produit (si necessaire)</label>
        <input type="text" name="prix" value="<?= $product['prix'] ?>">
        <label for="desc">Modifiez la description du nouveau produit (si necessaire)</label>
        <input type="text" name="desc" value="<?= $product['desc_produit'] ?>">
        <?php
            $filename = "";
            $parts = preg_split("/-/", $product['img']);
            if(count($parts) > 1) {
                $filename = $parts[1];
            } else {
                $filename = $parts[0];
            }
        ?>
        <input type="text" value="Ancien image: <?= $filename ?>" readonly>
        <label for="image">Choisissez une image du nouveau produit (si necessaire)</label>
        <input type="file" name="image">
        <button type="submit">Modifier</button>
    </form>
</body>
</html>