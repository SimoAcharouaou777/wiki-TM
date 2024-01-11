<?php

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    header('location:/WIKI/Dashboard');
}
include __DIR__ . '/../partials/navbar.php';

?>

<div class="flex items-center justify-around mb-4 mt-20">
    <!-- Category Filter -->
    <div class="relative">
        <select class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            <?php  foreach ($cate as $category) {?>
            <option value="category1"><?= $category['name'] ?></option>
            <?php } ?>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M14.5 16h-.79l-.28-.27A6.5 6.5 0 1 0 12 7a6.5 6.5 0 0 0 5.93 9.95l.27.28v.77l5 4.99L18 20l-4.5-4.5L9 20l-1.5-1.5 5-5v-.77l.28-.28A6.5 6.5 0 0 0 14.5 16z"/>
            </svg>
        </div>
    </div>

    <!-- Search Input -->
    <div class="flex items-center">
        <input type="text" id="search" onkeyup="search()" placeholder="Search..." class="border border-gray-300 rounded-l-md py-2 px-4 focus:outline-none focus:border-gray-500">
        <button class="bg-blue-500 text-white py-2 px-4 rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
            Search
        </button>
        <script>
            function search(){
                var input=document.getElementById('search').value;
                var url = '/WIKI/search?id='+input;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(xhttp.responseText);
                        document.getElementById("card").innerHTML = xhttp.responseText;
                    }
                };
                xhttp.open("GET",url, true);
                xhttp.send();
            }
           
        </script>
    </div>
</div>
<div id=card>


    <?php foreach ($wikies as $wiki) {?>
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
    </div>

        <?php }?>
</div>
<?php include __DIR__ . '/../partials/footer.php'?>
