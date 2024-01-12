<?php 
session_start();
if(isset($_SESSION['role']) && $_SESSION['role'] === 'user'){
    header('location:/WIKI/Home');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Update Tag</title>
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-10">
    <div class="max-w-md mx-auto bg-white p-8 border rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-6">Update Tag</h2>
        <form class="space-y-4" action="/WIKI/TagUpdate" method="post">
            <div class="mb-4">
                <label for="id" class="sr-only"></label>
                <input type="hidden" id="id" name="id" value="<?= $tags->id ?>" placeholder="enter category name" required
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="name" class="sr-only"></label>
                <input type="text" id="name" name="name" value="<?= $tags->name ?>" placeholder="enter category name" required
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
