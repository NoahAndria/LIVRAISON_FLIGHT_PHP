<?php

namespace app\controllers;

use flight\Engine;
use Flight;
use app\models\Produit;

class ApiExampleController {

	protected Engine $app;
	public function __construct($app) {
		$this->app = $app;
	}

	public function getUsers() {
		// You could actually pull data from the database if you had one set up
		// $users = $this->app->db()->fetchAll("SELECT * FROM users");
		$users = [
			[ 'id' => 1, 'name' => 'Bob Jones', 'email' => 'bob@example.com' ],
			[ 'id' => 2, 'name' => 'Bob Smith', 'email' => 'bsmith@example.com' ],
			[ 'id' => 3, 'name' => 'Suzy Johnson', 'email' => 'suzy@example.com' ],
		];

		// You actually could overwrite the json() method if you just wanted to
		// to ->json($users); and it would auto set pretty print for you.
		// https://flightphp.com/learn#overriding
		$this->app->json($users, 200, true, 'utf-8', JSON_PRETTY_PRINT);
	}

	public function getUser($id) {
		// You could actually pull data from the database if you had one set up
		// $user = $this->app->db()->fetchRow("SELECT * FROM users WHERE id = ?", [ $id ]);
		$users = [
			[ 'id' => 1, 'name' => 'Bob Jones', 'email' => 'bob@example.com' ],
			[ 'id' => 2, 'name' => 'Bob Smith', 'email' => 'bsmith@example.com' ],
			[ 'id' => 3, 'name' => 'Suzy Johnson', 'email' => 'suzy@example.com' ],
		];
		$users_filtered = array_filter($users, function($data) use ($id) {
			return $data['id'] === (int) $id;
		});
		if($users_filtered) {
			$user = array_pop($users_filtered);
		}
		$this->app->json($user, 200, true, 'utf-8', JSON_PRETTY_PRINT);
	}

	public function updateUser($id) {
		// You could actually update data from the database if you had one set up
		// $statement = $this->app->db()->runQuery("UPDATE users SET email = ? WHERE id = ?", [ $this->app->data['email'], $id ]);
		$this->app->json([ 'success' => true, 'id' => $id ], 200, true, 'utf-8', JSON_PRETTY_PRINT);
	}

	public function getProducts() {
		$prod =  new Produit();
		$this->app->render('welcome', ['products' => $prod->getProducts($this->app->db())]);
	}
	public function getProduct($id) {
		$prod =  new Produit();
		$this->app->render('produit', ['product' => $prod->getProduct($this->app->db(), $id)]);
	}
	public function delete($id) {
		$p = new Produit($id);
		$p->delete($this->app->db());
		Flight::redirect("/");
	}
	public function r_update($id) {
		$p = new Produit();
		$prod = $p->getProduct($this->app->db(), $id);
		$this->app->render('update', ['product' => $prod]);
	}
	public function update() {
		$req = Flight::request();
		$id = $req->data->id_produit;
		$nom = $req->data->nom;
		$prix = $req->data->prix;
		$desc = $req->data->desc;
		$file = $req->files->image;


		$p = new Produit($id);
		$p->setNom($nom);
		$p->setDesc($desc);
		$p->setPrix($prix);
		
		//get the new filename
		if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
                    // 2. Define upload directory
			$uploadDir = "images/";
			// Make directory if not exists
			if (!is_dir($uploadDir)) {
				mkdir($uploadDir, 0777, true);
			}

			// 3. Build a safe filename
			$filename = uniqid() . "-" . basename($file['name']);
			$destination = $uploadDir . $filename;

			// 4. Move file
			if (move_uploaded_file($file['tmp_name'], $destination)) {
				echo "File uploaded successfully! Saved as: $filename";
			} else {
				Flight::halt(500, "Failed to save file");
			}

			$p->setImg($filename);
        }

		Produit::update($this->app->db(), $p);
		Flight::redirect('/');
	}
	public function add() {
		$req = Flight::request();
		$nom = $req->data->nom;
		$prix = $req->data->prix;
		$desc = $req->data->desc;
		$file = $req->files->image;
		// echo $req->data->nom;
		// save the file in the upload directory 
		// and get the new name
		// 1. Check if file is received
        if ($file['error'] !== UPLOAD_ERR_OK) {
            Flight::halt(400, "Upload error");
        }

        // 2. Define upload directory
        $uploadDir = "images/";
		echo $uploadDir;
        // Make directory if not exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // 3. Build a safe filename
        $filename = uniqid() . "-" . basename($file['name']);
        $destination = $uploadDir . $filename;

        // 4. Move file
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            echo "File uploaded successfully! Saved as: $filename";
        } else {
            Flight::halt(500, "Failed to save file");
        }
		$p = new Produit();
		$p->setNom($nom);
		$p->setImg($filename);
		$p->setDesc($desc);
		$p->setPrix($prix);

		$p->save($this->app->db());
		Flight::redirect('/');
	}

}