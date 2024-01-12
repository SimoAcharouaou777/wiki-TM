<?php 

if(isset($_SESSION['role']) &&  $_SESSION['role'] === 'admin'){
    header('location:/WIKI/Dashboard');
}
include __DIR__.'/../partials/navbar.php' 
?>
<?php foreach( $wikies as $wiki ) {?>
<div class="max-w-md mx-auto p-6 bg-white rounded-md shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Add Your Wiki</h2>
    <form action="/WIKI/updateWiki" method="post">
        <div class="mb-4">
            <input type="hidden" name="id" value="<?= $wiki->id ?>">
            <label for="title" class="block text-sm font-medium text-gray-700">Wiki Title</label>
            <input type="text" id="title" name="title" class="mt-1 p-2 w-full border rounded-md" value="<?= $wiki->title ?>" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Wiki Content</label>
            <textarea id="content" name="content" rows="4" class="mt-1 p-2 w-full border rounded-md"   required><?= $wiki->content ?></textarea>
        </div>

        <div class="mb-4">
            <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
            <select id="tags" name="tags[]" multiple class="mt-1 p-2 w-full border rounded-md" required>
                <?php foreach($tag as $tag) {?>
                <option value="tag1"><?= $tag->name?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <select id="category" name="category_id" class="mt-1 p-2 w-full border rounded-md" required>
                <?php foreach($cate as $category) { ?>
                <option value=""><?= $category['name']?></option>
                <?php } ?>
            </select>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded-md hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Update Wiki</button>
        </div>
    </form>
</div>
<?php }?>

<?php include __DIR__.'/../partials/footer.php' ?>