<?php 
namespace app\controllers;
use flight\Engine;
use Flight;
use app\models\Produit;
class LivraisonController {
    protected Engine $app;
    public function __construct($app) {
        $this->app = $app;
    }
    public function getProducts() {
        $prod = new Produit();
		$this->app->render('ajout_livraison', ['products' => $prod->getProducts($this->app->db())]);
    }
}
?>