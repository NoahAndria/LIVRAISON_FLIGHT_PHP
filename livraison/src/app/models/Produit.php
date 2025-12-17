<?php
namespace app\models;
class Produit {
	private int $id;
	private string $nom;
	private float $prix;
	private string $img;

	
    public function getProducts($db) {
		$products = $db->fetchAll("SELECT * FROM Produit");
		return $products;
	}
	public function getProduct($db, $id) {
		$products = $this->getProducts($db);
		foreach($products as $p) {
			if($p['id'] == $id) {
				return $p;
			}
		}
		return $products[0];	
	}


	public function __construct($ID = 0) {
		$this->id = $ID;
	}
	public function save($db) {
		$ps = $db->prepare("insert into Produit (nom, prix, img, desc_produit) values (?, ?, ?, ?)");
		$ps->bindValue(1, $this->nom);
		$ps->bindValue(2, $this->prix);
		$ps->bindValue(3, $this->img);
		$ps->bindValue(4, $this->desc);
		$ps->execute();
		echo "Product saved successfully!";
	}

	public function delete($db) {
		$ps = $db->prepare("delete from Produit where id = ?");
		$ps->bindValue(1, $this->id);
		$ps->execute();
		echo "Product id number".$this->id." delete successfully";
	}

	public static function update($db, Produit $p) {
		$ps = $db->prepare("update Produit set nom = ?, prix = ?, img = ?, desc_produit = ? where id = ?");
		$ps->bindValue(1, $p->nom);
		$ps->bindValue(2, $p->prix);
		$ps->bindValue(3, $p->img);
		$ps->bindValue(4, $p->desc);
		$ps->bindValue(5, $p->id);
		$ps->execute();
		echo "Product updated successfully";
	}

	public function setNom(string $n) {
		$this->nom = $n;
	}
	public function setPrix(float $p) {
		$this->prix = $p;
	}
	public function setImg(string $i) {
		$this->img = $i;
	}
	public function setDesc(string $d) {
		$this->desc = $d;
	}

}
?>