<?php


class DAO_User {

	private PDO $bdd;

	// initialisation du notre PDO (constructeur)
	public function __construct() {
		try {
			$this->bdd = new PDO('mysql:host=localhost;dbname=blog_vacances', 'bthouverez', '321654');
		} catch(Exception $e) {
			die('ERROR : '. $e->getMessage());
		}

	}

	// 1 méthode par requête SQL
	  	// écrire la requete	
		// envoyer la requete sur la base
		// récupérer les données et les transformer en DTO

	public function connectUser($username, $password) { 
	// INTERDIT, ON PREPARE LES REQUETES
		//$sql = 'SELECT * FROM Users WHERE username = '.$username;
		//$this->bdd->query($sql);

		// Avec identifiant implicite
		//$sql = 'SELECT * FROM Users WHERE username = ?';
		//$req = $this->bdd->prepare($sql);
		//$req->execute([$username]);

		// Avec identifiant explicite
		$sql = 'SELECT * FROM Users WHERE username = :uname';
		$req = $this->bdd->prepare($sql);
		$req->execute(['uname' => $username]);

		// vérifier si le user existe ?? (en verifiant le nombre lignes de la requête)
		// S'il existe, vérifier que le mot de passe donné corresponde a la bdd
		
		if($userData = $req->fetch()) {
			if($password == $userData['password']) {
				$_SESSION['user_id'] = $userData['id'];
				$_SESSION['user_name'] = $userData['username'];
				return 'ok';
			} else {
				return 'Mot de passe éronné';
			}
		} else {
			return "Utilisateur $username inconnu";
		}
	}
}