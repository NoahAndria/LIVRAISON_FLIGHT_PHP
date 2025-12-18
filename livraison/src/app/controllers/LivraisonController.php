<?php 
namespace app\controllers;
use flight\Engine;
use Flight;
use app\models\Produit;
use app\models\Livraison;
use app\models\Entrepot;
use app\models\Chauffeur;
class LivraisonController {
    protected Engine $app;
    public function __construct($app) {
        $this->app = $app;
    }
    public function passVariables() {
        $nonce = base64_encode(random_bytes(16));
    
        // Set CSP header
        Flight::response()->header(
            'Content-Security-Policy',
            "script-src 'self' 'nonce-{$nonce}' 'strict-dynamic';"
        );
        // Pass nonce to template
        $prod = new Produit();
		$this->app->render('ajout_livraison', [
            'products' => $prod->getProducts($this->app->db()),
            'entrepots' => $this->getEntrepots(),
            'chauffeurs' => $this->getChauffeurs(),
            'nonce' => $nonce
        ]);
    }
    public function getEntrepots() {
        $e = new Entrepot();
        return $e->findAll($this->app->db());
    }
    public function getChauffeurs() {
        $c = new Chauffeur();
        return $c->findAll($this->app->db());
    }
    public function handleLivraison() {
		$req = Flight::request();
        $l = new Livraison();
        if($l->livrer($this->app->db(), $req->data) == 0) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "failure"]);
        }
    }
}
?>