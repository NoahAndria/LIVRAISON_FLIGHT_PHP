<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Page de recherche de benefices avec filtre
    <form action="/listebenefice/recherche" method="get">
        <label for="day">Jour</label>
        <input type="number" name="day" id="">
        <label for="month">Mois</label>
        <input type="number" name="month" id="">
        <label for="year">Annee</label>
        <input type="number" name="year" id="">
        <input type="submit" value="Chercher">
    </form>
</body>
</html>