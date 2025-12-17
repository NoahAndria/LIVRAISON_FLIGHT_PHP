<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>Ajout de produit </h1>
    <form action="/addhandler" method="post" enctype="multipart/form-data">
        <label for="nom">Entrez le nom du produit</label>
        <input type="text" name="nom">
        <label for="prix">Entrez le prix du produit</label>
        <input type="text" name="prix">
        <label for="desc">Entrez une description du nouveau produit</label>
        <input type="text" name="desc">
        <label for="image">Choisissez une image du nouveau produit</label>
        <input type="file" name="image">
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>