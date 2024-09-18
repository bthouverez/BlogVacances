<?php
require_once('model/DAO_User.php');
require_once('model/DAO_Article.php');
session_start();


$daoUser = new DAO_User();
$daoArticle = new DAO_Article();
$infoMessage = '';
$toUpdate = 0;

// Gestion de la déconnexion
if(isset($_GET['deco'])) {
	unset($_SESSION['user_id']);	
	unset($_SESSION['user_name']);	
	session_destroy();
}

// Gestion de la connexion
if(isset($_POST['btnConnect'])) {
	if(isset($_POST['username']) and $_POST['username'] != '' and
	   isset($_POST['password']) and $_POST['password'] != '') {
		$u = $_POST['username'];
		$p = $_POST['password'];
		$infoMessage = $daoUser->connectUser($u, $p);
	}
}
// Gestion de la création d'article
if(isset($_POST['btnCreate'])) {
	if(isset($_POST['title']) and $_POST['title'] != '' 
		and isset($_POST['content']) and $_POST['content'] != ''
	) {
		$a = new Article();
		$a->content = $_POST['content'];
		$a->title = $_POST['title'];	
		$a->image_path = $_POST['image_path'] != '' ? $_POST['image_path'] : 'img/image.png';

		// Gestion du fichier si un a été choisi
		if(isset($_FILES["file_input"]) and $_FILES["file_input"]["name"] != '') {
			// Répertoire d'arrivée
			$target_dir = "img/";
			// Nom complet du fichier reçu avec le chemin
			$target_file = $target_dir . basename($_FILES["file_input"]["name"]);
			// Téléchargement du fichier depuis le tmp_name
			if (move_uploaded_file($_FILES["file_input"]["tmp_name"], $target_file)) {
				// S'il a bien été téléchargé, on met à jour le image_path du nouvel article
				$a->image_path = $target_file;
			    $infoMessage = "The file ". htmlspecialchars( basename( $_FILES["file_input"]["name"])). " has been uploaded.";
		  	} else {
			    $infoMessage = "Sorry, there was an error uploading your file.";
	  		}
		}
		$daoArticle->create($a);
	}
}

// Gestion de la mise à jour
if(isset($_POST['btnToUpdate'])) {
	// Récupère l'id de l'article à modifier
	$toUpdate = $_POST['upd_article'];
	// Cherche cet article dans la bdd pour l'envoyer à la vue
	$article = $daoArticle->getById($toUpdate);
}
// Gestion de la mise à jour
if(isset($_POST['btnUpdate'])) {
	// Récupère l'article à modifier dans la bdd
	$article = $daoArticle->getById($_POST['btnUpdate']);
	// Met à jour l'article avec les infos que l'utilisateur a saisi
	$article->title = $_POST['title'];
	$article->content = $_POST['content'];
	$article->image_path = $_POST['image_path'] != '' ? $_POST['image_path'] : 'img/image.png';

	// Gestion du fichier si un a été choisi
		if(isset($_FILES["file_input"]) and $_FILES["file_input"]["name"] != '') {
			// Répertoire d'arrivée
			$target_dir = "img/";
			// Nom complet du fichier reçu avec le chemin
			$target_file = $target_dir . basename($_FILES["file_input"]["name"]);
			// Téléchargement du fichier depuis le tmp_name
			if (move_uploaded_file($_FILES["file_input"]["tmp_name"], $target_file)) {
				// S'il a bien été téléchargé, on met à jour le image_path du nouvel article
				$a->image_path = $target_file;
			    $infoMessage = "The file ". htmlspecialchars( basename( $_FILES["file_input"]["name"])). " has been uploaded.";
		  	} else {
			    $infoMessage = "Sorry, there was an error uploading your file.";
	  		}
		}

	$daoArticle->update($_POST['btnUpdate'], $article);
}

// Gestion de la suppression
if(isset($_POST['del_article'])) {
	$daoArticle->delete($_POST['del_article']);
	$infoMessage = 'Article numéro '.$_POST['del_article']. ' supprimé';
}



///////////////////////////////////////////////////////////////////////////
//                         Chargement du front                           //
///////////////////////////////////////////////////////////////////////////

// Dans tous les cas, inclu le header et le footer
include('view/header.php');

// Si la session n'est pas remplie, l'utilisateur n'est pas connecté
// On affiche le formulaire de connection
if(!isset($_SESSION['user_name'])) {
	echo $infoMessage;
	include('view/form_connect.php');
} else {
	// Sinon, on récupère tous les articles avec la DAO Article
	$articles = $daoArticle->getAll();
	// Puis on charge les vues
	include('view/form_article.php');
	include('view/all_articles.php');
}

include('view/footer.php');