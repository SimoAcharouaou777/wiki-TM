<?php 
session_start() ;
if(isset($_SESSION['role']) &&  $_SESSION['role'] === 'admin'){
    header('location:/WIKI/Dashboard');
}
include __DIR__.'/../partials/navbar.php' 
?>

<div class="max-w-md mx-auto p-6 bg-white rounded-md shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Add Your Wiki</h2>
    <form action="/WIKI/creatWiki" method="post">
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Wiki Title</label>
            <input type="text" id="title" name="title" class="mt-1 p-2 w-full border rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Wiki Content</label>
            <textarea id="content" name="content" rows="4" class="mt-1 p-2 w-full border rounded-md" required></textarea>
        </div>

        <div class="mb-4">
            <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
            <select id="tags" name="tags[]" multiple class="mt-1 p-2 w-full border rounded-md" required>
                <?php foreach($tag as $tag) {?>
                <option value="tag1"><?= $tag->name?></option>
                <?php }?>
            </select>
        </div>

        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <select id="category" name="category_id" class="mt-1 p-2 w-full border rounded-md" required>
                <?php foreach($cate as $cate) {?>
                <option value="<?= $cate['id'] ?>"><?= $cate['name']?></option>
                <?php }?>
            </select>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded-md hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Add Wiki</button>
        </div>
    </form>
</div>


<?php include __DIR__.'/../partials/footer.php' ?>