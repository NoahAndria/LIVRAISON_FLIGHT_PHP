<?php
namespace app\models;
class LivraisonDAO {
    private $db;
    
    public function __construct($db){
        $this->db = $db;
    }
	
    public function getAllLivraison() {
		$livraison = $this->db->fetchAll("SELECT * FROM v_livraisons_detail");
		return $livraison;
	}
    public function getLivraisonById($id){
        $sql = $this->db->prepare("select * from v_livraisons_detail where id_livraison = :id");
        $sql->execute(
            [
                ':id' => $id
            ]
        );
        $row = $sql->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }
	public function getEntrepotNameFromId($id){
        $sql = $this->db->prepare("select adr_entrepot from Entrepot where id = :id");
        return $sql->fetch(
            [
                ':id' => $id
            ]
        );

    }
    public function getEtatFromId($id){
        $sql = $this->db->prepare("select desc_etat from Etat_livraison where id = :id");
        return $sql->fetch(
            [
                ':id' => $id
            ]
        );

    }
    public function getAllEtats() {
        
		$etats = $this->db->fetchAll("SELECT * FROM Etat_livraison");
		return $etats;
	}
    public function etatHTMLSelect(){
        $states = $this->getAllEtats();
        $html = "<select name='etat'>";
        foreach($states as $etat){
            $html = $html."<option value = '".$etat['id']."'>";
            $html = $html.$etat['desc_etat']."</option>";
        }
        $html = $html."</select>";
        return $html;
    }
    public function updateState($idlivraison, $idstate){
        $intliv = intval($idlivraison);
        $intstate = intval($idstate);

        $sql = $this->db->prepare("update Livraison_coli set id_etat = :ids where id = :id ");
        return $sql->execute(
            [
                ':ids' => $intstate,
                ':id' => $intliv
            ]
        );
    }
    public static function compteColi($idlivraison){
            $db_attr = Flight::db();
            $sql = $db_attr->prepare("select * from Produits_coli where id_livraison = :id");
            $sql->execute(
                [
                    ':id' => $idlivraison
                ]
            );
            $row = $sql->fetch(\PDO::FETCH_ASSOC);
            return $row;
    
    }
}
?>