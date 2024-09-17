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
	    // and isset($_POST['image_path']) and $_POST['image_path'] != ''
	) {
		$a = new Article();
		$a->content = $_POST['content'];
		$a->title = $_POST['title'];	
		$a->image_path = $_POST['image_path'] != '' ? $_POST['image_path'] : 'img/image.png';

		$daoArticle->create($a);
	}
}

// Gestion de la mise à jour
if(isset($_POST['btnToUpdate'])) {
	$toUpdate = $_POST['upd_article'];
	$article = $daoArticle->getById($toUpdate);
}
// Gestion de la mise à jour
if(isset($_POST['btnUpdate'])) {
	$article = $daoArticle->getById($_POST['btnUpdate']);
	$article->title = $_POST['title'];
	$article->content = $_POST['content'];
	$article->image_path = $_POST['image_path'] != '' ? $_POST['image_path'] : 'img/image.png';
	$daoArticle->update($_POST['btnUpdate'], $article);
}

// Gestion de la suppression
if(isset($_POST['del_article'])) {
	$daoArticle->delete($_POST['del_article']);
	$infoMessage = 'Article numéro '.$_POST['del_article']. ' supprimé';
}



include('view/header.php');

if(!isset($_SESSION['user_name'])) {
	echo $infoMessage;
	include('view/form_connect.php');
} else {
	// Récupérer tous les articles avec la DAO Article
	$articles = $daoArticle->getAll();
	include('view/form_article.php');
	include('view/all_articles.php');
}

include('view/footer.php');