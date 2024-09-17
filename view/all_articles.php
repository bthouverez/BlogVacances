<section class="max-w-xl mx-auto">
		<hr>
	<?php foreach($articles as $a) { ?>
		<h2 class="text-lg font-bold"><?= $a->title?>
		<small class="font-normal">
			le <?= date_format(date_create($a->publish_date), 'd/m/Y à H\hi') ?>
			par <?= $a->user_id ?>
		</small></h2>  

		<?php if ($a->image_path) { ?>
			<img src="<?= $a->image_path ?>" alt="image">
		<?php } ?>

		<p class="border-l border-black border-solid border-l-2 ml-2 pl-2"><?= $a->content ?></p>

		<?php if($_SESSION['user_id'] == $a->user_id) { ?>
		<div class="flex">
			<form method="post" action="index.php">
				<input type="hidden" name="upd_article" value="<?= $a->id ?>">
				<input class="rounded bg-cyan-800 p-2 text-white m-2" type="submit" name="btnToUpdate" value="Éditer">
			</form>
			<form method="post" action="index.php" id="deleteForm">
				<input type="hidden" name="del_article" value="<?= $a->id ?>">
				<input class="rounded bg-red-800 p-2 text-white m-2" type="button" name="btnDelete" value="Supprimer" onclick="confirmDelete()">
			</form>
		</div>
		<?php } ?>
		<hr class="my-4">
	<?php } ?>

</section>


<script>
	function confirmDelete() {
		res = confirm("Sûr ????");
		if(res) {
			document.forms["deleteForm"].submit();
		}
	}
</script>