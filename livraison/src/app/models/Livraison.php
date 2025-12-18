<?php 
namespace app\models;
class Livraison {
    public function __construct() {

    }
    public function saveProducts($db, $products, $id_livraison) {
        foreach($products as $id => $qtt) {
            $ps = $db->prepare("insert into Produits_coli (id_produit, id_livraison, quantite) values (?, ?, ?)");
            $ps->bindValue(1, $id);
            $ps->bindValue(2, $id_livraison);
            $ps->bindValue(3, $qtt);
            $ps->execute();
        }
        return;
    }
    public function livrer($db, $data) {
        $products = [];
        $livraison = [];
        foreach($data as $key => $value) {
            if(is_int($key)) {
                $products[$key] = $value;
            } else {
                $livraison[$key] = $value;
            }
        }
        $id_entrepot = $livraison['id_entrepot'];
        $adr_destination = $livraison['adr_destination'];
        $voiture = $livraison['voiture'];
        $date_livraison = $livraison['date_livraison'];
        $id_chauffeur = $livraison['id_chauffeur'];
        $salaire_chauffeur = $livraison['salaire_chauffeur'];
        $ps = $db->prepare("insert into Livraison_coli (id_entrepot_depart, adr_destination, voiture, date_livraison, id_chauffeur, salaire_chauffeur) values (?, ?, ?, ?, ?, ?)");
        $ps->bindValue(1, $id_entrepot);
        $ps->bindValue(2, $adr_destination);
        $ps->bindValue(3, $voiture);
        $ps->bindValue(4, $date_livraison);
        $ps->bindValue(5, $id_chauffeur);
        $ps->bindValue(6, $salaire_chauffeur);
        $db->beginTransaction();
        try {
            $ps->execute();
            $id_livraison = $db->lastInsertId();
            $this->saveProducts($db, $products, $id_livraison);
            $db->commit();
            return 0;
        } catch (Exception $e) {
            $db->rollBack();
        }
        return 1;
    }
}

?>