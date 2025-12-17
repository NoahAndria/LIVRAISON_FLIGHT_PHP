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
            'nonce' => $nonce
        ]);
    }
}
?>