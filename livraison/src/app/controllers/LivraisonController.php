<?php 
namespace app\controllers;
use app\models\LivraisonDAO;
use flight\Engine;
use Flight;
use app\models\Produit;
use app\models\Chauffeur;
use app\models\Livraison;
use app\models\Entrepot;
class LivraisonController {
    protected Engine $app;
    public function __construct($app) {
        $this->app = $app;
    }
    
    public function loadHome() { 
        //This function is called upon going in the root of the webiste, which
        //sends it to the list of 'Livraisons' after a call to product DAO
        
        $livraisondao = new LivraisonDao(Flight::db());
        $livraisons = $livraisondao->getAllLivraison();
        Flight::render('welcome', ['liste_livraison' => $livraisons]);
    }

    public function findLivraisonById($id){
        $livraisondao = new LivraisonDao(Flight::db());
        $livraison = $livraisondao->getLivraisonById($id);
        return $livraison;
    }

    public function getStateChoices(){
        $livraisondao = new LivraisonDao(Flight::db());
        $livraison = $livraisondao->etatHTMLSelect();
        return $livraison;
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
    
        public function searchBenefit(){
        $req = Flight::request();
        var_dump($req->query);
        // $state_int = (int)$req->query['etat'];
        // $livraison_id = (int)$req->query['id'];
        // $livraison_dao = new LivraisonDAO(Flight::db());
        // $livraison_dao->updateState($livraison_id, $state_int);
        // Flight::redirect('/');
    }
}
?>