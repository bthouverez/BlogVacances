<?php
require_once('model/DAO_User.php');
require_once('model/DAO_Article.php');
session_start();

$daoUser = new DAO_User();
$daoArticle = new DAO_Article();
$connexionMessage = '';

// Gestion de la déconnexion
if(isset($_GET['deco'])) {
	unset($_SESSION['user_id']);	
	unset($_SESSION['user_name']);	
}

// Gestion de la connexion
if(isset($_POST['btnConnect'])) {
	if(isset($_POST['username']) and $_POST['username'] != '' and
	   isset($_POST['password']) and $_POST['password'] != '') {
		$u = $_POST['username'];
		$p = $_POST['password'];
		$connexionMessage = $daoUser->connectUser($u, $p);
	}
}
// Gestion de la création d'article
if(isset($_POST['btnCreate'])) {
	if(isset($_POST['title']) and $_POST['title'] != '' 
		and isset($_POST['content']) and $_POST['content'] != ''
	    // and isset($_POST['image_path']) and $_POST['image_path'] != ''
	) {
		$a = new Article;
		$a->content = $_POST['content'];
		$a->title = $_POST['title'];
		$a->image_path = $_POST['image_path'] ?? 'image.png';
		$daoArticle->create($a);
	}
}

if($connexionMessage != '') {
	if($connexionMessage != 'ok') {
		echo $connexionMessage;
		include('view/connect_form.php');
	}
} else {
	// Récupérer tous les articles avec la DAO Article
	$articles = $daoArticle->getAll();
	include('view/create_article.php');
	include('view/all_articles.php');
}
