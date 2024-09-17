

<form class="max-w-xl mx-auto mt-8 mb-8" method="post" action="index.php">
<h1 class="text-xl font-bold"><?= $toUpdate ? 'Mise à jour' : 'Ajout' ?> d'un nouvel article</h1>

  <div class="mb-5">
    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
    <input type="text" id="title" name="title" value="<?= $toUpdate ? $article->title : '' ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Titre" required />
  </div>
  <div class="mb-5">
    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
    <textarea placeholder="Contenu" name="content" type="content" id="content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required><?=  $toUpdate ? $article->content : '' ?></textarea>
  </div>
  
  <input type="text" id="image_path" name="image_path" value="<?= $toUpdate ? $article->image_path : '' ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Chemin de l'image" />

  <button type="submit" name="<?= $toUpdate ? 'btnUpdate' : 'btnCreate' ?>" value="<?= $toUpdate ?? '' ?>" class="mt-4 text-white bg-<?= $toUpdate ? 'blue' : 'green' ?>-700 hover:bg-<?= $toUpdate ? 'blue' : 'green' ?>-800 focus:ring-4 focus:outline-none focus:ring-<?= $toUpdate ? 'blue' : 'green' ?>-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-<?= $toUpdate ? 'blue' : 'green' ?>-600 dark:hover:bg-<?= $toUpdate ? 'blue' : 'green' ?>-700 dark:focus:ring-<?= $toUpdate ? 'blue' : 'green' ?>-800"><?= $toUpdate ? 'Maj' : 'Ajouter' 
	?></button>
</form>
