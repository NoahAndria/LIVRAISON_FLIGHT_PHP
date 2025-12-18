<?php

use app\controllers\ApiExampleController;
use app\controllers\LivraisonController;
use app\controllers\UpdateController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {

	// $router->get('/', function() use ($app) {
	// 	$controller = new ApiExampleController($app);
	// 	$app->render('welcome', [ 'products' => $controller->getProducts()]);
	// });
	
	// $router->get('/delete/@id:[0-9]+', [ ApiExampleController::class, 'delete' ]);
	// $router->get('/redirectupdate/@id:[0-9]+', [ ApiExampleController::class, 'r_update' ]);
	// $router->get('/hello-world/@name', function($name) {
	// 	echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
	// });
	
	// $router->get('/produit/@id:[0-9]', [ ApiExampleController::class, 'getProduct' ]);
	
	// $router->post('/addhandler', function() use ($app) {
	// 	$req = Flight::request();
	// 	$nom = $req->data->nom;
	// 	$prix = $req->data->prix;
	// 	$desc = $req->data->desc;
	// 	$file = $req->files->image;
	// 	$controller = new ApiExampleController($app);
	// 	$controller->add($nom, $prix, $desc, $file);
	// });
	$router->post('/addhandler', [ ApiExampleController::class, 'add']);
	$router->post('/updatehandler', [ ApiExampleController::class, 'update']);

	$router->get('/add', function() use ($app) {
		$app->render('add');
	});

	$router->group('/api', function() use ($router) {
		$router->get('/users', [ ApiExampleController::class, 'getUsers' ]);
		$router->get('/users/@id:[0-9]', [ ApiExampleController::class, 'getUser' ]);
		$router->post('/users/@id:[0-9]', [ ApiExampleController::class, 'updateUser' ]);
		
	});

	
	//Aza rarahina ny ambony ao lol 
	$livraison_controller = new LivraisonController($app);
	$router->get('/', [ $livraison_controller, 'loadHome' ]);

	$router->get('/modif/@id', function($id) use ($app) {
		$livraison_controller = new LivraisonController($app);
		
		// $produit = ['id' => 0,'nom' => 'Not found','src' => '1.jpg','price' => '0'];

		if (!empty($id)) {
			if (is_numeric($id)) {
				$int = intval($id);
				$found = $livraison_controller->findLivraisonById($int);
				$selects = $livraison_controller->getStateChoices();
				$app->render('livraison', [ 'livraison' => $found , 'choix' => $selects]);

			}
		}
		
	});
	$update_controller = new UpdateController();
	$router->get('/traiteModif', [ $update_controller, 'UploadState' ]);

}, [ SecurityHeadersMiddleware::class ]);