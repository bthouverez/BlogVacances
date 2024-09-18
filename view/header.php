<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blog Vacances</title>
	<script src="https://cdn.tailwindcss.com"></script>

	<link rel="stylesheet" type="text/css" href="">
</head>
<body class="">
	<header class="bg-slate-800 h-12">
		<?php if(isset($_SESSION['user_name'])) { ?>

			<p class="text-white text-lg font-bold py-2 ml-12">Bonjour <?= $_SESSION['user_name'] ?>
				<a class="bg-red-500 py-1 px-4 rounded m-4" href="index.php?deco">Déconnexion</a> 
			</p>
		<?php } ?>

		<?php if($infoMessage != '' && $infoMessage != 'ok') { ?>
			<p class="max-w-xl mx-auto mb-8 mt-5 bg-green-300 p-2 rounded"><?= $infoMessage ?></p>
		<?php } ?>
	</header>
<br>
