<?php
require_once('Article.php');

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
		$sql = 'SELECT * FROM articles WHERE id = ?';
		$req = $this->bdd->prepare($sql);
		$req->execute([$id]);
		$row = $req->fetch();
		$a = new Article;
		$a->id = $row['id'];
		$a->title = $row['title'];
		$a->publish_date = $row['publish_date'];
		$a->content = $row['content'];
		$a->image_path = $row['image_path'];
		$a->user_id = $row['user_id'];
		return $a;

	}

	// getAll()
	// Renvoie une collection de tous les articles
	public function getAll() {
		$sql = 'SELECT * FROM articles ORDER BY publish_date DESC';
		$data = $this->bdd->query($sql);
		$articles = [];
		while($row = $data->fetch()) {
			$a = new Article;
			$a->id = $row['id'];
			$a->title = $row['title'];
			$a->publish_date = $row['publish_date'];
			$a->content = $row['content'];
			$a->image_path = $row['image_path'];
			$a->user_id = $row['user_id'];
			$articles[] = $a;
		}
		return $articles;
	}

	// create(Article $article)
	// Enregistre un nouvel article en BDD
	public function create(Article $article) {
		$sql = 'INSERT INTO Articles (title, publish_date, content, image_path, user_id) VALUES 
		(?, NOW(), ?, ?, ?);';
		$req = $this->bdd->prepare($sql);
		$req->execute([
			$article->title,
			$article->content,
			$article->image_path,
			$_SESSION['user_id']
		]);
	}

	// update(int $id, Article $article)
	// Met à jour l'article à l'id donné en paramètres avec des nouvelles valeurs
	public function update(int $id, Article $article) {

		$sql = 'UPDATE articles SET 
		title = :title, content = :content, image_path = :image_path WHERE id = :id';
		$req = $this->bdd->prepare($sql);
		$req->execute( ['title' => $article->title,
						'content' => $article->content,
						'image_path' => $article->image_path,
						'id' => $id]);
	}

	// delete(int $id)
	// Supprime l'article à l'id donné en paramètres de la BDD
	public function delete(int $id) {
		$sql = 'DELETE FROM articles WHERE id = ?';
		$req = $this->bdd->prepare($sql);
		$req->execute([$id]);
	}
}