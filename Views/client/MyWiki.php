<?php

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    header('location:/WIKI/Dashboard');
}
if(!isset($_SESSION['username'])){
    header('location:/WIKI/Home');
}
include __DIR__ . '/../partials/navbar.php';

?>





<?php foreach ($wikies as $wiki) { ?>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <!-- Wiki Image -->
        <div class="mb-4">
            <img src="Public/images/readingbook.jpg" alt="Wiki Image" class="w-full h-auto rounded-lg">
        </div>

        <!-- Wiki Content -->
       
        <div class="mb-4">
            <h2 class="text-2xl font-bold mb-2 text-gray-800"><?=$wiki->title?></h2>
            <p class="text-gray-600"><?=$wiki->content?></p>
        </div>

        <!-- Wiki Tags -->
        <div class="mb-4">

            <span class="text-gray-500">Tags:</span>
            <span class="inline-block bg-gray-200 text-gray-700 px-2 py-1 rounded-full mr-2"><?=$wiki->tags?></span>
        </div>

        <!-- Wiki Category -->
        <div class="mb-4">
            <span class="text-gray-500"><?=$wiki->category?></span>
        </div>
        <div class="mb-4">
            <span class="text-gray-500"><?=$wiki->archived?></span>
        </div>
        <a class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300" href="UpdateMyWiki?id=<?= $wiki->id ?>">
         Update
        </a>

    </div>
<?php }?>
      

<?php include __DIR__ . '/../partials/footer.php'?>
