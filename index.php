<?php
require_once('model/DAO_User.php');
session_start();

$dao = new DAO_User();
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
		$connexionMessage = $dao->connectUser($u, $p);
	}
}

if($connexionMessage != 'ok') {
	echo $connexionMessage;
	include('view/connect_form.php');
} else {
	include('view/all_articles.php');
}
