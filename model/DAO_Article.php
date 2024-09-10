<?php


class DAO_Article {

	private PDO $bdd;

	// initialisation du notre PDO (constructeur)
	public function __construct() {
		try {
			$this->bdd = new PDO('mysql:host=localhost;dbname=blog_vacances', 'bthouverez', '321654');
		} catch(Exception $e) {
			die('ERROR : '. $e->getMessage());
		}

	}

	// getById(int $id)
	// Renvoie le DTO de l'article à l'id donné en paramètres
	public function getById(int $id) {

	}

	// getAll()
	// Renvoie une collection de tous les articles
	public function getAll() {

	}

	// create(Article $article)
	// Enregistre un nouvel article en BDD
	public function create(Article $article) {

	}

	// update(int $id, Article $article)
	// Met à jour l'article à l'id donné en paramètres avec des nouvelles valeurs
	public function update(int $id, Article $article) {

	}

	// delete(int $id)
	// Supprime l'article à l'id donné en paramètres de la BDD
	public function delete(int $id) {

	}
}